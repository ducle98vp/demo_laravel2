@extends('admin.layouts.main')
@section('content')
<form action="" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="formGroupExampleInput">Name</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </form>  
@endsection
