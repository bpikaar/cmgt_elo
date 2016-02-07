@extends('layouts.app')

@section('title', 'Overzicht van Building Blocks')

@section('content')
        <!-- Current Users -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aanvraag assessment voor <strong>{{ $bb->name }}</strong></div>
                <div class="panel-body">
                    {!! Form::model($bb) !!}
                    {{--{!! Form::token() !!}--}}

                    <div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Naam') !!}
                        {!! Form::text('name', $bb->name, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="form-group">
                        {!! Form::file('upload') !!}
                    </div>

                    <div class="data-submit">
                        <input type="submit" name="submit" value="Verzenden" class="form-control btn btn-primary"/>
                    </div>
                    {!! Form::close() !!}
                    <iframe width="100%" height="800" style="border: 0px solid black; overflow-x: hidden; " src="https://calendar.google.com/calendar/selfsched?sstoken=UUVXWGk1Xy1XTTNMfGRlZmF1bHR8Nzc4NjcxYjQzOGQ4MzA3ODI3NjdkMTU1ZTQ1Mjk2ZDM&amp;width=700&amp;height=600"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection