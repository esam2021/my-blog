<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Triats\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    use Upload;
    public function index()
    {
        $posts = Post::where('user_id', Auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('profile.profile')->with('posts', $posts);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::where('id', $id)->get();
        // return view('profile.edit')->with('user', $user);
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->get();
        return view('profile.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        return response($id);
        // $request->validate([
        //     'name'      => ['required', 'max:255'],
        //     'password'  => ['required'],
        //     'avatar'    => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        // ]);

        // User::where('id', $id)->update([
        //     'name'      => $request->name,
        //     'password'  => Hash::make($request->password),
        //     'avatar'    => $this->uploadImage($request, 'users')
        // ]);

        // return redirect()->route('/home');
    }

    public function destroy($id)
    {
        //
    }
}
