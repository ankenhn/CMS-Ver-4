@extends('admin.main')

@section('content')
{{ Monster::message() }}
{{ Form::open(array('url'=>route('admin.menu.update.item',array($menuID, (isset($item) ? $item->menu_item_id : ''))), 'id'=> 'validate')) }}
<div class="row">
    <div class="col-lg-4 col-xs-12">
        <section class="panel">
            <header class="panel-heading">{{Lang::get('menu::monster.moduleManager')}}</header>
            <div class="panel-body">
                <div class="form">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-3">{{ Lang::get('menu::monster.name') }}</label>
                            <div class="col-lg-8">
                                {{Form::text('menu_item_name',Input::old('menu_item_name', isset($item) ? $item->menu_item_name : ''),array('class'=> 'form-control validate[required]'))}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">{{ Lang::get('menu::monster.url') }} </label>
                            <div class="col-lg-8">
                                {{Form::text('menu_item_url',Input::old('menu_item_url', isset($item) ? $item->menu_item_url : ''),array('class'=> 'form-control validate[required]'))}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">{{ Lang::get('menu::monster.class') }} </label>
                            <div class="col-lg-8">
                                {{Form::text('menu_item_class',Input::old('menu_item_class', isset($item) ? $item->menu_item_class : ''),array('class'=> 'form-control'))}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">{{ Lang::get('menu::monster.target') }}</label>
                            <div class="col-lg-8">
                                {{ Form::select('menu_item_target',array('_self'=>'_self', '_top' => '_top', '_blank'=> '_blank'),Input::old('menu_item_target', isset($item) ? $item->menu_item_target : '' ), array('id' => 'menu_item_target', 'class'=> 'form-control validate[required]')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">{{ Lang::get('monster.status') }}</label>
                            <div class="col-lg-8">
                                {{ Form::select('status',array('0'=>Lang::get('monster.draft'), '2' => Lang::get('monster.pendingReview'), '1'=> Lang::get('monster.publish')),Input::old('status', isset($item) ? $item->status : '' ), array('id' => 'status', 'class'=> 'form-control validate[required]')) }}
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
        </section>
    </div>

    <div class="col-lg-8 col-xs-12">
        <section class="panel">
            <header class="panel-heading">{{Lang::get('monster.order')}}</header>
            <div class="panel-body">

                <div class="dd" id="menu_manager">
                    {{ $menuItemHtml }}
                </div>
            </div>
        </section>
    </div>
</div>
{{ Form::close() }}
{{ HTML::style('assets/plugin/nestable/jquery.nestable.css') }}
{{ HTML::script('assets/plugin/nestable/jquery.nestable.js') }}
<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_manager').nestable({
            group: 1
        }).on('change', function(e) {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                $.ajax({
                    type:'post',
                    url:"{{ route('admin.menu.order.item') }}",
                    data: { menu : list.nestable('serialize') }
                })
            });
    });
</script>
@stop