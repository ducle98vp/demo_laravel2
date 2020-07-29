@extends('layouts.main')
@section('content')
<form action="" method="POST">
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
        <select name="" id="category" class="form-control">
            <option value=""></option>
        </select>
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
        <textarea name="summary" id="Sumary" class="form-control"></textarea>
    </div>
    <div class="form-group">
       <label for="">Status</label>
       <p></p>
       <input type="radio" class="">Disable
       <input type="radio" class="">Enable
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" id="avatar">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </form>  
@endsection
