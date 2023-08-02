@extends('layouts.app')
@section('content')
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Create New Category</h5>
        <small class="text-muted float-end">New Category</small>
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
              <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="company name" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
            </div>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Select Image</label>
            <input class="form-control" name="image" type="file" id="formFile">
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        
      </div>
    </div>
  </div>
</form>
@endsection