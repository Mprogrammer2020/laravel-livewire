<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

  public function index()
  {
    $posts = Post::latest()->with('user')->paginate(5);
    return response()->json(['status' => true, 'data' => $posts, 'message' => 'Success']);
  }


  public function postsave(Request $request)
  {
    $validator  =   Validator::make($request->all(), [
      "title"  =>  "required",
      "description"  =>  "required",
      "image" =>  "required|image|mimes:jpg,png,jpeg"
    ]);
    if ($validator->fails()) {
      return response()->json([
        'message' => $validator->errors(), 'status' => false
      ]);
    } else {
      $fileName = time() . rand() . '.' . $request->image->extension();
      $path = $request->file('image')->storeAs(
        'posts',
        $fileName,
        'public'
      );
      $post = new Post;
      $post->image = "posts/{$fileName}";
      $post->fill($request->all());
      $post->user()->associate(User::find(auth()->id()));
      $post->save();
      return response()->json([
        'message' => 'post save successfully!!', 'status' => true
      ]);
    }
  }
  public function postDelete(Request $request, Post $post)
  {
    $post->delete();
    return response()->json([
      'message' => 'post has been deleted successfully!!', 'status' => true
    ]);
  }

  // public function postlist(){
  //     $posts = Post::get();
  //     return response()->json(["status" => true, "data" => $posts]);
  // }
}
