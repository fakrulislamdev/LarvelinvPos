@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-info">
                    <h4 class="pull-left page-title text-white">POS( Point of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#" class="text-white">POS</a></li>
                        <li class="text-white">{{date("d F, Y")}}</li>
                    </ol>
                </div>
            </div><br>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        @foreach($cat as $row)
                        <a href="#" data-filter="*" class="current">{{$row->cat_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="price_card text-center">
                        <ul class="price-features">
                            <table class="table table-striped">
                                <thead class="bg-warning">
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $content=Cart::content();
                                @endphp
                                <tbody>
                                    @foreach($content as $pdt)
                                    <tr>
                                        @php
                                        Cart::setTax($pdt->rowId, 10);
                                         @endphp
                                        <td>{{$pdt->name}}</td>
                                        <td>
                                            <form action="{{url('/cart_update/'.$pdt->rowId)}}" method="post">
                                                    @csrf
                                                <input type="number" name="qty" value="{{$pdt->qty}}" style="width: 40px">
                                                <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px"><i class="fas fa-check"></i></button>
                                            </form>
                                        </td>
                                        <td>{{$pdt->price}}</td>
                                        <td>{{$pdt->price*$pdt->qty}}</td>
                                        <td><a href="{{url('/cart_remove/'.$pdt->rowId)}}"class="btn btn-sm btn-danger text-danger"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </ul>
                        <div class="pricing-footer bg-primary" style="padding: 10px">
                            <p style="font-size: 18px">Quantity : {{Cart::count()}}</p>
                            <p style="font-size: 18px">SubTotal : {{Cart::subtotal()}}</p>
                            <p style="font-size: 18px">Vat : {{Cart::tax()}} </p>
                            <hr>
                            <h2 class="text-white pb-4">Total : {{Cart::total()}} Tk</h2>
                        </div>
                        <form action="{{url('/create_invoice')}}" method="post">
                            @csrf
                        <div class="panel">
                        <h4 class="text-info">Customar
                            <a href="" class="btn btn-sm pull-right btn-info waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</a>
                        </h4>
                            <select class="form-control" name="cus_id">
                                <option disabled="" selected>Select Customer</option>
                                @foreach($customer as $cus)
                                <option value="{{$cus->id}}">{{$cus->name}}</option>
                                @endforeach
                            </select>
                            @error('cus_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Create Invoice</button>
                    </div>
                </form>
                </div>
                <div class="col-lg-6">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white">Image</th>
                                <th class="text-white">Name</th>
                                <th class="text-white">Price</th>
                                <th class="text-white">Category</th>
                                <th class="text-white">Product Code</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $row)
                            <tr>
                        <form action="{{route('add_cart')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <input type="hidden" name="name" value="{{$row->product_name}}">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="price" value="{{$row->selling_price}}">
                            <td>
                                <img src="upload/{{$row->photo}}" height="80" width="80">
                            </td>
                            <td>{{$row->product_name}}</td>
                            <td>{{$row->selling_price}}</td>
                            <td>{{$row->cat_name}}</td>
                            <td>{{$row->product_code}}</td>
                            <td><button type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
                        </form>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- container -->           
    </div> <!-- content -->
</div>

<!--modal start here.....................-->

<form action="{{ url('/store_customer') }}" method="post">
   @csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add a New Customer</h4> 
            </div>
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <label class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Email</label> 
                                <input type="email" name="email" id="email" class="form-control">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Phone</label> 
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Shop Name</label> 
                                <input type="text" name="shoapname" id="experiance" class="form-control">
                                @error('shoapname')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Account Holder</label> 
                                <input type="text" name="account_holder" class="form-control">
                                @error('account_holder')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Account Number</label> 
                                <input type="text" name="account_number" class="form-control">
                                @error('account_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Bank Name</label> 
                                <input type="text" name="bank_name" class="form-control">
                                @error('bank_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Bank Branch</label> 
                                <input type="text" name="bank_branch" class="form-control">
                                @error('bank_branch')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">City</label> 
                                <input type="text" id="city" name="city" class="form-control">
                                @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div> 
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Address</label> 
                                <input type="text" class="form-control" id="field-3"> 
                            </div> 
                        </div> 
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <input type="submit" class="btn btn-info pull-right" value="Submit"> 
                </div>
        </div> 
    </div>
</div>
</form>
@endsection

