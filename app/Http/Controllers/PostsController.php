<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('title','asc')->paginate(12);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);
        
        if($request->hasfile('cover_image') && $request->hasfile('video')){
            $imageNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $videoNameWithExt = $request->file('video')->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $videoName = pathinfo($videoNameWithExt, PATHINFO_FILENAME);
            $imageExtension = $request->file('cover_image')->getClientOriginalExtension();
            $videoExtension = $request->file('video')->getClientOriginalExtension();
            $imageNameToStore = $imageName.'_'.time().'.'.$imageExtension;
            $videoNameToStore = $videoName.'_'.time().'.'.$videoExtension;
            $imagepath = $request->file('cover_image')->storeAs('public/cover_images', $imageNameToStore);
            $videopath = $request->file('video')->storeAs('public/videos', $videoNameToStore);
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->rating = $request->input('rating');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $imageNameToStore;
        $post->video = $videoNameToStore;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); 
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
            return redirect('/posts')->with('error', ' Unauthorized Page');

        return view('posts.edit')->with('post',$post);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);
        
        if($request->hasfile('cover_image') && $request->hasfile('video')){
            $imageNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $videoNameWithExt = $request->file('video')->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $videoName = pathinfo($videoNameWithExt, PATHINFO_FILENAME);
            $imageExtension = $request->file('cover_image')->getClientOriginalExtension();
            $videoExtension = $request->file('video')->getClientOriginalExtension();
            $imageNameToStore = $imageName.'_'.time().'.'.$imageExtension;
            $videoNameToStore = $videoName.'_'.time().'.'.$videoExtension;
            $imagepath = $request->file('cover_image')->storeAs('public/cover_images', $imageNameToStore);
            $videopath = $request->file('video')->storeAs('public/videos', $videoNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->rating = $request->input('rating');
        if($request->hasfile('cover_image'))
            $post->cover_image = $imageNameToStore;
        if($request->hasfile('video'))
            $post->video = $videoNameToStore;    
        $post->save();

        return redirect('/posts');
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
        if(auth()->user()->id !== $post->user_id)
            return redirect('/posts')->with('error', ' Unauthorized Page');
            
        Storage::delete('public/cover_images/'.$post->cover_image);   
        Storage::delete('public/videos/'.$post->video);       
        $post->delete();
        return redirect('/posts');
    }
}
