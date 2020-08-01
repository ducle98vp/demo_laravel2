
@extends('layouts.main')
@section('title', 'Trang liệt kê')
@section('content')
<div><a href="{{route('products.create')}}" class="btn btn-primary">Thêm Mới</a></div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Category_ID</th>
        <th scope="col">Price</th>
        <th scope="col">Avatar</th>
        <th scope="col">Summary</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($products AS $product)
      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->category_id}}</td>
        <td>{{$product->price}}</td>
        <td><img src='{{asset("assets/uploads/$product->avatar")}}' alt="" width="80px" height="80px"></td>
        <td>{{$product->summary}}</td>
        @php
            $status='';
        @endphp
        @switch($product->status)
            @case(0)
                @php($status='Disable')
                    
                
                @break
            @case(1)
                @php($status="Enable")
                @break
            @default
                
        @endswitch
        <td>{{$status}}</td>
        <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{route('products.delete',$product->id)}}" class="btn btn-danger">Delete</a></td>
        <td>{{$product->created_at}}</td>
        <td>{{$product->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  {{$products->links()}}
  
@endsection