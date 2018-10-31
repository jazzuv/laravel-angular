<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreatePostController extends Controller
{


    public function __construct()
    {       
        $this->DB  = new DB();
    }


  public function create(Request $request)
  {
      $this->validate($request, [        
        'topic' => 'required'
        ]);
    
      $post = new Post;      
      $post->topic = $request->input('topic');
      $post->save();
    
      return response()->success(compact('post'));
  }
  

  public function get_data(){
    $getArr  = $this->DB::select('select topic from posts');
    return response()->json(['status' => 0,'data' =>$getArr ]);     
  }
}