@extends('admin.main')


@section('content')
{{ Monster::message() }}
{{ Form::open(array('url'=>route('admin.user.update'), 'id'=> 'validate')) }}

<div class="row">
    <div class="col-lg-8">
        <section class="panel">
            <header class="panel-heading">
                User Manager
            </header>
            <div class="panel-body">
                <div class="form">
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="first_name">First Name</label>
                            <div class="col-lg-6">
                                {{ Form::text('first_name',Input::old('first_name', isset($user) ? $user->first_name : '' ), array('id' => 'first_name', 'class'=>'form-control validate[required]')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="first_name">Last Name</label>
                            <div class="col-lg-6">
                                {{ Form::text('last_name',Input::old('last_name', isset($user) ? $user->last_name : '' ), array('id' => 'last_name', 'class'=>'form-control validate[required]')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="first_name">Email</label>
                            <div class="col-lg-6">
                                {{ Form::text('email',Input::old('email', isset($user) ? $user->email : '' ), array('id' => 'email', 'class'=>'form-control validate[required,custom[email]]')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="first_name">Password</label>
                            <div class="col-lg-6">
                                {{ Form::text('password',null, array('id' => 'password', 'class'=>'form-control '.(!isset($user) ? 'validate[required]' : ''))) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="first_name">Password Confirm</label>
                            <div class="col-lg-6">
                                {{ Form::text('pass_confirm',null, array('id' => 'pass_confirm', 'class'=>'form-control validate[equals[password]]')) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-4">

        <section class="panel">
            <header class="panel-heading">
                Publish
            </header>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-12"><span class="pull-left">Status</span></label>
                        <div class="col-xs-12">
                            <select name="status" id="status" class="validate[required] form-control">
                                <option value="0">Draft</option>
                                <option value="2">Pending Review</option>
                                <option value="1">Publish</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-xs-12">
                            <span class="pull-left">
                            </span>
                        </label>
                        <div class="col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12">
                            <span class="pull-left">
                            </span>
                        </label>
                        <div class="col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Avatar
            </header>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=No+Image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>

                                <div>
                                    <a href="" class="btn btn-white btn-file open-popup-ajax">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    </a>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>Remove</a>
                                </div>
                            </div>
                            <span class="label label-danger">NOTE!</span>
                            <span></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
{{ Form::close() }}
@stop