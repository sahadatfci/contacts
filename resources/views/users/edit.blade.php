@extends('layouts.master')

@section('content')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('category.category_management') }}
            <small>{{ trans('category.edit_category') }}</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('category.edit_category') }}</h3>
            </div>
            {!! Form::model($category, [
                'method' => 'PATCH',
                'url' => ['categories', $category->id],
                'class' => 'form-horizontal'
            ]) !!}
            <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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

