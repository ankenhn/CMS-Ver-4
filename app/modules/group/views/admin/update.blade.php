@extends('admin.main')


@section('content')
{{ Monster::message() }}
{{ Form::open(array('url'=>route('admin.group.update',array((isset($group) ? $group->group_id : ''))), 'id'=> 'validate')) }}

<div class="row">
    <div class="col-lg-4">
        <section class="panel">
            <header class="panel-heading">
                {{Lang::get('group::monster.moduleManager')}}
            </header>
            <div class="panel-body">
                <div class="form">
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="group_name">{{Lang::get('group::monster.groupName')}}</label>
                            <div class="col-lg-6">
                                {{ Form::text('group_name',Input::old('group_name', isset($group) ? $group->group_name : '' ), array('id' => 'group_name', 'class'=>'form-control validate[required]')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="status">{{ Lang::get('monster.status') }}</label>
                            <div class="col-lg-6">
                                {{ Form::select('status',array('0'=>Lang::get('monster.draft'), '2' => Lang::get('monster.pendingReview'), '1'=> Lang::get('monster.publish')),Input::old('status', isset($group) ? $group->status : '' ), array('id' => 'status', 'class'=> 'form-control validate[required]')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">{{ Lang::get('monster.save') }}</button>
                                {{ HTML::link(route('admin.group.list'), Lang::get('monster.backToList'), array('class' => 'btn btn-default')) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-8">

        <section class="panel">
            <header class="panel-heading">
                {{ Lang::get('group::monster.permissionManager') }}
            </header>
            <div class="panel-body">

                <?php if (isset($domains) && is_array($domains) && count($domains)) : ?>
                    <?php foreach ($domains as $domain_name => $fields) : ?>
                            <table cellspacing="0" cellpadding="0" width="100%" class="table">
                                <thead>
                                <tr>
                                <th><?php echo $domain_name ?></th>
                                <?php foreach ($fields['actions'] as $action) : ?>
                                    <th>
                                        <a href="#"><?php echo $action ?></a>
                                    </th>
                                <?php endforeach; ?>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($fields as $field_name => $field_actions) : ?>
                                    <?php if ($field_name != 'actions') : ?>
                                        <tr>
                                            <td><a href="#"><?php echo $field_name ?></a></td>
                                            <?php foreach ($fields['actions'] as $action) : ?>
                                                <td>
                                                    <?php if (array_key_exists($action, $field_actions)) : ?>
                                                        <?php
                                                        $perm_name = $domain_name .'.'. $field_name .'.'. $action;
                                                        ?>
                                                        <input type="checkbox" name="group_permissions[]" class="" value="<?php echo $domains[$domain_name][$field_name][$action]['perm_id'] ?>"
                                                            <?php
                                                            if (isset($domains[$domain_name][$field_name][$action]['value']) && $domains[$domain_name][$field_name][$action]['value'] == 1)
                                                            {
                                                                echo 'checked="checked"';
                                                            }
                                                            ?>
                                                            />
                                                    <?php else: ?>
                                                        <span class="help-inline small"><?php echo ('Not used') ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                        <br/>
                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="notification attention">Authentication: You do not have the ability to manage the access control for this role.</div>

                <?php endif; ?>


            </div>
        </section>

    </div>
</div>
{{ Form::close() }}
@stop