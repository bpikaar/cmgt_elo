<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="">
        <div class="" role="tab" id="headingBezig">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#collapseBezig" aria-expanded="true"
                   aria-controls="collapseBezig">Busy</a>
            </h4>
        </div>
        <div id="collapseBezig" class="panel-collapse collapse in" role="tabpanel"
             aria-labelledby="headingBezig">

                @foreach($bbs as $bb)
                    <div class="">
                        @if($bb->status == App\Models\Common\Status::Busy)
                            <div>
                                <div class="navbar-bb"><a href="#">{{ $bb->name }}</a></div>
                                <a href="{{url('student/assessment', $bb->id)}}" id="test">
                                    <div class="navbar-min">-</div>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach

        </div>
    </div>

    <div class="">
        <div class="" role="tab" id="headingOpen">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#collapseOpen" aria-expanded="true"
                   aria-controls="collapseOpen">Open</a>
            </h4>
        </div>
        <div id="collapseOpen" class="panel-collapse collapse in" role="tabpanel"
             aria-labelledby="headingOpen">
            @foreach($bbs as $bb)
                <div class="">
                    @if($bb->status == App\Models\Common\Status::Open)
                        <div>
                            <div class="navbar-bb"><a href="#">{{ $bb->name }}</a></div>
                            <a href="{{url('student/assessment', $bb->id)}}" id="test">
                                <div class="navbar-min">+</div>
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="">
        <div class="" role="tab" id="headingDone">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#collapseDone" aria-expanded="false"
                   aria-controls="collapseDone">Done</a>
            </h4>
        </div>
        <div id="collapseDone" class="panel-collapse collapse" role="tabpanel"
             aria-labelledby="headingDone">
            <div class="panel-body">
                @foreach($bbs as $bb)
                    <ul class="nav nav-sidebar">
                        @if($bb->status == App\Models\Common\Status::Done)
                            <li><a href="#">{{ $bb->name }}</a></li>
                        @endif
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>