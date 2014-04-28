@extends('admin.main')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <section class="panel">
            <header class="panel-heading">Notice</header>
            <div class="panel-body">
                {{System::item('site.notice')}}
            </div>
        </section>
    </div>

    <div class="col-lg-4">

        <div class="profile-nav alt">
            <section class="panel">
                <div class="user-heading alt clock-row terques-bg" id="digital">
                    <h1><span class="month">{{date("F")}}</span> <span class="date">{{ date("d")}}</span> </h1>
                    <p class="text-left"><span class="year">{{date("Y")}}</span> , <span class="day">{{date("l")}}</span> </p>
                    <p class="text-left"><span class="hour">{{date("H")}}</span>:<span class="mins">{{date("m")}}</span> </p>
                </div>
                <ul id="clock">
                    <li id="sec"></li>
                    <li id="hour"></li>
                    <li id="min"></li>
                </ul>


            </section>

        </div>
    </div>
</div>
{{ HTML::style('assets/plugin/css3clock/style.css') }}
{{ HTML::script('assets/plugin/css3clock/script.js') }}
@stop