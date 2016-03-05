@extends('layouts.master')

@section('content')
        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('category.category_management') }}
            <small>{{ trans('category.view_category_details') }}</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('category.view_category_details') }}</h3>
            </div>

            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    `<tr>
                        <th style="width: 10px">ID</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $category->id }}</td> <td> {{ $category->name }} </td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->

            <div class="box-footer clearfix">

            </div>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
