@extends('layouts.app')

@section('title', 'All users')

@section('content')

<!-- Current Users -->
@if (count($users) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Overzicht studenten voor cursus <strong>{{ $course->name }}</strong></div>
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
                                        <div><a href="{{url('users', $user->id)}}">{{ $user->fullName() }}</a></div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $user->code }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $user->email }}</div>
                                    </td>
                                    <td class="table-text">
                                        {{--<div><a href="alle-feedback/{{$user->id}}">Alle feedback</a></div>--}}
                                        <div><a href="{{ url('/docent/beoordeling_toevoegen', [$course->name, $user->id]) }}">Beoordeling toevoegen</a></div>
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