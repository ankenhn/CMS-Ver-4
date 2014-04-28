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
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="permission_name">{{ Lang::get('permission::monster.permissionName') }}</label>
                        <div class="col-lg-6">
                            {{ Form::text('permission_name',Input::old('permission_name'), array('id' => 'permission_name', 'class'=>'form-control validate[required]')) }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
{{Form::close()}}
@stop