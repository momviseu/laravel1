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
            <a href={{ route('admin.category.createCategory')}} class="btn btn-success my-2">Create Category</a>
            <table class="table  table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
    
                <tbody>

                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            
                            <td class="d-flex">
                                <a href={{ route('admin.category.editCategory', ['id' => $category->id])}} class="btn btn-primary">Update</a>

                                <form  method="POST" action={{ route('admin.DeleteCategory', ['id' => $category->id])}}>
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

    <script>

        window.addEventListener("show-delete-confirmation", evemt =>{
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            })
        })

        // Swal.fire({
        //     title: 'Are you sure?',
        //     text: "You won't be able to revert this!",
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //     if (result.isConfirmed) {
        //         Swal.fire(
        //         'Deleted!',
        //         'Your file has been deleted.',
        //         'success'
        //         )
        //     }
        // })
    </script>
    </html>
@endsection
