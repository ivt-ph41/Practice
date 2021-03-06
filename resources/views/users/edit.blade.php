@extends('layouts.master')
@section('content')
    <h1>Edit User</h1>
    <form action="{{route('users.update', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="email" autocomplete="off">
            @if($errors->has('email'))
                <p style="color: red;">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" autocomplete="off">
            @if($errors->has('name'))
                <p style="color: red;">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="" class="form-control" id="password" autocomplete="off">
            @if($errors->has('password'))
                <p style="color: red;">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <select name="role_id[]" id="role" class="form-control form-control-lg" multiple>
            @php
               $listRoleID = $user->roles->pluck('id')->toArray();
            @endphp
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" 
                {{ in_array($role->id, $listRoleID) ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection