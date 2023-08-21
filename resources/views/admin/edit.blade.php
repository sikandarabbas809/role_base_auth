@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('admin.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $user->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection