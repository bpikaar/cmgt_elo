@extends('layouts.app')

@section('title', 'Alle feedback voor '.$exam->description)

@section('content')

<!-- Current Users -->

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Alle feedback voor {{ $exam->description }} van <a href="{{ url('courses', $course->id) }}">{{ $course->name }}</a></div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                            <th>Feedback</th>
                            <th>Aangemaakt op</th>
                            <th>Laatst bijgewerkt</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @if (count($feedback) > 0)
                            @foreach ($feedback as $item)
                                <tr>
                                    <!-- Content -->
                                    <td class="table-text">
                                        <div>{{ $item->content }}</div>
                                    </td>
                                    <td>
                                        <dv>{{ $item->created_at }}</dv>
                                    </td>
                                    <td>
                                        <dv>{{ $item->updated_at }}</dv>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="3">Er is nog geen feedback gegeven.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection