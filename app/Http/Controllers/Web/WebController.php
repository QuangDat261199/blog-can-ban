<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $highlight = Post::where('highlight_post', 1)
            ->take(3)->get();
        $new = Post::where('new_post', 1)->take(10)->get();
        return view('web.home', compact('highlight', 'new'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->update([
            'view_counts' => $post->view_counts++
        ]);

        $relate = Post::where('category_id', $post->category_id)->take(2)->inRandomOrder()->get();

        $highlight = Post::where('highlight_post', 1)
            ->take(3)->get();
//        $comments = Comment::where("post_id", $post->id)->paginate(10);

        return view('web.post', compact('post', 'relate', 'highlight'));
    }
}
