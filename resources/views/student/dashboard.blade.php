@extends('layouts.app')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar', ['bbs' => $navbbs])
@endsection

@section('content')
    <h1>test</h1>
@endsection