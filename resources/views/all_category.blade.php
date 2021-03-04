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
                        <li><a href="#">All Categories</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
           
        <div class='panel panel-default'>
            <div class="panel-heading">
                <h3>All Categories
                    <a href="{{route('add_category')}}" class="pull-right btn btn-info btn-sm">Add New</a>
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
                                <th style="color: white">Category Name</th>
                                <th style="color: white">Action</th>
                            </tr>
                            </thead>
                            @forelse($data as $d)
                            <tr>
                                <td>{{$d->cat_name}}</td>
                                <td>
                                    <a href="{{url('/edit_category/'.$d->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{url('/delete_category/'.$d->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">
                                    <h2 style="color: red">No Data Found!</h2>
                                </td>
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
