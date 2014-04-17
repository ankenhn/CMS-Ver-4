@extends('admin.login')

@section('content')
{{ Form::open(array('url'=>route('login'), 'class'=> 'form-signin')) }}
<h2 class="form-signin-heading">sign in now</h2>
<div class="login-wrap">
    <div class="user-login-info">
        {{ Form::text('email', null, array('class' => 'form-control', 'id' => 'email', 'placeholder'=>'Email')) }}
        {{ Form::password('password', array('class' => 'form-control', 'name'=> 'password', 'placeholder'=>'Password', 'id'=> 'password')) }}
    </div>
    <label class="checkbox">
        {{ Form::checkbox('remember', null, true) }} Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#forgotPassword">Forgot Password?</a>

                    </span>
    </label>
    <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
    <div class="registration">
        Don't have an account yet?
        <a href="#"> Create an account
        </a>
    </div>
</div>
{{ Form::close() }}
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotPassword" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success" type="button">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

@stop