<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //latest()->get() : pour retorne les valeur mratbine
    //all : pour retorne les valeur mratbine bi chakl 3achwaii
    //orderBy("created_at","DESC") : tartib bl desc
    //orderBy("title","DESC") : tartibe bl desc walakine hassab title z--a
    //where("title","=","the king..." ) mili ykon dak title yossawi dak titlet
    //first("title","DESC")
    //paginate(2) :: kola page chhal ytaafichaw fiha mn post page 1:2post
    //page 2 :6

    public function index() {
        $posts = Post::latest()->paginate(6);
        return view('home')->with([
            'posts'=>$posts,
        ]);
    }


    public function show($slug)
    {
        //use id in slug   $post = Post::find($id);
        $post = Post::where('slug',$slug)->first();
        return view('show')->with([
            'post'=>$post
        ]);
    }

    public function create(){
        return view('create');
    }


    public function store(PostRequest $request){
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $image_name,
            'user_id'=>auth()->user()->id
        ]);
        return redirect()->route('home')->with([
                'success' => 'article ajouté avec success'
        ]);

        /*
        ----------------------methode 1 :----------------
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->image = 'https://via.placeholder.com/640x480.png/002244?text=new post';
        $post->save();
        */

    }

    public function edit($slug){
        $post = Post::where('slug',$slug)->first();
        return view('edit')->with([
            'post'=>$post
        ]);
    }

    public function update(Request $request,$slug){
        $post = Post::where('slug',$slug)->first();
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
            unlink(public_path('uploads').'/'.$post->image);
            $post->image = $image_name;
        }
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $post->image,
            'user_id'=>auth()->user()->id

        ]);
        return redirect()->route('home')->with([
            'success' => 'article mise a jour '
    ]);
    }
    public function delete($slug){

        $post = Post::where('slug',$slug)->first();
        //unlink(public_path('uploads').$post->image);
        unlink(public_path('uploads').'/'.$post->image);
        $post -> delete();
        return redirect()->route('home')->with([
            'success' => 'Article supprimer'
        ]);
    }



}
