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
    
    <div class="container">
        <form method="POST" action={{ route('admin.storeCategory')}}>
            @csrf
            <h3>Create Category</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Create a category</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
                {{-- @error('name')
                    <div class="invalid-feedback">{{ $message}} </div>
            
                @enderror --}}
                <div class="invalid-feedback">
                    please input of the category!
                  </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

@endsection