<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 13-1-2016
 * Time: 22:02
 */
// resources/views/bb/edit.blade.php

?>
@extends('layouts.app')

@section('title', 'Edit Building Block')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Building Block</div>
                    <div class="panel-body">
                        {{--@include('common.errors')--}}

                        {!! Form::model($bb, array('method' => 'PUT', 'route' => array('bb.update', $bb->id))) !!}
                        {{--{!! Form::token() !!}--}}

                        <div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Naam') !!}
                            {!! Form::text('name', $bb->name, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{$errors->first('slogan') ? 'has-error' : ''}}">
                            {!! Form::label('slogan', 'Slogan') !!}
                            {!! Form::text('slogan', $bb->slogan, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('slogan') }}</span>
                        </div>
                        @include('tinymce::tpl')
                        <div class="form-group {{$errors->first('description') ? 'has-error' : ''}}">
                            {!! Form::label('description', 'Beschrijving') !!}
                            {!! Form::textarea('description', $bb->description, [
                                //'class' => 'form-control',
                                'rows'  => 10,
                                'id'    => 'tinymce',
                                ]) !!}
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                        {{--@include('tinymce::tpl')--}}
                        {{--{{ dd(config('tinymce.params')) }}--}}
                        <?php
                            $params = config('tinymce.params');
                            $params['selector'] = '#area2'
                        ?>
                        <script type="text/javascript">
                            tinymce.init(
                                    {!! json_encode( $params ) !!}
                            );
                        </script>
                        <div class="form-group {{$errors->first('challenges') ? 'has-error' : ''}}">
                            {!! Form::label('challenges', 'Uitdagingen') !!}
                            {!! Form::textarea('challenges', $bb->challenges, [
                                //'class' => 'form-control',
                                'rows' => 10,
                                'id'    => 'area2',
                                ]) !!}
                            <span class="text-danger">{{ $errors->first('challenges') }}</span>
                        </div>

                        <h4>Curatoren</h4>
                        @foreach($users as $index => $user)
                            <div class="checkbox">
                                <label>
                                    {{--{!! Form::hidden('curators['.$index.']', false) !!}--}}
                                    {!! Form::checkbox('curators['.$index.']', $user->id, $bb->hasCurator($user->id), ['id' => 'user_' . $index]) !!}
                                    {{ $user->fullName() }}
                                </label>
                            </div>
                        @endforeach
                        <div class="data-submit">
                            <input type="submit" name="submit" value="Opslaan" class="form-control btn btn-primary"/>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

