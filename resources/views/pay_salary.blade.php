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
                        <li><a href="#">Advanced Salary</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Pay Salary {{date("F Y")}}
                        <a href="{{route('add_advanced_salary')}}" class="pull-right btn btn-info btn-sm">Add New</a>
                    </h3>
                </div>
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
                                    <th style="color: white">Name</th>
                                    <th style="color: white">Phone</th>
                                    <th style="color: white">Month</th>
                                    <th style="color: white">Salary</th>
                                    <th style="color: white">Action</th>
                                </tr>
                                </thead>
                                @forelse($employee as $d)
                                <tr>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->phone}}</td>
                                    <td><span class="badge badge-success">{{date("F",strtotime('-1 months'))}}</span></td>
                                    <td>{{$d->salary}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning text-white">Pay Now</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <h2 style="color: red">No Data Found!</h2>
                                    </td>
                                </tr>
                                @endforelse
                            </table>

                        </div>
                    </div>
                </div>
                @endsection
