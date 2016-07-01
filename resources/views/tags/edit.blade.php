@extends('layouts.app')

@section('content')
        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('tag.tag_management') }}
            <small>{{ trans('tag.edit_tag') }}</small>
        </h1>
        @include('elements.flash')
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('tag.edit_tag') }}</h3>
            </div>
            {!! Form::model($tag, [
                'method' => 'PATCH',
                'url' => ['tags', $tag->id],
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

                <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                    {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('status', $statuses, null, ['class' => 'form-control select2', 'id' => 'status', 'data-placeholder' => 'Select Status', 'style' => 'width: 100%']) !!}
                        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
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

