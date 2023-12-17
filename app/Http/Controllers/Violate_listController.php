<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Violate_list;


class Violate_listController extends Controller
{
    public function violatelist($postsId)
{
        
    
        return view('layouts/posts/violate', compact('postsId'));
}

    public function violate(Request $request)
{
        $violate_list = new Violate_list;
        $violate_list->user_id = auth()->id();
        $violate_list->post_id = $request->input('post_id');
        $violate_list->title = $request->input('title');
        $violate_list->violate_comment = $request->input('violate_comment');
        
        $violate_list->save();
    
        return view('layouts/posts.index', compact('violate_list'));
}


}
