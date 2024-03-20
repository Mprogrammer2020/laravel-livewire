<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with('user')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $image = $post->image;

        if ($post) {
            $this->validate(request(), [
                'title' => 'required',
                'description' => 'required',
            ], [
                'title.required' => 'Title is required.',
                'description.required' => 'Description is required.',
            ]);

            $post->fill($request->all());

            if ($request->hasFile('image')) {
                $this->validate(request(), [
                    'image' => 'mimes:jpeg,jpg,png',
                ], [
                    'image.mimes' => 'Image must be jpeg,jpg or png type.',
                ]);

                File::delete(public_path('/user_assets/images/' . $image));
                $fileName = time() . rand() . '.' . $request->image->extension();
                $request->file('image')->move(
                    public_path('/user_assets/images/'),
                    $fileName
                );
                $post->image = $fileName;
            }

            $post->save();
            return redirect()->route('posts.index')->with('message', 'Post content has been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            File::delete(public_path('/user_assets/images/' . $post->image));
            $post->delete();
            return redirect()->route('posts.index')->with('message', 'Post deleted successfully.');
        } else {
            return redirect()->route('posts.index')->with('message', 'Post not found.');
        }
    }

    public function post_view($id)
    {
        $post = Post::find($id);
        //dd($post);

        return view('admin.posts.view', compact('post'));
    }
}
