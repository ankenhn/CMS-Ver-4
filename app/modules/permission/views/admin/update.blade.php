@extends('admin.main')


@section('content')
{{ Monster::message() }}
{{ Form::open(array('url'=>route('admin.permission.update',array((isset($permission) ? $permission->permission_id : ''))), 'id'=> 'validate')) }}

<div class="row">
    <div class="col-lg-8">
        <section class="panel">
            <header class="panel-heading">
                {{ Lang::get('permission::monster.moduleManager') }}
            </header>
            <div class="panel-body">
                <div class="form">
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="permission_name">{{ Lang::get('permission::monster.permissionName') }}</label>
                            <div class="col-lg-6">
                                {{ Form::text('permission_name',Input::old('permission_name', isset($permission) ? $permission->permission_name : '' ), array('id' => 'permission_name', 'class'=>'form-control validate[required]')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="permission_description">{{ Lang::get('permission::monster.permissionDescription') }}</label>
                            <div class="col-lg-6">
                                {{ Form::textarea('permission_description',Input::old('permission_description', isset($permission) ? $permission->permission_description : '' ), array('id' => 'permission_description', 'class'=>'form-control validate[required]')) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-4">

        <section class="panel">
            <header class="panel-heading">
                {{ Lang::get('monster.publish') }}
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-12"><span class="pull-left">{{ Lang::get('monster.status') }}</span></label>
                        <div class="col-xs-12">
                            {{ Form::select('status',array('0'=>Lang::get('monster.draft'), '2' => Lang::get('monster.pendingReview'), '1'=> Lang::get('monster.publish')),Input::old('status', isset($permission) ? $permission->status : '' ), array('id' => 'status', 'class'=> 'form-control validate[required]')) }}

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-12">
                            <span class="pull-left">{{ Lang::get('monster.modifiedBy') }}: {{ User::name((isset($permission) ? $permission->user_id: ''),true); }}
                            </span>
                        </label>
                        <div class="col-xs-12">
                           {{ Lang::get('monster.modifiedOn') }}: {{ isset($permission) ? $permission->updated_at->diffForHumans() : ''; }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">{{ Lang::get('monster.save') }}</button>
                            {{ HTML::link(route('admin.permission.list'), Lang::get('monster.backToList'), array('class' => 'btn btn-default')) }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
{{ Form::close() }}
@stop