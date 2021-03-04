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
                            <li><a href="#">Product</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                
                <div class='panel panel-default'>
                    <div class="panel-heading">
                        <h3>All Product
                            <a href="{{route('add_product')}}" class="pull-right btn btn-info btn-sm">Add New</a>
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
                                <table class="table table-striped table-bordered" id="datatable">
                                    <thead  class="bg-info">
                                    <tr>
                                        <th style="color: white">Product Name</th>
                                        <th style="color: white">Photo</th>
                                        <th style="color: white">Code</th>
                                        <th style="color: white">Selling Price</th>
                                        <th style="color: white">Garage</th>
                                        <th style="color: white">Route</th>
                                        <th style="color: white">Expire Date</th>
                                        <th style="color: white">Action</th>
                                    </tr>
                                    </thead>
                                    @forelse($data as $d)
                                    <tr>
                                        <td>{{$d->product_name}}</td>
                                        <td><img src="upload/{{$d->photo}}" height="80" width="80"></td>
                                        <td>{{$d->product_code}}</td>
                                        <td>{{$d->selling_price}}</td>
                                        <td>{{$d->product_garage}}</td>
                                        <td>{{$d->product_route}}</td>
                                        <td>{{$d->expire_date}}</td>

                                        <td>
                                            <a href="{{url('/edit_product/'.$d->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{url('/delete_product/'.$d->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                            <a href="{{url('/single_product/'.$d->id)}}" class="btn btn-sm btn-success waves-effect waves-light">View</a> 
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8"><h2 style="color: red">No Data Found!</h2></td>
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