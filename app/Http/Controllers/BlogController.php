<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('frontEnd.blog', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('frontEnd.article', compact('post'));
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'person' => 'required|string|max:255',
            'text' => 'required|string|max:500',
        ]);

        $data = $request->all();
        $data['post_id'] = $id;

        $comment = new Comment();
        $comment->fill($data);
        $comment->save();

        return back();
    }

}
