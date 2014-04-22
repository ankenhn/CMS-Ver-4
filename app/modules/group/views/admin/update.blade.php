@extends('admin.main')


@section('content')
{{ Monster::message() }}
{{ Form::open(array('url'=>route('admin.group.update',array((isset($group) ? $group->group_id : ''))), 'id'=> 'validate')) }}

<div class="row">
    <div class="col-lg-8">
        <div class="panel">
            <section class="panel-heading">
                Group Manager
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </section>
            <div class="panel-body">
                <div class="form">
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="first_name">Group Name</label>
                            <div class="col-lg-6">
                                {{ Form::text('group_name',Input::old('group_name', isset($group) ? $group->group_name : '' ), array('id' => 'group_name', 'class'=>'form-control validate[required]')) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        <div class="panel">
            <section class="panel-heading">
                {{ Lang::get('monster.publish') }}
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </section>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-12"><span class="pull-left">{{ Lang::get('monster.status') }}</span></label>
                        <div class="col-xs-12">
                            {{ Form::select('status',array('0'=>'Draft', '2' => 'Pending Review', '1'=> 'Publish'),Input::old('last_name', isset($user) ? $user->last_name : '' ), array('id' => 'status', 'class'=> 'form-control validate[required]')) }}

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-12">
                            <span class="pull-left">{{ Lang::get('monster.modifiedBy') }}: {{ User::name((isset($group) ? $group->user_id: ''),true); }}
                            </span>
                        </label>
                        <div class="col-xs-12">
                           {{ Lang::get('monster.modifiedOn') }}: {{ isset($group) ? $group->updated_at->diffForHumans() : ''; }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">{{ Lang::get('group::monster.save') }}</button>
                            {{ HTML::link(route('admin.group.list'), Lang::get('monster.backToList'), array('class' => 'btn btn-default')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{{ Form::close() }}
@stop