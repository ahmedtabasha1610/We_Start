@extends('layouts.app')
@section('content')
<form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT');
<div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Update Category</h5>
        <small class="text-muted float-end">Update Category</small>
          </div>
          @if ($errors->any())
                <div class="alert alert-danger" role="alert">  
                    @foreach($errors->all() as $errors)
                    {{$errors}}
                    @endforeach
                </div>
          @endif
      <div class="card-body">

            <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname">Name Of Category</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bxs-category' ></i></span>
              <input type="text" name="name" class="form-control" value="{{old('name' , $category->name)}}" id="basic-icon-default-fullname" placeholder="company name" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
            </div>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Select Image</label>
            <input class="form-control" name="image" type="file">
          </div>
          <div class="m-3">
            @php
            $path = public_path('images/' . $category->image);
            if (file_exists($path)) {
                $path = asset('images/' . $category->image);
            } else {
                $path = asset('images/no-image.png');
            }
        @endphp

        <img width="70px" class="" src="{{ $path }}" alt="">
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        
      </div>
    </div>
  </div>
</form>
@endsection