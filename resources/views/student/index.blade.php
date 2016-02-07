@extends('layouts.app')

@section('title', 'Overzicht van Building Blocks')

@section('sidebar')
    @include('layouts.sidebar', ['bbs' => $navbbs])
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div>
                <div class="panel {{ $courseCompleted ? 'panel-success' : 'panel-danger' }}">
                    <div class="panel-heading"><strong>{{ $course->name }} is de lopende cursus</strong></div>
                    <div class="panel-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td class="col-md-4">Onderdeel</td>
                                    <td class="col-md-4" style="padding-left: 10px;">Laatste beoordeling</td>
                                    <td class="col-md-4">Eerdere beoordelingen</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sprints as $indexSprint => $sprint)
                                <tr class="{{ $sprint['sprintCompleted'] ? 'label-success' : 'label-danger'}}">
                                    <td colspan="3"><strong>{{ $sprint['sprint']->name }}</strong></td>
                                </tr>
                                @foreach($sprint['exams'] as $indexExam => $exam)
                                    <tr class="{{ $exam['completed'] ? 'alert-success' : 'alert-danger'}}"
                                        role="button" data-toggle="collapse" href="#collapse{{$indexSprint.$indexExam}}" aria-expanded="false"
                                        aria-controls="collapse{{$indexSprint.$indexExam}}">
                                        <td>
                                            <span>{{ $exam['exam']->description }}</span>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            @if( $exam['results']->isEmpty()) {{-- Als er geen resultaten zijn, maak een nieuwe cel --}}
                                                </td><td>
                                            @else
                                                @foreach($exam['results'] as $indexResult => $result)
                                                    <span>{{ $result->result or '-' }}</span>
                                                    @if($indexResult == 0)
                                                        <?php $feedback = $result->content ?>
                                                        </td><td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="collapse{{$indexSprint.$indexExam}}" @if($feedback == '') style="display: none;" @endif>
                                        <td></td>
                                        <td>{{ $feedback }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading"><strong>Building blocks</strong></div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($bbs as $index => $bb)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{ $index }}" aria-expanded="false"
                                       aria-controls="collapse{{ $index }}">{{ ($index + 1).' ' }}{{ $bb->name }}</a>
                                   <span style="float: right"><a href="student/{{ $bb->id }}">Assessment aanvragen</a></span>
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
</div>

@endsection