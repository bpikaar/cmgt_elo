@extends('layouts.app')

@section('title', 'Beoordeling toevoegen')

@section('content')

<!-- Current Users -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Beoordeling toevoegen voor <a href="{{ url('docent/beoordeling_overzicht_studenten', $course->name) }}">
                        {{ $course->name }}</a>
                </div>
                <div class="panel-body">
                    @if (count($exams) > 0)
                    {{--@include('common.errors')--}}
                    <form action="{{url('docent/beoordelingen_opslaan')}}" method="post">
                        {{ csrf_field() }}

                        @foreach($exams as $index => $exam)
                            <div>{{ $exam->sprint->name }}</div>

                            <div class="form-group {{$errors->first('code') ? 'has-error' : ''}}">
                                <fieldset>
                                    <legend>{{ $exam->description }}</legend>
                                    <div class="form-group {{$errors->has("exams.$index.result") ? 'has-error' : ''}}">
                                        <label for="code">Beoordeling</label>
                                        <input id="code" type="text" name="exams[{{ $index }}][result]" value="{{ old("exams.$index.result") }}" class="form-control"/>
                                        <div class="text-danger">{{ $errors->first("exams.$index.result") }}</div>
                                    </div>

                                    <label for="code">Feedback</label>
                                    <textarea name="exams[{{ $index }}][feedback]" class="form-control" rows="6">{{ old("exams.$index.feedback") }}</textarea>

                                    <input type="hidden" name="exams[{{ $index }}][id]" value="{{ $exam->id }}" />
                                </fieldset>
                            </div>
                        @endforeach
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <div class="data-submit">
                            <input type="submit" name="submit" value="Opslaan" class="form-control btn btn-primary"/>
                        </div>
                    </form>
                    @else
                        <div>
                            Er zijn nog geen toetsmomenten voor deze cursus aangemaakt.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection