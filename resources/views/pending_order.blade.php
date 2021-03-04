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
                        <h3>All Pending Orders</h3>
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
                                        <th style="color: white">Date</th>
                                        <th style="color: white">Total Products</th>
                                        <th style="color: white">Total</th>
                                        <th style="color: white">Order Status</th>
                                        <th style="color: white">Payment Status</th>
                                        <th style="color: white">Action</th>
                                    </tr>
                                    </thead>
                                    @forelse($pending as $d)
                                    <tr>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->order_date}}</td>
                                        <td>{{$d->total_products}}</td>
                                        <td>{{$d->total}}</td>
                                        <td>{{$d->order_status}}</td>
                                        <td><span class="badge badge-danger">{{$d->payment_status}}</span></td>
                                        <td>
                                            <a href="{{url('/view_order_status/'.$d->id)}}" class="btn btn-sm btn-success waves-effect waves-light">View</a> 
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7"><h2 style="color: red">No Data Found!</h2></td>
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