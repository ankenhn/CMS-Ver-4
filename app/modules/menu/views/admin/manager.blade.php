@extends('admin.main')

@section('content')

<div class="row">
    <div class="col-lg-4 col-xs-12">
        <section class="panel">
            <header class="panel-heading">{{Lang::get('menu::monster.moduleManager')}}</header>
            <div class="panel-body">


                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-12"><span class="pull-left">{{ Lang::get('monster.status') }}</span></label>
                        <div class="col-xs-12">
                            {{ Form::select('status',array('0'=>Lang::get('monster.draft'), '2' => Lang::get('monster.pendingReview'), '1'=> Lang::get('monster.publish')),Input::old('status', isset($menu) ? $menu->status : '' ), array('id' => 'status', 'class'=> 'form-control validate[required]')) }}
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
        </section>
    </div>

    <div class="col-lg-8 col-xs-12">
        <section class="panel">
            <header class="panel-heading">{{Lang::get('monster.order')}}</header>
            <div class="panel-body">

                <div class="dd" id="menu_manager">
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" data-id="13">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">Item 13</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="14">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">Item 14</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="15">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">Item 15</div>
                            <ol class="dd-list">
                                <li class="dd-item dd3-item" data-id="16">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Item 16</div>
                                </li>
                                <li class="dd-item dd3-item" data-id="17">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Item 17</div>
                                </li>
                                <li class="dd-item dd3-item" data-id="18">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Item 18</div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
    </div>
</div>

{{ HTML::style('assets/plugin/nestable/jquery.nestable.css') }}
{{ HTML::script('assets/plugin/nestable/jquery.nestable.js') }}
<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_manager').nestable({
            group: 1,

        }).on('change', function() {});
    });
</script>
@stop