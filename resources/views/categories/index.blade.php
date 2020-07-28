
@extends('layouts.main')
@section('title', 'Trang liệt kê')
@section('content')
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th></th>
        </tr>
        @foreach($categories AS $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                <a href="{{route('categories.edit',$category->id)}}">
                        Update
                    </a>
                    <a href="{{ url('category/delete/' . $category->id) }}"
                       onclick="return confirm('Are you delete?')">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
   
@endsection