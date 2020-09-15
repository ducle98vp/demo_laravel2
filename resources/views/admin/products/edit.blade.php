@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="formGroupExampleInput">Name</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="name" value="{{$product->title}}">
      @error('name')
    <p style="color:red"><i>{{$message}}</i></p>
      @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{$product->price}}">
        @error('price')
    <p style="color:red"><i>{{$message}}</i></p>
      @enderror
    </div>
    <div class="form-group">
        <label for="quality">Quality</label>
    <input type="number" class="form-control" id="quality" placeholder="Enter Price" name="quality" value="{{$product->quality}}">
    @error('quality')
    <p style="color:red"><i>{{$message}}</i></p>
      @enderror
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$category->id==$product->id ? 'selected' :''}}>{{$category->name}}
                </option> 
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
    <textarea name="summary" id="Sumary" class="form-control">{{$product->summary}}</textarea>
    @error('summary')
    <p style="color:red"><i>{{$message}}</i></p>
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Content</label>
  <textarea name="content" id="content" class="form-control">{{$product->content}}</textarea>
  <script type="text/javascript">
    config = {};
    config.entities_latin=false;
    CKEDITOR.replace('content',config);

  </script>
  @error('content')
  <p style="color:red"><i>{{$message}}</i></p>
    @enderror
  </div>
    <div class="form-group">
       <label for="status">Status</label>
       <select name="status" id="status" class="form-control">
      
            <option value="0" @if ($product->status==0)
                {{'selected'}}
            @endif>Disable</option>
            <option value="1" @if ($product->status==1)
                {{'selected'}}
            @endif>Enable</option>
        
    </select>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
        @error('avatar')
    <p style="color:red"><i>{{$message}}</i></p>
      @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>  
@endsection
