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
                        <li><a href="#">Add Product</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Add Product
                        <a href="{{route('all_product')}}" class="pull-right btn btn-info btn-sm">View All</a>
                    </h3>
                </div>
                <div class="panel-body">
                <div class="col-md-12">
                <form action="{{ url('/store_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <label><strong>Product Name</strong></label>
                                <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}">
                                @error('product_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label><strong>Product Categories</strong></label>
                                @php
                                $cat=DB::table('categories')->get();
                                @endphp
                                <select name="cat_id" value="{{old('cat_id')}}" class="form-control">
                                    <option selected="">--select--</option>
                                    @foreach($cat as $row)
                                    <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <label><strong>Product Code</strong></label>
                                <input type="text" name="product_code" class="form-control" value="{{old('product_code')}}">
                                @error('product_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                    <label><strong>Photo</strong></label>
                                    <input type="file" name="photo" class="form-control" value="{{old('photo')}}">
                                    @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <label><strong>Product Route</strong></label>
                                <input name="product_route" value="{{old('product_route')}}" class="form-control">
                                @error('product_route')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label><strong>Supplier</strong></label>
                                @php
                                $sup=DB::table('suppliers')->get();
                                @endphp
                                <select name="sup_id" value="{{old('sup_id')}}" class="form-control">
                                    <option selected="">--select--</option>
                                    @foreach($sup as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-4">
                                <label><strong>Godaun</strong></label>
                                <input name="product_garage" value="{{old('product_garage')}}" class="form-control">
                                @error('product_garage')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label><strong>Buy Date</strong></label>
                                <input type="date" name="buy_date" value="{{old('buy_date')}}" class="form-control">
                                @error('buy_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label><strong>Expire Date</strong></label>
                                <input type="date" name="expire_date" value="{{old('expire_date')}}" class="form-control">
                                @error('expire_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <label><strong>Buying Price</strong></label>
                                <input type="text" name="buying_price" value="{{old('buying_price')}}" class="form-control">
                                @error('buying_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label><strong>Selling Price</strong></label>
                                <input type="text" name="selling_price" value="{{old('selling_price')}}" class="form-control">
                                @error('selling_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="btn" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
