@extends('layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="formGroupExampleInput">Name</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
        <textarea name="summary" id="Sumary" class="form-control"></textarea>
    </div>
    <div class="form-group">
       <label for="status">Status</label>
       <select name="status" id="status" class="form-control">
       
            <option value="0">Disable</option>
            <option value="1">Enable</option>
        
    </select>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </form>  
@endsection
