<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventVideo;
use App\Models\Message;
use App\Models\Review;
use App\Models\ReviewComment;
use App\Models\ReviewRating;
use App\Models\ReviewReport;
use App\Models\User;
use App\Models\UserReport;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use mail;


class UserController extends Controller
{
    //
    public function adminLoginForm()
    {
        if (Auth::check()) {
            if (Auth::user()->user_type == 'A') {
                return redirect()->route('admin.dashboard');
            }
        }
        return view('admin.admin.login');
    }
    public function adminForm(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::where('email', $request->email)
                ->first();
            if (empty($user)) {
                Session::flash('message', "Invalid email, Please try again.");
                Session::flash('alert-class', 'alert-danger');
                return Redirect::back();
            } else if ($user['user_type'] != 'A') {
                Session::flash('message', "You are not authorized");
                Session::flash('alert-class', 'alert-danger');
                return Redirect::back();
            }

            $userDetail = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($userDetail)) {
                if (isset($request->timezone) && !empty($request->timezone)) {
                    User::where('id', Auth::user()->id)
                        ->update(['timezone' => $request->timezone]);
                }

                return redirect()->route('admin.dashboard');
            } else {
                Session::flash('message', "Invalid Credentials , Please try again.");
                Session::flash('alert-class', 'alert-danger');
                return Redirect::back();
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function viewprofile()
    {
        $viewarray['adminDetail'] = Auth::user();
        return view('admin.admin.view', $viewarray);
    }
    public function updateprofile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'phone_no' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('profile_image_update')) {
            $file = $request->file('profile_image_update');
            $extension = $file->getClientOriginalExtension();
            $picture = uniqid() . date('YmdHis') . '.' . $extension;
            $destination = base_path() . '/public/images/profile/';
            $file->move($destination, $picture);
            $url = '/public/images/profile/' . $picture;
            $request->merge(['profile_image' => $url]);
        }

        $user = User::find($request->id);
        // dd($request->id);
        $user->fill($request->all());
        if ($user->save()) {
            return redirect()->route('admin.viewProfile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->route('admin.viewProfile')->with('error', 'Admin profile not updated!.');
        }
        return view('admin.admin.view');
    }
    public function changePasswordFrm()
    {
        return view('admin.admin.password');
    }
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
            'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The Old password is incorrect.'));
                }
            }],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withINput();
        }
        $user->password = Hash::make($request->post('new_password'));
        if ($user->save()) {
            return redirect()->back()->with('success', 'Your password has been successfully changed.');
        } else {
            return redirect()->back()->with('errors', 'Something went wrong, Please try again letter!!!');
        }
    }
    public function forgetPassword()
    {
        return view('admin.common.forget');
    }
    public function forgetpasswordsent(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);

        DB::table('password_reset')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password link!');
    }
    public function allcategory()
    {

        $categories = Category::latest()->get();
        $count = count($categories);
        if (empty($categories)) {
            return redirect()->route()->with('error', 'Categories are not found!!!');
        }
        return view('admin.category.index', compact('categories', 'count'));
    }
    public function addcategory(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'image' => 'required|mimes:zip,pdf|max:2048'
        // ]);
        // if($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        if ($request->hasFile('imagename')) {
            $file = $request->file('imagename');
            $extension = $file->getClientOriginalExtension();
            $picture = uniqid() . date('YmdHis') . '.' . $extension;
            $destination = base_path() . '/public/images/category';
            $file->move($destination, $picture);
            $url = '/public/images/category/' . $picture;
            $request->merge(['image' => $url]);
        }
        $save = Category::create($request->all());
        if ($save) {
            return redirect()->route('admin.categories')->with('success', 'Category added successfully');
        } else {
            return redirect()->route('admin.categories')->with('error', 'Something went wrong!');
        }
    }

    public function craetecategory()
    {
        return view('admin.category.form');
    }
    public function editcategory(Request $request, $category_id)
    {
        $category = Category::where('id', $category_id)
            ->first();
        if (empty($category)) {
            return redirect()->route('admin.categories')->with('error', 'Something went wrong!');
        }

        if ($request->isMethod('post')) {
            $postData = $request->all();

            $category = Category::find($category->id);
            $category->name = $postData['name'];

            if (isset($postData['image']) && !empty($postData['image'])) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $picture = uniqid() . date('YmdHis') . '.' . $extension;
                $destination = base_path() . '/public/images/category';
                $file->move($destination, $picture);
                $url = '/public/images/category/' . $picture;

                // if (file_exists( base_path(). $category->image)) {
                //     unlink(base_path(). $category->image);
                // }
                $category->image = $url;
            }
            if ($category->save()) {

                return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
            } else {
                return redirect()->route('admin.categories')->with('error', 'Something went wrong!');
            }
        }
        return view('admin.category.edit', compact('category'));
    }
    public function deleteCategory($category_id)
    {
        $category = Category::where('id', $category_id);
        if (!empty($category)) {
            Category::where('id', $category_id)->delete();
            return redirect()->route('admin.categories')->with('success', 'Category successfully deleted.');
        }
        return redirect()->route('admin.categories')->with('error', 'Category not deleted!!!.');
    }
    public function userlist()
    {
        $users = User::where('user_type', 'U')->where('email', '<>', '')->where('name', '<>', '')->orderBy('id', 'DESC')->get();
        $count = count($users);
        if (empty($users)) {
            return redirect()->route()->with('error', 'Categories are not found!!!');
        }
        return view('admin.user_management.index', compact('users', 'count'));
    }
    public function deleteUser($user_id)
    {
        $users = User::where('id', $user_id);
        if (!empty($users)) {
            User::where('id', $user_id)->delete();
            return redirect()->route('admin.userlist')->with('success', 'User successfully deleted.');
        }
        return redirect()->route('admin.userlist')->with('error', 'User not deleted!!!.');
    }
    public function adduserFRm()
    {
        return view('admin.user_management.form');
    }
    public function adduser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'profile_image_name' => 'required|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required',
            'phone_no' => 'required|unique:users',
            'postal_code' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('profile_image_name')) {
            $file = $request->file('profile_image_name');
            $extension = $file->getClientOriginalExtension();
            $picture = uniqid() . date('YmdHis') . '.' . $extension;
            $destination = base_path() . '/public/images/profile';
            $file->move($destination, $picture);
            $url = '/public/images/profile/' . $picture;
            $request->merge(['profile_image' => $url]);
        }
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('admin.userlist')->with('success', 'User save successfully.');
    }
    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        return view('admin.user_management.edit')->with('user', $user);
    }
    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'postal_code' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $user = User::find($request->id);
        if ($request->hasFile('profile_image_name')) {
            $file = $request->file('profile_image_name');
            $extension = $file->getClientOriginalExtension();
            $picture = uniqid() . date('YmdHis') . '.' . $extension;
            $destination = base_path() . '/public/images/profile';
            $file->move($destination, $picture);
            $url = '/public/images/profile/' . $picture;
            $request->merge(['profile_image' => $url]);
        }
        $user->fill($request->all());
        if ($user->save()) {
            return redirect()->route('admin.userlist')->with('success', 'User profile updated successfully');
        } else {
            return redirect()->route('admin.userlist')->with('error', 'User profile not updated!!!.');
        }
        return view('admin.user_management.');
    }
    public function activeUserStatus($user_id)
    {

        $user = User::where('id', $user_id)->first();
        if (!empty($user)) {
            if ($user['status'] == 'A') {
                return redirect()->route('admin.userlist')->with('error', 'User is already activated');
            } else {

                $updateStatus = User::where('id', $user_id)
                    ->update(['status' => 'A']);

                if ($updateStatus) {
                    return redirect()->route('admin.userlist')->with('success', 'User activated successfully');
                } else {
                    return redirect()->route('admin.userlist')->with('error', 'Something went wrong!');
                }
            }
        } else {
            return redirect()->route('admin.userlist')->with('error', 'User not found');
        }
    }
    public function deactivateUserStatus($user_id)
    {
        $user = User::where('id', $user_id)->first();
        if (!empty($user)) {
            if ($user['status'] == 'S') {
                return redirect()->route('admin.userlist')->with('error', 'User is already suspended.');
            } else {
                $updateStatus = User::where('id', $user_id)->update(['status' => 'S']);
                if ($updateStatus) {
                    return redirect()->route('admin.userlist')->with('success', 'User successfully suspended.');
                } else {
                    return redirect()->route('admin.userlist')->with('error', 'Something went wrong.');
                }
            }
        } else {
            return redirect()->route('admin.userlist')->with('error', 'User not found!!!.');
        }
    }
    public function activeCategoryStatus($category_id)
    {
        $category = Category::where('id', $category_id)->first();
        if (!empty($category)) {
            if ($category['status'] == '1') {
                return redirect()->route('admin.categories')->with('error', 'Category is already activated.');
            } else {
                $updateStatus = Category::where('id', $category_id)->update(['status' => '1']);
                if ($updateStatus) {
                    return redirect()->route('admin.categories')->with('success', 'Category successfully activated.');
                } else {
                    return redirect()->route('admin.categories')->with('error', 'Something went wrong!!!.');
                }
            }
        } else {
            return redirect()->route('admin.categories')->with('error', 'Category not found.');
        }
    }
    public function deactiveCategoryStatus($category_id)
    {
        $category = Category::where('id', $category_id)->first();
        if (!empty($category)) {
            if ($category['status' == '0']) {
                return redirect()->route('admin.categories')->with('error', 'Category is already deactivated.');
            } else {
                $updateStatus = Category::where('id', $category_id)->update(['status' => '0']);
                if ($updateStatus) {
                    return redirect()->route('admin.categories')->with('success', 'Category successfully deactivated.');
                } else {
                    return redirect()->route('admin.categories')->with('error', 'Something went wrong!!!.');
                }
            }
        } else {
            return redirect()->route('admin.categories')->with('error', 'Category not found.');
        }
    }
    public function reviewList()
    {
        return view('admin.review.index');
    }
    public function reviewListShow()
    {
        $reviews = Review::with('users', 'category')->latest()->get()
        ->filter(function($val) {
            $val->avg = ReviewRating::where('review_id', $val->id)->avg('rating');
            return $val;
        });

        $count = count($reviews);
        if (empty($reviews)) {
            return redirect()->route('admin.review')->with('error', 'Review not found.');
        }
        return view('admin.review.index', compact('reviews', 'count'));
    }
    // review details
    public function reviewdetails($id)
    {
        $review = Review::with('category','user')->find($id);

        $users = User::all();
        $categories = Category::all();
        return view('admin.review.reviewdetails', compact('review', 'users', 'categories'));
    }
    public function reviewEditFrm($id)
    {
        $review = Review::with('review_hash_tags')->find($id);
        $categories = Category::all();
        $users = User::where('user_type', 'U')->get();

        return view('admin.review.edit', compact('review', 'categories', 'users'));
    }
    public function reviewUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'city' => 'required',
            'longitude' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $review = Review::find($request->id);
        $categories = Category::all();
        $review->fill($request->all());
        if ($review->save()) {
            return redirect()->route('admin.review')->with('success', 'Review successfully updated.');
        } else {
            return redirect()->route('admin.review')->with('error', 'Review not updated!!!.');
        }
        return view('admin.review', compact('categories'));
    }
    public function reviewCommentlist()
    {
        return view('admin.review.review_comments');
    }
    public function reviewProfile(Request $request, $id)
    {
        $review = Review::find($id);
        $user = User::find($review->user_id);
        return view('admin.review.reviewprofile', compact('review', 'user'));
    }
    public function deleteReview($review_id)
    {
        $reviews = Review::where('id', $review_id);
        if (!empty($reviews)) {
            Review::where('id', $review_id)->delete();
            return redirect()->route('admin.review')->with('success', 'Review successfully deleted.');
        } else {
            return redirect()->route('admin.review')->with('error', 'Review not deleted!!!.');
        }
    }
    // show comments
    public function reviewCommentShow(Request $request)
    {
        $review_id = $request->review_id;
        $get_review = Review::find($review_id);
        // dd($get_review);
        if ($get_review) {
            $review_comment = ReviewComment::where('review_id', $review_id)->with('user', function ($query) {
                $query->where('status', 'A');
            })->get();
            $exclude_comment_ids = commonExcludeIds($review_comment);
            $comments = ReviewComment::where('review_id', $review_id)->whereNotIn('id', $exclude_comment_ids)->orderBy('id', 'DESC')->get();
            // dd($comments);
            $count = count($comments);
            return view('admin.review.review_comments', compact('comments', 'review_id','count'));
        } else {
            return redirect()->route('admin.review')->with('error', 'Review not found!!!.');
        }
    }
    // delete comments
    public function deleteComment($comment_id)
    {
        $comment = ReviewComment::where('id', $comment_id)->first();
        if (!empty($comment)) {
            try {
                $comment->delete();
                return redirect()->route('admin.comments', ['review_id' => $comment->review_id])->with('success', 'Comment successfully deleted.');
            } catch (Exception $e) {
                return array('type' => 'error', 'message' => $e->getMessage());
            }
        }
        return redirect()->route('admin.review')->with('error', 'Comment not deleted!!!.');
    }
    // Made_by:Tarun     Date:10/Aug/2021
    // show reports
    public function reviewReportShow(Request $request)
    {
        $review_id = $request->review_id;
        $get_review = Review::find($review_id);
        if ($get_review) {
            $review_report = ReviewReport::where('review_id', $review_id)->with('user', function ($query) {
                $query->where('status', 'A');
            })->get();
            $exclude_report_ids = commonExcludeIds($review_report);
            $reports = ReviewReport::where('review_id', $review_id)->whereNotIn('id', $exclude_report_ids)->orderBy('id', 'DESC')->get();
            $count = count($reports);
            return view('admin.review.review_reports', compact('reports', 'review_id', 'count'));
        } else {
            return redirect()->route('admin.review')->with('error', 'Review not found!!!.');
        }
    }
    // delete reports
    public function deleteReport($report_id)
    {
        $report = ReviewReport::where('id', $report_id)->first();
        if (!empty($report)) {
            try {
                $report->delete();
                return redirect()->route('admin.reports', ['review_id' => $report->review_id])->with('success', 'Report successfully deleted.');
            } catch (Exception $e) {
                return array('type' => 'error', 'message' => $e->getMessage());
            }
        }
        return redirect()->route('admin.review')->with('error', 'Report not deleted!!!.');
    }
    // Made_by:Tarun     Date:10/Aug/2021
    // show ratings
    public function reviewRatingShow(Request $request)
    {

        $review_id = $request->review_id;
        $get_review = Review::where('id', $review_id)->get();
        if ($get_review) {
            DB::enableQueryLog();
            $review_rating = ReviewRating::where('review_id', $review_id)->with('user', function ($query) {
                $query->where('status', 'A');
            })->get();
            $exclude_rating_ids = commonExcludeIds($review_rating);
            $ratings = ReviewRating::where('review_id', $review_id)->whereNotIn('id', $exclude_rating_ids)->orderBy('id', 'DESC')->get();
            $count = count($ratings);
            return view('admin.review.review_ratings', compact('ratings', 'review_id', 'count'));
        } else {
            return redirect()->route('admin.review')->with('error', 'Review not found!!!.');
        }
    }

    // delete ratings
    public function deleteRating($rating_id)
    {
        $rating = ReviewRating::where('id', $rating_id)->first();
        if (!empty($rating)) {
            try {
                $rating->delete();
                return redirect()->route('admin.ratings', ['review_id' => $rating->review_id])->with('success', 'Rating successfully deleted.');
            } catch (Exception $e) {
                return array('type' => 'error', 'message' => $e->getMessage());
            }
        }
        return redirect()->route('admin.review')->with('error', 'Rating not deleted!!!.');
    }
    //Made_by:Tarun      Date:11/Aug/2021
    //show event list
    public function eventListShow()
    {
        // dd('fjkhgj');
        $events = Event::with('user')->orderBy('id', 'DESC')->get();
        $count = count($events);
        if (empty($events)) {
            return redirect()->route('admin.event')->with('error', 'Event not found.');
        }
        return view('admin.event_management.index', compact('events', 'count'));
    }
    // event detail
    public function eventdetail($id)
    {
        $event = Event::find($id);
        $users = User::all();
        // dd($events);
        return view('admin.event_management.eventdetails', compact('event', 'users'));
    }
    public function delete_event($event_id)
    {
        $event = Event::where('id', $event_id)->first();
        if (!empty($event)) {
            try {
                $event->delete();
                return redirect()->route('admin.event', ['event_id' => $event->event_id])->with('success', 'Event successfully deleted.');
            } catch (Exception $e) {
                return array('type' => 'error', 'message' => $e->getMessage());
            }
        }
        return redirect()->route('admin.event')->with('error', 'Event not deleted!!!.');
    }
    // Made_by:Tarun      Date:12/Aug/2021
    // Edit form for event
    public function eventEditFrm($id)
    {
        $event = Event::find($id);
        $users = User::all();

        return view('admin.event_management.edit', compact('event', 'users'));
    }
    public function eventUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'description' => 'required',
            'latitude' => 'required',
            'location' => 'required',
            'longitude' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $event = Event::find($request->id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        if ($event->save()) {
            return redirect()->route('admin.event')->with('success', 'Event successfully updated.');
        } else {
            return redirect()->route('admin.event')->with('error', 'Event not updated!!!.');
        }
        return view('admin.event');
    }
    public function eventVideolist()
    {
        return view('admin.event_management.event_videos');
    }
    public function eventVideoShow(Request $request)
    {
        $event_id = $request->event_id;
        $get_event = Event::find($event_id);
        if ($get_event) {
            $event_video = EventVideo::where('event_id', $event_id)->with('user', function ($query) {
                $query->where('status', 'A');
            }, 'event')->get();
            $exclude_video_ids = commonExcludeIds($event_video);
            $videos = EventVideo::where('event_id', $event_id)->whereNotIn('id', $exclude_video_ids)->paginate(10);
            return view('admin.event_management.event_videos', compact('videos', 'event_id'));
        } else {
            return redirect()->route('admin.event')->with('error', 'video not found!!!.');
        }
    }
    public function deleteVideo($video_id)
    {
        $video = EventVideo::where('id', $video_id)->first();
        if (!empty($video)) {
            try {
                $video->delete();
                return redirect()->route('admin.videos', ['event_id' => $video->event_id])->with('success', 'Video successfully deleted.');
            } catch (Exception $e) {
                return array('type' => 'error', 'message' => $e->getMessage());
            }
        }
        return redirect()->route('admin.event')->with('error', 'Video not deleted!!!.');
    }
    // Made_by:Tarun saini     Date:24/Aug/2021
    // Show listing of all reports to admin
    public function reportListShow()
    {
        $reports = UserReport::with('user', 'userTo')->orderBy('id', 'DESC')->get();
        $count = count($reports);
        return view('admin.user_management.user_reports', compact('reports', 'count'));
    }
    // Made_by:Tarun saini      Date:25/Aug/2021
    // Show all messages to admin send by users
    public function ShowMessages()
    {
        $messages = Message::with('user')->orderBy('id', 'DESC')->get();
        $count = count($messages);
        return view('admin.user_management.user_messages', compact('messages', 'count'));
    }
    public function reasonmessage(Request $request, $id)
    {
        //  dd('jdhfsgjk');
        $messages = Message::latest()->get();
        $count = count($messages);
        return view('admin.user_management.message')->with('message', $messages, 'count');
    }
    public function reportmessage(Request $request, $id)
    {
        $reports = UserReport::latest()->get();
        $count = count($reports);
        return view('admin.user_management.reportmessage')->with('report', $reports, 'count');
    }
    public function reviewRatingUpdate(Request $request)
    {
        $update = ReviewRating::find($request->review_id);
        $update->rating  = $request->star_value;
        $update->save();
        return response()->json(['status' => true]);

    }
}
