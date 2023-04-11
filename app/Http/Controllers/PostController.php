<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use App\Triats\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    use Upload;
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->all();
        return view('home')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required', 'unique:posts'],
            'photo' =>  ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        ]);
        $slug = Str::slug($request->title, '-');
        $post               = new Post();
        $post->title        = $request->title;
        $post->content      = $request->content;
        $post->slug         = $slug;
        $post->photo        = $this->uploadImage($request, 'posts');
        $post->user_id   = Auth()->user()->id;
        $post->save();
        return redirect()->route('home');
    }

    public function show($slug)
    {
        $post = Post::where('title', $slug)->get()[0];
        if (!empty($post)) {
            $comments = Comments::where('post_id', $post->id)->get();
            return view('posts.show', compact('post', 'comments'));
        }
        return view('posts.show', compact('post'));
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->get()[0];
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $slugUpdata)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'photo' =>  ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        ]);
        $slug = Str::slug($request->title, '-');
        Post::where('slug', $slug)->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'slug'      => $slug,
            'photo'     => $this->uploadImage($request, 'posts'),
            'user_id'   => Auth()->user()->id
        ]);
        return redirect()->back();
    }

    public function destroy($slug)
    {
        Post::where('slug', $slug)->delete();
        return redirect()->route('home');
    }
}
