@extends('Layout.app')
@section('title', 'Homepage')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container mt-3">
        <a href={{ route('admin.post.indexPost')}} class="btn btn-success my-2">back</a>
        <form  method="POST" action="{{ route('admin.updatePost', ['id' => $post->id])}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h3>Edit Post</h3>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" value="{{ $post->title}}" class="form-control" id="title" name="title" >
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" value="{{ $post->content}}" class="form-control" id="content" name="content" >
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" value="{{$post->image}}"  name="image" >
                {{-- <p>{{$post->image}}</p> --}}
                <img src="{{asset('uploads/'.$post->image)}}" width="80px" height="80px" alt="">
            </div>

            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Select Category</label>
                <select id="disabledSelect" name="category_id" class="form-select">
                  {{-- <option>Disabled select</option> --}}
                  @foreach ($categories as $category)

                    <option value="{{ $category->id}}" {{$category->id == $post->category_id ? ' selected' : ''}}>{{ $category->name}}</option>
                      
                  @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </form>
    </div>
</body>
</html>


@endsection