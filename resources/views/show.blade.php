
@extends('master/layout')
@section('title')
   {{$post->title}} 
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
        <div class="row">
               <div class="col-md-8 mb-2" >
                  <div class="card h-100 "  >
                     <img src="{{asset('./uploads/'.$post->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                     <h5 class="card-title">{{$post->title}}</h5>
                     <p class="card-text">{{$post->body}}</p>
                    </div>
                  </div>
                  @if(auth()->check())
                    @if(auth()->user()->id == $post->user_id)
                  <a href="{{route('post.edit',$post->slug)}}" class="btn btn-warning">
                    Modifier
                </a>
                <form action="{{route('post.delete',$post->slug)}}" method="post">
                    @csrf
                    @method('DELETE')
                <button  class='btn btn-danger' type="submit">Supprimer</button>
                </form>
                  @endif
                  
                  @endif
               </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        //alert('hello developpers')
    </script>
@endsection