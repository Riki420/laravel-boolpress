<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|string|min:5',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id'
        ]);


        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->user_id = Auth::id();
        $post->save();

        if (array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);

        return redirect()->route('admin.posts.index')->with('alert', 'success')->with('alert-message', 'Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $tagIds = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'tagIds'));
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

        $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($id), 'string', 'min:5'],
            'content' => 'required|string',
        ]);

        $data = $request->all();
        $post = Post::findOrFail($id);
        $post->fill($data);
        $post->user_id = Auth::id();

        if (!array_key_exists('tags', $data)) $post->tags()->detach();
        else $post->tags()->sync($data['tags']);

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('alert', 'warning')->with('alert-message', 'Edit Successfully');
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
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert', 'danger')->with('alert-message', 'Delete Successfully');
    }
}
