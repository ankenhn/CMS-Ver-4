@extends('admin.main')


@section('content')

<table class="table table-bordered flkLWVr9" id="table">
    <thead>
    <tr>
        <th align="center" valign="middle" class="head1">ID</th>
        <th align="center" valign="middle" class="head2">Email</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="6" class="dataTables_empty">Loading data from server</td>
    </tr>
    </tbody>
</table>

<script type="text/javascript">
    $( document ).ready(function() {
        oTable = $('#table').dataTable({
            "bJQueryUI": false,
            "bAutoWidth": false,
            "bServerSide": true,

            "sAjaxSource": "{{ route('dataTable') }}",
            "sPaginationType": "full_numbers",
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'T><'span6'p>>",
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