@extends('master/layout')
@section('title')
   Modifier {{$post->title}}
@endsection
@section('style')
<style>
    body{
        background-color: rgb(198, 216, 162)
    }
</style>

@endsection
@section('content')
<div class="row my-4">
    <div class="col-md-8 mx-auto">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Modifier {{$post->title}}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('post.update',$post->slug)}}"  enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1"   class="form-label">TITRE</label>
                            <input type="text" class="form-control" value="{{$post->title}}" name="title" placeholder="Titre">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">IMAGE</label>
                            <input type="file" class="form-control" name="image" >
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"  >DESCRIPTION</label>
                            <textarea class="form-control" name="body" rows="3">{{$post->body}}</textarea>
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary">Modifier</button>
                          </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
