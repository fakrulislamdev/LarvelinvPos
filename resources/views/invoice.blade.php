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
                    <h4 class="pull-left page-title">Invoice</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Company Name</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Invoice</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h3 class="text-right">Company Name</h3>

                                </div>
                                <div class="pull-right">
                                    <h4>
                                        <strong>{{date("d F, Y")}}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-20">
                                        <address>
                                          <strong>Name : {{$customer->name}}</strong><br>
                                          Shop Name : {{$customer->shopname}}<br>
                                          Address : {{$customer->address}}<br>
                                          City : {{$customer->city}}<br>
                                          Email : {{$customer->email}}<br>
                                          Phone : {{$customer->phone}}
                                      </address>
                                  </div>
                                  <div class="pull-right m-t-20">
                                    <p><strong>Order Date: </strong>{{date("d/m/Y")}}</p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> 1</p>

                                </div>
                            </div>
                        </div>
                        <div class="m-h-30"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-20">
                                        <thead bg-info>
                                            <tr>
                                                <th style="color: white">#</th>
                                                <th style="color: white">Item</th>
                                                <th style="color: white">Quantity</th>
                                                <th style="color: white">Unit Cost</th>
                                                <th style="color: white">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $sl=1;
                                            @endphp
                                            @foreach($contents as $row)
                                            <tr>
                                                <td>{{$sl++}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->qty}}</td>
                                                <td>{{$row->price}}</td>
                                                <td>{{$row->qty*$row->price}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3 col-md-offset-9">
                                <p class="text-right"><b>Sub-total:</b> {{Cart::subtotal()}}</p>
                                <p class="text-right">VAT: {{Cart::tax()}}</p>
                                <hr>
                                <h3 class="text-right">Total : {{Cart::total()}} Tk</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a href="#" class="btn btn-inverse waves-effect waves-light" onClick="window.print()"><i class="fa fa-print"></i></a>
                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container --> 
</div> <!-- content -->
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
<!--modal start here.....................-->
<form action="{{ url('/final_invoice') }}" method="post">
  @csrf
  <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Invoice of {{$customer->name}} <span class="pull-right">Total : {{Cart::total()}} Tk</span></h4> 
            </div> 
            <div class="modal-body">
                <div class="col-md-12"> 
                    <label class="control-label">Payment</label>
                    <select name="payment_status" class="form-control">
                        <option value="">select</option>
                        <option value="hand_cash">Hand Cash</option>
                        <option value="cheque">Cheque</option>
                        <option value="due">Due</option>
                    </select>
                    @error('payment_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                </div> 
                <div class="col-md-12"> 
                    <div class="row"> 
                        <div class="form-group col-md-6"> 
                            <label class="control-label">Pay</label> 
                            <input type="number" name="pay" class="form-control">
                        </div> 
                        <div class="form-group col-md-6"> 
                            <label class="control-label">Due</label> 
                            <input type="number" name="due" class="form-control due">
                        </div> 
                    </div>
                </div> 
                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                <input type="hidden" name="order_date" value="{{date('d/m/y')}}">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="total_products" value="{{Cart::count()}}">
                <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                <input type="hidden" name="vat" value="{{Cart::tax()}}">
                <input type="hidden" name="total" value="{{Cart::total()}}">

                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <input type="submit" class="btn btn-info pull-right" value="Submit"> 
                </div> 
            </div> 
        </div>
    </div>
</form>
@endsection
