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
                        <li><a href="#">All Product</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>All Product
                        <a href="{{route('all_product')}}" class="pull-right btn btn-info btn-sm">View All</a>
                    </h3>
                </div>
                <div class="panel-body">
                <div class="col-md-12">
                <form action="{{ url('/update_product/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <label><strong>Product Name</strong></label>
                                <input type="text" name="product_name" class="form-control" value="{{$data->product_name}}">
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
                                    
                                    @foreach($cat as $row)
                                    <option value="{{$row->id}}" <?php if($data->cat_id==$row->id){echo"selected";}?> >{{$row->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <label><strong>Product Code</strong></label>
                                <input type="text" name="product_code" class="form-control" value="{{$data->product_code}}">
                                @error('product_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label><strong>Supplier</strong></label>
                                @php
                                $sup=DB::table('suppliers')->get();
                                @endphp
                                <select name="sup_id"  class="form-control">
                                    @foreach($sup as $row)
                                    <option value="{{$row->id}}" <?php if($data->sup_id==$row->id){echo "selected";} ?> > {{ $row->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-4">
                                <label><strong>Product Route</strong></label>
                                <input name="product_route" value="{{$data->product_route}}" class="form-control">
                                @error('product_route')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label><strong>Product Garage</strong></label>
                                <input name="product_garage" value="{{$data->product_garage}}" class="form-control">
                                @error('product_garage')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label><strong>Buying Date</strong></label>
                                <input type="date" name="buy_date" value="{{$data->buy_date}}" class="form-control">
                                @error('buy_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <label><strong>Expire Date</strong></label>
                                <input type="date" name="expire_date" value="{{$data->expire_date}}" class="form-control">
                                @error('expire_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label><strong>Buying Price</strong></label>
                                <input type="text" name="buying_price" value="{{$data->buying_price}}" class="form-control">
                                @error('buying_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            
                            <div class="col-sm-6">
                                <label><strong>Selling Price</strong></label>
                                <input type="text" name="selling_price" value="{{$data->selling_price}}" class="form-control">
                                @error('selling_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                    <label><strong>Photo</strong></label>
                                    <input type="file" name="photo" class="form-control" value="">
                                    <img src="../upload/{{$data->photo}}" height="80" width="80">
                                    @error('photo')
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
