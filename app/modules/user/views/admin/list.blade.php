@extends('admin.main')


@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">{{Lang::get('user::monster.moduleManager')}}</header>
            <div class="panel-body">
                <section class="unseen">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{ route('admin.permission.create') }}" class="btn btn-default btn-primary"><i class="fa fa-plus"></i> {{Lang::get('monster.addNew')}}</a>
                        </div>
                    </div>

                    <section class="adv-table" id="flip-scroll">
                        <table class="kTable table table-bordered table-striped table-condensed cf" data-source="{{ route('admin.user.dataTable') }}">
                            <thead>
                                <tr>
                                    <th>{{ Lang::get('monster.firstName') }}</th>
                                    <th>{{ Lang::get('monster.lastName') }}</th>
                                    <th>{{ Lang::get('monster.email') }}</th>
                                    <th>{{ Lang::get('monster.lastLogin') }}</th>
                                    <th>{{ Lang::get('monster.status') }}</th>
                                    <th></th>
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