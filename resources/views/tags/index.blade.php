@extends('layouts.app')

@section('content')
        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('tag.tag_management') }}
            <small>{{ trans('tag.tag_list') }}</small>
        </h1>
        @include('elements.flash')
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('tag.tag_list') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ url('tags/create') }}" class="btn btn-primary pull-right btn-sm">{{ trans('tag.add_new_tag') }}</a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        `<tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{--*/$x=0;/*--}}
                    @foreach($tags as $item)
                        {{--*/$x++;/*--}}
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">
                                @if($item->status == '1')
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('tags/' . $item->id . '/edit') }}">
                                    <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                </a>

                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['tags', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm(\'Are you sure you want to delete?\')']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->

            <div class="box-footer clearfix">
                {!! $tags->render() !!}
            </div>

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection
