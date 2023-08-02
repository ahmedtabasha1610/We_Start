@extends('layouts.app')
@section('content')
    <div class="contanier">
        <!-- Content Header (Page header) -->
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h3 class="m-0">All Categories</h3>
            <a class="btn btn-dark btn-sm" href="{{ route('category.create') }}"><i class="bx bx-plus me-1"></i>Add New
                Category</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Category Name</th>
                    <th style="">Image</th>
                    <th style="">Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>


                        <td>
                            @php
                                $path = public_path('images/' . $category->image);
                                if (file_exists($path)) {
                                    $path = asset('images/' . $category->image);
                                } else {
                                    $path = asset('images/no-image.png');
                                }
                            @endphp

                            <img width="50px" height="50px" class="rounded-circle" src="{{ $path }}" alt="">

                        </td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <div class="btn btn-group" role="group">
                                <a class="btn btn-primary btn-sm" href=""><i class="fas fa-eye"></i></a>
                                <a class="btn btn-success btn-sm" href="{{ route('category.edit', $category->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="deleteCategory(event)" class="btn btn-danger btn-sm"
                                        style="border-top-left-radius: 0%; border-bottom-left-radius:0%">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function deleteCategory(e) {
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
                        e.target.closest('form').submit();
                    }
                })
            }
        </script>
    @endsection
