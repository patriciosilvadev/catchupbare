<?php $readonly = ($role->isEditable())? '' : 'readonly'; ?>
<?php $membershipFixed = ($role->canChangeMembership())? '' : 'disabled'; ?>

<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_details" data-toggle="tab" aria-expanded="true">{!! trans('general.tabs.details') !!}</a></li>
        <li class=""><a href="#tab_options" data-toggle="tab" aria-expanded="false">{!! trans('general.tabs.options') !!}</a></li>
        <li class=""><a href="#tab_perms" data-toggle="tab" aria-expanded="false">{!! trans('general.tabs.perms') !!}</a></li>
        <li class=""><a href="#tab_staffs" data-toggle="tab" aria-expanded="false">{!! trans('general.tabs.staff') !!}</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active" id="tab_details">
            <div class="form-group">
                {!! Form::label('name', trans('core::admin/roles/general.columns.name') ) !!}
                {!! Form::text('name', null, ['class' => 'form-control', $readonly]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('display_name', trans('core::admin/roles/general.columns.display_name') ) !!}
                {!! Form::text('display_name', null, ['class' => 'form-control', $readonly]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', trans('core::admin/roles/general.columns.description') ) !!}
                {!! Form::text('description', null, ['class' => 'form-control', $readonly]) !!}
            </div>
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="tab_options">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        {!! '<input type="hidden" name="resync_on_login" value="0">' !!}
                        {!! Form::checkbox('resync_on_login', '1', $role->resync_on_login) !!} {{ trans('core::admin/roles/general.columns.resync_on_login') }}
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {!! '<input type="hidden" name="enabled" value="0">' !!}
                        {!! Form::checkbox('enabled', '1', $role->enabled) !!} {{ trans('general.status.enabled') }}
                    </label>
                </div>
            </div>
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="tab_perms">
            <div class="form-group">
                <div class="col-4">
                    @foreach($perms as $perm)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('perms[]', $perm->id, $role->hasPerm($perm), ( \App\Models\Permission::isForced($perm) || (!$perm->canBeAssigned()) )? ['disabled'] : null ) !!} {{ $perm->display_name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="tab_staffs">
            <div class="form-group">
                {!! Form::hidden('selected_staffs', null, [ 'id' => 'selected_staffs']) !!}
                <div class="input-group select2-bootstrap-append">
                    {!! Form::select('staff_search', [], null, ['class' => 'form-control', 'id' => 'staff_search',  'style' => "width: 100%", $membershipFixed]) !!}
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="btn-add-staff" type="button" {!! $membershipFixed !!}>
                            <span class="fa fa-plus-square"></span>
                        </button>
                    </span>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="tbl-staff">
                        <tbody>
                        <tr>
                            <th class="hidden" rowname="id">{!! trans('admin/staff/general.columns.id')  !!}</th>
                            <th>{!! trans('admin/staff/general.columns.name')  !!}</th>
                            <th>{!! trans('admin/staff/general.columns.username')  !!}</th>
                            <th>{!! trans('admin/staff/general.columns.enabled')  !!}</th>
                            <th style="text-align: right">{!! trans('admin/staff/general.columns.actions')  !!}</th>
                        </tr>
                        @foreach($role->staff as $staff)
                            <tr>
                                <td class="hidden" rowname="id">{!! $staff->id !!}</td>
                                <td>{!! link_to_route('admin.staff.show', $staff->full_name, [$staff->id], []) !!}</td>
                                <td>{!! link_to_route('admin.staff.show', $staff->username, [$staff->id], []) !!}</td>
                                <td>
                                    @if($staff->enabled)
                                        <i class="fa fa-check text-green"></i>
                                    @else
                                        <i class="fa fa-close text-red"></i>
                                    @endif
                                </td>
                                <td style="text-align: right">
                                    <a class="btn-remove-staff" href="#" title="{{ trans('general.button.remove-staff') }}"><i class="fa fa-trash-o deletable"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->

            </div>
        </div><!-- /.tab-pane -->

    </div><!-- /.tab-content -->
</div>




