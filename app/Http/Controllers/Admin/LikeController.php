<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeIt(Post $post)
    {
        $post->like()->create([
            'user_id' => Auth::user()->id,
            //'user_id' => '1',
        ]);
    }

    public function unlikeIt(Post $post)
    {
        $post->like()->where('user_id', Auth::user()->id)->first()->delete();
        //$post->like()->where('user_id', '1')->first()->delete();
        return 'Deleted';
    }
}
