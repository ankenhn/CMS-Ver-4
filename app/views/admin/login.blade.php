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
    {{ HTML::style('backend/style.css') }}
    {{ HTML::style('backend/css/style-responsive.css') }}

    {{ HTML::script('backend/js/jquery.js') }}
    {{ HTML::script('backend/js/jquery-migrate-1.2.1.min.js') }}
    {{ HTML::script('assets/plugin/bootstrap/bootstrap.min.js') }}
    <!--[if lt IE 9]>
    {{ HTML::script('backend/js/html5shiv.js') }}
    {{ HTML::script('backend/js/respond.min.js') }}
    <![endif]-->

</head>


<body class="login-body">
<div class="container">
@yield('content')
</div>
</body>
</html>