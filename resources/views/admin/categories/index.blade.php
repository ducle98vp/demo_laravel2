
@extends('admin.layouts.main')
@section('title', 'Trang liệt kê')
@section('content')
<div><a href="{{route('categories.create')}}" class="btn btn-primary">Thêm Mới</a></div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Up Date</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories AS $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{route('categories.delete',$category->id)}}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
   {{$categories->links()}}
@endsection