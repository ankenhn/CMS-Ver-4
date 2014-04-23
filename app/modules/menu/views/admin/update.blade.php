@extends('admin.main')


@section('content')
{{ Monster::message() }}
{{ Form::open(array('url'=>route('admin.menu.update',array((isset($menu) ? $menu->menu_id : ''))), 'id'=> 'validate')) }}

<div class="row">
    <div class="col-lg-8">
        <div class="panel">
            <section class="panel-heading">
                {{Lang::get('menu::monster.moduleManager')}}
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </section>
            <div class="panel-body">
                <div class="form">
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="menu_name">{{Lang::get('menu::monster.menuName')}}</label>
                            <div class="col-lg-6">
                                {{ Form::text('menu_name',Input::old('menu_name', isset($menu) ? $menu->menu_name : '' ), array('id' => 'menu_name', 'class'=>'form-control validate[required]')) }}
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
                            {{ Form::select('status',array('0'=>Lang::get('monster.draft'), '2' => Lang::get('monster.pendingReview'), '1'=> Lang::get('monster.publish')),Input::old('status', isset($menu) ? $menu->status : '' ), array('id' => 'status', 'class'=> 'form-control validate[required]')) }}

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-12">
                            <span class="pull-left">{{ Lang::get('monster.modifiedBy') }}: {{ User::name((isset($menu) ? $menu->user_id: ''),true); }}
                            </span>
                        </label>
                        <div class="col-xs-12">
                           {{ Lang::get('monster.modifiedOn') }}: {{ isset($menu) ? $menu->updated_at->diffForHumans() : ''; }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">{{ Lang::get('monster.save') }}</button>
                            {{ HTML::link(route('admin.menu.list'), Lang::get('monster.backToList'), array('class' => 'btn btn-default')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{{ Form::close() }}
@stop