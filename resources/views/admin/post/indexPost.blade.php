@extends('Layout.app')
@section('title', 'Homepage')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> --}}

</head>
<body>
    <div class="container mt-3">
        <a href="{{ route('admin.post.createPost')}}" class="btn btn-success my-2">Create post</a>
        <table class="table  table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Categorys</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                <tr>
                    
                        <td> {{$loop->iteration}}</td>
                        
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>
                            <img src="{{asset('uploads/'.$post->image)}}" width="80px" height="80px" alt="">
                        </td>
                        <td>{{$post->category->name}}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.post.editPost', ['id' => $post->id])}}" class="btn btn-primary">Update</a>
                            {{-- <button class="btn btn-danger ms-2">Delete</button> --}}

                            <form  method="POST" action={{ route('admin.deletePost', ['id' => $post->id])}}>
                                @method('DELETE')
                                @csrf
                                <button  type="submit" class="btn btn-danger ms-2">Delete</button>
                            </form>
                        </td>
                    
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


</html>
@endsection