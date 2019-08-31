<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // session()->put('sessionCount', 'value');
         $posts = \App\Post::where('user_id',Auth::id())->get();
        // print_r("<pre>");
        // print_r($posts->toArray());
        // print_r("</pre>");
        // die;
        session()->put('post_count', sizeof($posts));
        return view('posts.index')->with('posts',$posts);
        
        // return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'postTitle' => 'required|max:255',
        'postDescription' => 'required',
        ]);
                
        $userId = Auth::id();
        $post = new Post;
        $post->user_id = $userId;
        $post->title = $request->postTitle;
        $post->description = $request->postDescription;
        $post->save();
        return redirect('/post')->with('status', 'Record Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // echo '<pre>';
        // print_r($post->toArray());die;
        // return view("posts.edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $validatedData = $request->validate([
        // 'postTitle' => 'required|max:255',
        // 'postDescription' => 'required',
        // ]);
        $validator = Validator::make($request->all(),[
            'postTitle' => 'required|max:255',
            'postDescription' => 'required',
        ])->validate();
        // if ($validator->fails()) {    
        //     return response()->json($validator->messages(), 422);
        // }


        $post = Post::findOrFail($request->postId);

        $post->title = $request->postTitle;
        $post->description = $request->postDescription;
        $post->update();

        return response()->json(['post'=>$post]);

        // return redirect('/post')->with('status', 'Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/post')->with('status', 'Record Deleted Successfully!');
    }

    public function showpostsinblog()
    {
        $posts = Post::all();
        return view('blog.index')->with('posts',$posts);
    }

    public function showsinglepostinblog($id)
    {
        $singlepost = Post::find($id);
        return view('blog.post')->with('singlepost',$singlepost);
    }
}
