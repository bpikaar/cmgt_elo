@extends('layouts.app')

@section('title', 'Overzicht van alle vakken')

@section('content')

<!-- Current Users -->
@if (count($courses) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Overzicht van alle vakken</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>Vak</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div><a href="{{url('docent/beoordeling_overzicht_studenten', $course->name)}}">{{ $course->name }}</a></div>
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