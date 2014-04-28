@extends('admin.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">{{Lang::get('menu::monster.moduleManager')}}</header>
            <div class="panel-body">
                <section class="unseen">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{ route('admin.menu.create') }}" class="btn btn-default btn-primary"><i class="fa fa-plus"></i> {{Lang::get('monster.addNew')}}</a>
                        </div>
                    </div>

                    <section class="adv-table" id="flip-scroll">
                        <table class="kTable table table-bordered table-striped table-condensed cf" data-source="{{ route('admin.menu.dataTable') }}">
                            <thead>
                            <tr>
                                <th>{{Lang::get('menu::monster.menuName')}}</th>
                                <th style="width:8em;">{{Lang::get('monster.status')}}</th>
                                <th style="width:16em;">{{Lang::get('monster.latestUpdate')}}</th>
                                <th style="width: 20em;"></th>
                            </tr>
                            </thead>
                        </table>
                    </section>
                </section>
            </div>
        </section>
    </div>
</div>
@stop