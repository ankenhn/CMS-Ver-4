@extends('admin.main')


@section('content')
    <div class="alert alert-error fade in">
        <button type="button" class="close close-sm" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Oh snap! Change a few things up and try submitting again.</strong>
        <p</p>
    </div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel">
            <section class="panel-heading">
                User Manager
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </section>
            <div class="panel-body">
                <div class="form">
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="first_name">First Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="first_name" id="first_name" value="" class="form-control validate[required]" />
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        <div class="panel">
            <section class="panel-heading">
                Publish
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </section>
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
        </div>

        <div class="panel">
            <section class="panel-heading">
                Avatar
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </section>
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
        </div>
    </div>
</div>


<div id="mediaManager" class="modal fade" tabindex="-1">

</div>
@stop