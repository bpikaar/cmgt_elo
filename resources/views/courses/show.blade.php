<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 14-1-2016
 * Time: 16:29
 * resources/views/courses/show
 */

?>
@extends('layouts.app')

@section('title', 'Resultaten voor de cursus '.$course->name)

@section('content')

        <!-- Current Users -->
@if (count($exams) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Resultaten voor de cursus {{ $course->name }}</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                            @foreach ($exams as $exam)
                                <th><a href="{{ url('exams', $exam->id) }}">{{ $exam->description }}</a></th>
                            @endforeach
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach ($resultTable as $index => $results)
                                <tr>
                                    @foreach($results as $result)
                                    <td class="table-text">
                                        <div>{!!$result!!}</div> {{-- {!!  !!}} = raw data --}}
                                    </td>
                                    @endforeach
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