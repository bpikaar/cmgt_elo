@extends('layouts.app')

@section('content')
    {!! Form::open([]) !!}
    <ul>
    @foreach($roles as $r)
        <li>
        <label for="{{ $r->name }}">
            <input type="checkbox" {{ $user->hasRole($r->name) ? 'checked' : '' }} id="{{ $r->name }}" name="roles[]" value="{{ $r->id }}"> {{ ucfirst($r->name) }}
        </label>
        </li>
    @endforeach
    </ul>
    {!! Form::submit('Opslaan', ['class'=>'btn btn-success']) !!}
    {!! Form::close([]) !!}
@endsection