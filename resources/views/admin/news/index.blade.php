
@extends('admin.layouts.main')
@section('title', 'Trang liệt kê tin tức')
@section('content')
<div><a href="{{route('new.create')}}" class="btn btn-primary">Thêm Mới</a></div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Summary</th>
        <th scope="col">Avatar</th>
        <th scope="col">Content</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($news AS $new)
      <tr>
        <td>{{$new->id}}</td>
        <td>{{$new->title}}</td>
        <td>{{$new->summary}}</td>
        <td><img src='{{asset("assets/uploads/$new->avatar")}}' alt="" width="80px" height="80px"></td>
        <td>{{$new->content}}</td>
        @php
            $status='';
        @endphp
        @switch($new->status)
            @case(0)
                @php($status='Disable')
                    
                
                @break
            @case(1)
                @php($status="Enable")
                @break
            @default
                
        @endswitch
        <td>{{$status}}</td>
        <td><a href="{{route('new.edit',$new->id)}}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{route('new.delete',$new->id)}}" class="btn btn-danger">Delete</a></td>
        <td>{{$new->created_at}}</td>
        <td>{{$new->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  {{$news->links()}}
  
@endsection