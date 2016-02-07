@extends('layouts.app')

@section('title', 'Overzicht van Building Blocks')

@section('content')
        <!-- Current Users -->
@if (count($bbs) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <a href="{{ url('bb/create') }}">Maak nieuw Building Block aan</a>
                    @foreach($bbs as $index => $bb)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{ $index }}" aria-expanded="false"
                                       aria-controls="collapse{{ $index }}">{{ ($index + 1).' ' }}{{ $bb->name }}</a>
                                   <span style="float: right"><a href="bb/{{ $bb->id }}/edit">Edit</a></span>
                                </h4>
                            </div>
                            <div id="collapse{{ $index }}" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading{{ $index }}">
                                <div class="panel-body">
                                    <h4>Omschrijving</h4>
                                    <p>{!! $bb->description !!}</p>
                                    <h4>Uitdagingen</h4>
                                    <p>{!! $bb->challenges !!}</p>
                                    <h4>Bronnen</h4>
                                    <h4>Curatoren</h4>
                                    @foreach($bb->curators as $curator)
                                        <p><a href="">{{ $curator->fullName() }}</a></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@endsection