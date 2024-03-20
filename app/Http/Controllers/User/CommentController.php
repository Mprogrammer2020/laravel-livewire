<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {

    //
    public function commentsave(Request $request) {

//Comment

        $validator = Validator::make($request->all(), [
                    "comment" => "required",
                    "post_id" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                        'message' => $validator->errors(), 'status' => false
            ]);
        } else {
            $comment = new Comment;
            $comment->fill($request->all());
            $comment->user()->associate(User::find(auth()->id()));
            $comment->save();
            return response()->json([
                        'message' => 'Comment save successfully!!', 'status' => true, 'data' => $comment->post
            ]);
        }
    }

    public function commentlist(Post $post) {
        return response()->json([
                    'message' => 'Comments by post', 'status' => true, 'data' => $post->comments()->latest()->paginate(3)
        ]);
    }

    /**
     * delete the comment
     * @param Request $request
     * @param Comment $comment
     * @return type
     */
    public function commentDelete(Request $request, Comment $comment) {
        $comment->delete();
        return response()->json([
                    'message' => 'Comment has been deleted successfully!!', 'status' => true, 'data' => $comment->post
        ],200);
    }

}
