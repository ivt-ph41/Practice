@extends('layouts.master')
@section('content')
@if(isset($role))
<h1>List User of Role: {{ $role->name}}</h1>
@else
<h1>List User </h1>
@endif
    
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @if(isset($role))
                @foreach($role->users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            @else
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>
@endsection