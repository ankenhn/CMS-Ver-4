@extends('admin.main')


@section('content')
{{ Monster::message() }}
{{ Form::open(array('url'=>route('admin'), 'id'=> 'validate')) }}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Option Setting</header>
            <div class="panel-body">
                <div class="form-horizontal">

                </div>
            </div>
        </section>
    </div>
</div>
{{Form::close()}}
@stop