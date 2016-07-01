@extends('layouts.app')

@section('content')
        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('user.user_management') }}
            <small>{{ trans('user.edit_user') }}</small>
        </h1>
        @include('elements.flash')
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('user.edit_user') }}</h3>
            </div>
            {!! Form::model($user, [
                'method' => 'PATCH',
                'url' => ['users', $user->id],
                'class' => 'form-horizontal',
                'enctype' =>'multipart/form-data'
            ]) !!}
            <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                    {!! Form::label('username', 'Username: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                    {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('status', $statuses, null, ['class' => 'form-control select2', 'id' => 'status', 'data-placeholder' => 'Select Status', 'style' => 'width: 100%']) !!}
                        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                    {!! Form::label('image', 'Photo: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::file('image', ['class' => 'form-control', 'id' => 'image']) !!}
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-default cancel">Cancel</button>
                {!! Form::submit('Update', ['class' => 'btn btn-info pull-right']) !!}
            </div><!-- /.box-footer -->
            {!! Form::close() !!}
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection

