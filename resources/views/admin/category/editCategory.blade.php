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
        <a href={{ route('admin.category.indexCategory')}} class="btn btn-success my-2">back</a>
        <form action="{{ route('admin.updateCategory', ['id' => $category->id])}}" method="POST">
            @method('PUT')
            @csrf
            
            <h3>Edit Category</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Create a category</label>
                <input type="text" value="{{ $category->name}}" class="form-control" id="name" name="name" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>


@endsection