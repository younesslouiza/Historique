
@extends('master/layout')
@section('title')
   Home Page 
@endsection
@section('style')
<style>
    body{
        background-color: #dddddd
    }
</style>
    
@endsection
@section('content')
<div class="row my-5" >
    <div class="col-md-8">
        @if(session()->has('success'))
        <div class="alert alert-succes">
            {{session()->get('success')}}
        </div>
        @endif
        <div class="row">
            @foreach ($posts as $post)
               <div class="col-md-4 mb-4" >
                  <div class="card h-100 "  >
                     <img src="{{asset('./uploads/'.$post->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                     <h5 class="card-title">{{$post->title}}</h5>
                     <h5 class="card-title">{{$post->user ? $post->user->name :null }}</h5>
                     <p class="card-text">{{Str::limit($post->body)}}</p>
                     <a href="{{ route('post.show',$post->slug)}}" class="btn btn-primary">Voir</a>
                    </div>
                  </div>
               </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center my-4">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        //alert('hello developpers')
    </script>
@endsection