<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\InfoPost;
use App\Comment;
use Illuminate\Support\Str;

class PostController extends Controller
{

    protected $postValidator = [
        'title' => 'required|string|max:80',
        'body' => 'required|string',
        'author' => 'required|string|max:60',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->postValidator);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        $post = new Post();
        $post->fill($data);
        $post->save();

        $data['post_id'] = $post->id;
        $infoPost = new InfoPost();
        $infoPost->fill($data);
        $infoPost->save();

        if (!empty($data["tags"])) {
            $post->tags()->attach($data["tags"]);
        }

        return redirect()->route('posts.index')
            ->with('created', 'Elemento' . " '$post->title' " . 'creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->postValidator);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        $post->update($data);

        $infoPost = InfoPost::where('post_id', $post->id)->first();
        $infoPost->update($data);

        if (empty($data['tags'])) {
            $post->tags()->detach();
        } else {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('posts.index')
            ->with('edited', 'Elemento' . " '$post->title' " . 'modificato correttamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('deleted', 'Elemento' . " '$post->title' " . 'eliminato correttamente');
    }
}
