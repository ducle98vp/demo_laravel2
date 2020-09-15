@extends('admin.layouts.main')
@section('content')
<form action="{{route('new.update',$new->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" name="name" value="{{$new->title}}">
    @error('name')
	    <p style="color: red">{{$message}}</p>
	@enderror
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
    <textarea name="summary" id="Sumary" class="form-control">{{$new->summary}}</textarea>
        @error('summary')
	    <p style="color: red">{{$message}}</p>
	    @enderror
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
        @error('avatar')
	    <p style="color: red">{{$message}}</p>
	    @enderror
    </div>
    <div class="form-group">
        <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control">{{$new->content}}</textarea>
        @error('content')
	    <p style="color: red">{{$message}}</p>
	@enderror
    </div>
    <div class="form-group">
       <label for="status">Status</label>
       <select name="status" id="status" class="form-control">
            <option value="0" {{$new->status==0?'selected':''}}>Disable</option>
            <option value="1" {{$new->status==1?'selected':''}}>Enable</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>  
@endsection
