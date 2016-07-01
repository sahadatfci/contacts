@extends('layouts.app')

@section('content')
        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('user.user_management') }}
            <small>{{ trans('user.user_list') }}</small>
        </h1>
        @include('elements.flash')
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('user.user_list') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ url('users/create') }}" class="btn btn-primary pull-right btn-sm">{{ trans('user.add_new_user') }}</a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        `<tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{--*/$x=0;/*--}}
                    @foreach($users as $item)
                        {{--*/$x++;/*--}}
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if(!empty($item->image))
                                    <img class="user-photo-dashboard" src="{{ asset('public/user_photo/'.$item->image) }}">
                                @else
                                    <img class="user-photo-dashboard" src="{{ asset('public/user_photo/unknown160x160.png') }}">
                                @endif
                            </td>
                            <td>{{ trans('user.role_'.$item->role_id) }}</td>
                            <td class="text-center">
                                @if($item->status == '1')
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                            <a href="{{ url('users/' . $item->id . '/edit') }}">
                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                            </a>
                                @if(Auth::user()->id != $item->id && $item->role_id != '1')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['users', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm(\'Are you sure you want to delete?\')']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->

            <div class="box-footer clearfix">
                {!! $users->render() !!}
            </div>

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection
