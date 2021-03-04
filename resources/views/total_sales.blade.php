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
                            <li><a href="#">Sales Report</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                
                <div class='panel panel-default'>
                    <div class="panel-heading">
                        <h3>Total Sales <span class="pull-right bg-warning">Total: {{$total}} Tk</span>
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
                                        <th style="color: white">Quantity</th>
                                        <th style="color: white">Selling Price</th>
                                        <th style="color: white">Sub Total</th>
                                        <th style="color: white">Order Date</th>
                                    </tr>
                                    </thead>
                                    @foreach($salse as $d)
                                    <tr>
                                        <td>{{$d->product_name}}</td>
                                        <td>{{$d->qty}}</td>
                                        <td>{{$d->selling_price}}</td>
                                        <td>{{$d->qty*$d->selling_price}}</td>
                                        <td>{{$d->order_date}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @endsection