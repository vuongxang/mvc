@extends('layouts.main')

@section('title','Quản lý tài khoản');
@section('content')
<p class="text-danger">{{ isset($_GET['msg']) ?  $_GET['msg']: null }}</p>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>avatar</th>
            <th>email</th>
            <th>role</th>
            <th>
            <a class="btn btn-success" href="{{ BASE_URL.'add-user'}}">Add new</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td> {{$item->id}} </td>
                <td> {{$item->name}} </td>
                <td> <img src="{{BASE_URL}}{{$item->avatar}}" alt="" width="100"> </td>
                <td> {{$item->email}} </td>
                <td> @if ($item->role==1)
                    admin
                    @else
                    Customor
                    @endif
                     </td>
                <td>
                <a class="btn btn-primary" href="{{BASE_URL.'edit-user'}}?id={{$item->id}}">Edit</a>
                <a class="btn btn-danger" href="{{BASE_URL.'remove-user'}}?id={{$item->id}}">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection