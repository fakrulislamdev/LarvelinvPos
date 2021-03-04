@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">All Attendance</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>All Attendance
                        <a href="{{route('take_attendance')}}" class="pull-right btn btn-info btn-sm">Take New</a>
                    </h3>
                </div>
                @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered" id="datatable">
                                <thead class="bg-info">
                                <tr>
                                    <th style="color: white">SL</th>
                                    <th style="color: white">Date</th>
                                    <th style="color: white">Action</th>
                                </tr>
                                </thead>
                                <?php
                                $sl = 1;
                                ?>
                                @forelse($all_att as $d)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$d->edit_date}}</td>
                                    <td>
                                        <a href="{{url('/edit_attendance/'.$d->edit_date)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{url('/view_attendance/'.$d->edit_date)}}" class="btn btn-sm btn-success">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3"><h2 style="color: red">No Data Found!</h2></td>
                                </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


