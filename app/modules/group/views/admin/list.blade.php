@extends('admin.main')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">{{Lang::get('group::monster.moduleManager')}}</header>
            <div class="panel-body">
                <section class="unseen">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{ route('admin.group.create') }}" class="btn btn-default btn-primary"><i class="fa fa-plus"></i> {{Lang::get('monster.addNew')}}</a>
                        </div>
                    </div>

                    <section class="adv-table" id="flip-scroll">
                        <table class="table table-bordered table-striped table-condensed cf" id="table">
                            <thead>
                            <tr>
                                <th>{{Lang::get('group::monster.groupName')}}</th>
                                <th style="width:8em;">{{Lang::get('monster.status')}}</th>
                                <th style="width:16em;">{{Lang::get('monster.latestUpdate')}}</th>
                                <th style="width: 10em;"></th>
                            </tr>
                            </thead>
                        </table>
                    </section>
                </section>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
        oTable = $('#table').dataTable({
            "bJQueryUI": false,
            "bAutoWidth": false,
            "bServerSide": true,

            "sAjaxSource": "{{ route('admin.group.dataTable') }}",
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'T><'span6'p>>",
            "oTableTools": {
                "sRowSelect": "multi",
                "aButtons": [ "select_btn", "KDelete"]
            }

        });


    });

</script>
@stop