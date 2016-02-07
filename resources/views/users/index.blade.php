<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 13-1-2016
 * Time: 21:25
 */
// resources/views/users/index.blade.php
?>
@extends('layouts.app')

@section('title', 'All users')

@section('content')

<!-- Current Users -->
@if (count($users) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Overzicht gebruikers</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>Naam</th>
                                <th>Code</th>
                                <th>E-mailadres</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div><a href="{{url('users', $user->id)}}">{{ $user->firstname.$user->name_prefix.' '.$user->lastname }}</a></div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $user->code }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $user->email }}</div>
                                    </td>
                                    <td class="table-text">
                                        {{--<div><a href="alle-feedback/{{$user->id}}">Alle feedback</a></div>--}}
                                        <div><a href="{{ url('alle-feedback', $user->id) }}">Alle feedback</a></div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection