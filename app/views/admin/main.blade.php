<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="duyanh980@gmail.com">
    <title></title>
    {{ HTML::style('assets/plugin/bootstrap/bootstrap.min.css') }}
    {{ HTML::style('backend/css/bootstrap-reset.css') }}
    {{ HTML::style('assets/plugin/font-awesome/font-awesome.css') }}
    {{ HTML::style('assets/plugin/dataTable/dataTable.css') }}
    {{ HTML::style('assets/plugin/dataTable/DT_bootstrap.css') }}
    {{ HTML::style('assets/plugin/bootstrap/bootstrap-fileupload.css') }}
    {{ HTML::style('assets/plugin/bootstrap/datepicker.css') }}
    {{ HTML::style('assets/plugin/jquery-validate/validationEngine.jquery.css') }}
    {{ HTML::style('backend/style.css') }}
    {{ HTML::style('backend/css/style-responsive.css') }}
    {{ HTML::style('backend/css/table-responsive.css') }}
    <!--[if lt IE 9]>
    {{ HTML::script('backend/js/html5shiv.js') }}
    {{ HTML::script('backend/js/respond.min.js') }}
    <![endif]-->

    {{ HTML::script('backend/js/jquery.js') }}
    {{ HTML::script('backend/js/jquery-migrate-1.2.1.min.js') }}
    {{ HTML::script('assets/plugin/bootstrap/bootstrap.min.js') }}

    <script type="text/javascript">
        function set_select(id,value)
        {
            var obj=document.getElementById(id);
            if(obj) {
                for(i=0;i<obj.length;i++) {
                    if(obj[i].value==value)
                        obj.selectedIndex=i;
                }

            }
        }
    </script>
</head>

<body>

<section id="container" >
    @include('admin.section.header')
    @include('admin.section.side')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="breadcrumbs-alt">
                        <li><a href=""><i class="fa fa-home">&nbsp;</i> Dashboard</a></li>
                        <li><a class="current" href="">Users</a></li>
                    </ul>
                </div>
            </div>
            <!-- page start-->
    @yield('content')

        </section>
    </section>

    @include('admin.section.right_sidebar')
</section>
@include('admin.section.footer')

</body>
</html>
