<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\CmsPage;
use App\Models\CmsUserDashboard;
use App\Models\AffiliatedCenter;
use Session;

class CmsController extends Controller {

    public function userDashboard() {
        $dashboarddetail = CmsUserDashboard::where('cms_page_id', '1')->first();
//     dd($dashboarddetail);
        //Session::flash('message','');
        return view('admin.cms.userdashboard', compact('dashboarddetail'));
    }

    /**
     * home page content management
     * @return type
     */
    public function homePage() {
        $homePageDetail = CmsUserDashboard::where('cms_page_id', '3')->first();
        return view('admin.cms.homePage', compact('homePageDetail'));
    }

    public function updateUserDashboard(Request $request) {
        if ($request->hasFile('video_thumbnail_image')) {

            $validator = Validator::make($request->all(), [
                        "header_title" => "required",
                        "description" => "required",
                        "video_link" => "required",
                        "video_thumbnail_image" => 'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);
            if ($validator->fails()) {
                return redirect()->route('cms.userdashboard')->withErrors($validator)->withInput();
            }

            $dashboarddetail = CmsUserDashboard::get();
            foreach ($dashboarddetail as $details) {
                $thumbnail_image = $details->video_thumbnail_image;
            }

            File::delete(public_path("user_assets/images/" . $thumbnail_image));
            $fileName = time() . '.' . $request->video_thumbnail_image->extension();
            $request->video_thumbnail_image->move(public_path('user_assets/images'), $fileName);
            CmsUserDashboard::where('id', '1')->update([
                'header_title' => $request->header_title,
                'description' => $request->description,
                'video_link' => $request->video_link,
                'video_thumbnail_image' => $fileName
            ]);
        } else {

            $validator = Validator::make($request->all(), [
                        "header_title" => "required",
                        "description" => "required",
                        "video_link" => "required"
            ]);
            if ($validator->fails()) {
                return redirect()->route('cms.userdashboard')->withErrors($validator)->withInput();
            }

            CmsUserDashboard::where('id', '1')->update([
                'header_title' => $request->header_title,
                'description' => $request->description,
                'video_link' => $request->video_link,
                'description_step_1' => $request->description_step_1,
                'description_step_2' => $request->description_step_2,
                'description_step_3' => $request->description_step_3,
            ]);
        }
        Session::flash('message', 'User Dashboard Content has been updated!');
        return redirect()->route('cms.userdashboard');
    }

    /**
     * update the user cms dashboard
     * @param Request $request
     * @return type
     */
    public function updateUserCMSDashboard(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                        "header_title" => "required",
                        "description" => "required",
                        "description_step_1" => "required"
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $cmsPageType = 'HOME-PAGE';
            if ($request->page_type != null && $request->page_type != "") {
                $cmsPageType = $request->page_type;
            }

            $cmsPage = CmsPage::where('name', $cmsPageType)->first();
            if ($cmsPage != null) {

                CmsUserDashboard::where('cms_page_id', $cmsPage->id)->update([
                    'header_title' => $request->header_title,
                    'description' => $request->description,
                    'description_step_1' => $request->description_step_1,
                ]);
                Session::flash('message', 'Content has been updated!');
                return redirect()->back();
            }
            Session::flash('error', 'Something went wrong');
            return redirect()->back();
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    public function messages() {
        return [
            'header_title.required' => 'Header Title is required',
            'description.required' => 'Description is required',
            'video_link.required' => 'Video Link is required',
        ];
    }

    public function affiliated_center() {
        $affiliatedCenter = AffiliatedCenter::first();
        return view('admin.cms.affiliated_center', compact('affiliatedCenter'));
    }

    public function affiliated_center_update(Request $request, $id) {
        $affiliatedCenter = AffiliatedCenter::find($id);
        $video_image = $affiliatedCenter->video_thumbnail_image;

        if ($affiliatedCenter) {

            $this->validate(request(), [
                'video_link' => 'required',
                'step1_content' => 'required',
                'step2_content' => 'required',
                'step3_content' => 'required',
                    ], [
                'video_link.required' => 'Video link is required.',
                'step1_content.required' => 'Step 1 content is required.',
                'step2_content.required' => 'Step 2 content is required.',
                'step3_content.required' => 'Step 3 content is required.',
            ]);

            $affiliatedCenter->fill($request->all());

            if ($request->hasFile('video_thumbnail_image')) {
                $this->validate(request(), [
                    'video_thumbnail_image' => 'mimes:jpeg,jpg,png',
                        ], [
                    'video_thumbnail_image.mimes' => 'Image must be jpeg,jpg or png type.',
                ]);

                File::delete(public_path($video_image));
                $fileName = time() . rand() . '.' . $request->video_thumbnail_image->extension();
                $request->file('video_thumbnail_image')->move(
                        public_path('/uploads/video_thumbnail_image/'),
                        $fileName
                );
                $affiliatedCenter->video_thumbnail_image = '/uploads/video_thumbnail_image/' . $fileName;
            }

            $affiliatedCenter->save();
            return redirect()->route('cms.affiliated.center')->with('message', 'Affiliated Center content has been updated!');
        }
    }

}
