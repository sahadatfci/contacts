@extends('layouts.app')
@section('pagecss')
    <link rel="stylesheet" href="{{asset('public/assets/css/select2.min.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('tag.tag_management') }}
            <small>{{ trans('tag.create_new_tag') }}</small>
        </h1>
        @include('elements.flash')
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('tag.create_new_tag') }}</h3>
            </div>
            {!! Form::open(['url' => 'tags', 'class' => 'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
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
                    {!! Form::submit('Create', ['class' => 'btn btn-info pull-right']) !!}
                </div><!-- /.box-footer -->
            {!! Form::close() !!}
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection

@section('pagejs')
    <script src="{{asset('public/assets/js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            $(".select2").select2();
        });
    </script>
@endsection