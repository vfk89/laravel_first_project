<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete($post);
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
