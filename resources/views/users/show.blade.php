<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 14-1-2016
 * Time: 16:29
 * resources/views/users/show
 */

?>
@extends('layouts.app')
@section('title', 'Users details')

@section('content')
    <ul>
        <li>{{$user->firstname}}</li>
        <li>{{$user->lastname}}</li>
        <li>{{$user->code}}</li>
        <li>{{$user->email}}</li>
    </ul>
    <h3>Rechten</h3>
    <ul>
        @foreach($user->roles as $r)
            <li>{{ $r->name }}</li>
        @endforeach
        @if(auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('user.roles', $user->id) }}">Change</a>
            </li>
        @endif
    </ul>
@endsection