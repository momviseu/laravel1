@extends('Layout.app')
@section('title', 'Post')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <div class="container mt-3">
        <a class="btn btn-success" href="{{ route('admin.post.indexPost')}}">Back</a>
        <form method="POST" action="{{ route('admin.storePost')}}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control " id="title" name="title" >
                
            </div>
            

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control" id="content" name="content" >
                
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control"  name="image" >
                
            </div>

            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Select Category</label>
                <select id="disabledSelect" name="category_id" class="form-select ">
                  {{-- <option>Disabled select</option> --}}
                  @foreach ($categories as $category)

                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                      
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