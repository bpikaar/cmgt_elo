<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 13-1-2016
 * Time: 22:02
 */
// resources/views/users/create.blade.php

?>
@extends('layouts.app')

@section('title', 'All users')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Gebruiker aanmaken</div>
                <div class="panel-body">
                    @include('common.errors')
                    <form action="{{url('users')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{$errors->first('code') ? 'has-error' : ''}}">
                            <label for="code">Studentnummer</label>
                            <input id="code" type="text" name="code" value="{{ old('code') }}" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                        </div>
                        <div class="form-group {{$errors->first('firstname') ? 'has-error' : ''}}">
                            <label for="firstname">Voornaam</label>
                            <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('firstname') }}</span>
                        </div>
                        <div class="form-group {{$errors->first('name_prefix') ? 'has-error' : ''}}">
                            <label for="name_prefix">Tussenvoegsel</label>
                            <input id="name_prefix" type="text" name="name_prefix" value="{{ old('name_prefix') }}" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('name_prefix') }}</span>
                        </div>
                        <div class="form-group {{$errors->first('lastname') ? 'has-error' : ''}}">
                            <label for="lastname">Achternaam</label>
                            <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                        </div>
                        <div class="form-group {{$errors->first('email') ? 'has-error' : ''}}">
                            <label for="email">E-mail</label>
                            <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group {{$errors->first('password') ? 'has-error' : ''}}">
                            <label for="password">Wachtwoord</label>
                            <input id="password" type="password" name="password" value="" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group {{$errors->first('password_confirmation') ? 'has-error' : ''}}">
                            <label for="password-confirm">Herhaal wachtwoord</label>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation">
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        </div>
                        <div class="data-submit">
                            <input type="submit" name="submit" value="Opslaan" class="form-control btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

