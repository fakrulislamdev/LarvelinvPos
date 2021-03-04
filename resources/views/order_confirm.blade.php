@extends('layouts.app')
@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row page-top">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Confirm Order</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">AH Zihan</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Order</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div>
                                                <h3>Company Name <span class="pull-right">Order Date: {{$order->order_date}}</span></h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pull-left m-t-20">
                                                    <address>
                                                      <strong>Name : {{$order->name}}</strong><br>
                                                      Shop Name : {{$order->shoapname}}<br>
                                                      Address : {{$order->address}}<br>
                                                      City : {{$order->city}}<br>
                                                      Email : {{$order->email}}<br>
                                                      Phone : {{$order->phone}}
                                                  </address>
                                              </div>
                                              @if($order->order_status=='success')
                                                <div class="pull-right m-t-20">
                                                    <p><strong>Today Date: </strong>{{date("d/m/Y")}}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-success">Delivered</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong>{{$order->id}}</p>
                                                </div>
                                                @else
                                                <div class="pull-right m-t-20">
                                                    <p><strong>Today Date: </strong>{{date("d/m/Y")}}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong>{{$order->id}}</p>
                                                </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="m-h-30"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-20">
                                                        <thead>
                                                            <tr class="bg-info">
                                                                <th style="color: white">#</th>
                                                                <th style="color: white">Product Name</th>
                                                                <th style="color: white">Product Code</th>
                                                                <th style="color: white">Quantity</th>
                                                                <th style="color: white">Unit Cost</th>
                                                                <th style="color: white">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $sl=1;
                                                            @endphp
                                                            @foreach($order_details as $row)
                                                            <tr>
                                                                <td>{{$sl++}}</td>
                                                                <td>{{$row->product_name}}</td>
                                                                <td>{{$row->product_code}}</td>
                                                                <td>{{$row->qty}}</td>
                                                                <td>{{$row->unitcost}}</td>
                                                                <td>{{$row->qty*$row->unitcost}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;"><br>
                                            <div class="col-md-9">
                                                <h4>Payment By : {{$order->payment_status}}</h4>
                                                <h5>Pay : {{$order->pay}} Tk</h5>
                                                <h5>Due : {{$order->due}} Tk</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-right"><b>Sub-total: {{$order->sub_total}}</b> </p>
                                                <p class="text-right">VAT: {{$order->vat}}</p>
                                                <hr>
                                                <h3 class="text-right">Total : {{$order->total}} Tk</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($order->order_status=='success')
                                        @else
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-info" value="Print" onClick="window.print()">
                                                <a href="{{url('/pos_done/'.$order->id)}}" class="btn btn-primary waves-effect waves-light">Done</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container --> 
                </div> <!-- content -->
            </div>
            
@endsection
