<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'message'   => 'required|string|max:255',
        ]);

        Comments::create([
            'comment' => $request->message,
            'post_id' =>  $request->post_id,
            'user_id' => Auth()->user()->id,
        ]);
        return redirect()->back();
    }



    public function edit(Comments $comments)
    {
        dd($comments);
    }

    public function update(Request $request, Comments $comments)
    {
        //
    }

    public function destroy(Comments $comments)
    {
        //
    }
}
