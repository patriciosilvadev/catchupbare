@extends('email::maillayouts.mailmaster')

@section('Mailboxes')
    active
@stop

@section('emails-bar')
    active
@stop

@section('template')
    class="active"
    @stop

    @section('HeadInclude')
    @stop
            <!-- header -->
    @section('PageHeader')

    @stop
            <!-- /header -->
    <!-- breadcrumbs -->
@section('breadcrumbs')
    <ol class="breadcrumb">

    </ol>
    @stop
            <!-- /breadcrumbs -->
    <!-- content -->
@section('content')

    {!! Form::open(['action' => 'Admin\helpdesk\TemplateController@store','method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="box-header">
                        <h2 class="box-title">{{Lang::get('email::lang.create')}}</h2>
                        <div class="pull-right">
                            {!! Form::submit(Lang::get('email::lang.save'),['class'=>'btn btn-primary'])!!}</div>
                    </div>

                    <div class="box-body table-responsive no-padding" style="overflow:hidden">
                        <div class="row">

                            <!--  Status : Radio form : Required -->
                            <div class="col-md-6 form-group {{ $errors->has('ban_status') ? 'has-error' : ''}}">
                                <div class="row col-xs-3">
                                    {!! Form::label('status',Lang::get('email::lang.status')) !!}
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        {!! Form::radio('ban_status','active',true) !!}{{Lang::get('email::lang.active')}}
                                    </div>
                                    <div class="col-xs-3">
                                        {!! Form::radio('ban_status','disabled') !!}{{Lang::get('email::lang.disabled')}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Name : Text form : Required -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    {!! Form::label('name',Lang::get('email::lang.name')) !!}
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <!-- Form for template set to clone From template table : Drop down : required -->
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('template_set_to_clone') ? 'has-error' : '' }}">
                                    {!! Form::label('template_set_to_clone',Lang::get('email::lang.template_set_to_clone')) !!}
                                    {!! $errors->first('template_set_to_clone', '<span class="help-block">:message</span>') !!}
                                    {!!Form::select('template_set_to_clone', [''=>'Select a Template','Templates'=>$templates->lists('name','name')],1,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <!-- Language field to Set the language in the template -->
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('language') ? 'has-error' : '' }}">
                                    {!! Form::label('language',Lang::get('email::lang.language')) !!}
                                    {!! $errors->first('language', '<span class="help-block">:message</span>') !!}
                                    {!!Form::select('language', [''=>'Select a Language','Languages'=>$languages->lists('name','name')],null,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <!-- intrnal Notes : Textarea :  -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('internal_note',Lang::get('email::lang.internal_notes')) !!}
                                    {!! Form::textarea('internal_note',null,['class' => 'form-control']) !!}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


@stop
