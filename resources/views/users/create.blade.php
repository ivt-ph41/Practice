@extends('layouts.master')
@section('content')
    <h1>Create User</h1>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" autocomplete="off">
           
            @if($errors->has('email'))
                <p style="color: red;">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" autocomplete="off">
            @if($errors->has('name'))
                <p style="color: red;">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" autocomplete="off">
            @if($errors->has('password'))
                <p style="color: red;">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <select name="role_id" id="role" class="form-control form-control-lg">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection