@extends('admin.main')


@section('content')

<table class="table table-bordered flkLWVr9" id="table">
    <thead>
    <tr>
        <th>Group Name</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $( document ).ready(function() {
        oTable = $('#table').dataTable({
            "bJQueryUI": false,
            "bAutoWidth": false,
            "bServerSide": true,

            "sAjaxSource": "{{ route('admin.group.dataTable') }}",
            "sPaginationType": "full_numbers",
            "sDom": '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "oLanguage": {
                "sSearch": "<span>Filter:</span> _INPUT_",
                "sLengthMenu": "<span>Show:</span> _MENU_",
                "oPaginate": { "sFirst": "First", "sLast": "Last", "sNext": ">", "sPrevious": "<" }
            },
            "oTableTools": {
                "sSwfPath": "/assets/media/swf/copy_csv_xls_pdf.swf",
                "aButtons": [
                    {
                        "sExtends": "copy",
                        "sButtonText": "Copy",
                        "sButtonClass": "btn"
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "Print",
                        "sButtonClass": "btn"
                    },
                    {
                        "sExtends": "collection",
                        "sButtonText": "Save <span class='caret'></span>",
                        "sButtonClass": "btn btn-primary",
                        "aButtons": [ "csv", "xls", "pdf" ]
                    }
                ]
            }
        });


    });

</script>
@stop