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
                        <li><a href="#">Supplier</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Add Supplier
                        <a href="{{route('all_supplier')}}" class="pull-right btn btn-info btn-sm">All Employee</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form action="{{ url('/store_supplier') }}" method="post">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Name</strong></lable>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Type your name..">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Email</strong></lable>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="email">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Phone</strong></lable>
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Type your phone..">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Shop</strong></lable>
                                    <input type="text" name="shoap" id="experiance" class="form-control" placeholder="Shoap">
                                    @error('shoap')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Account Holder</strong></lable>
                                    <input type="text" name="account_holder" class="form-control" placeholder="account holder">
                                    @error('account_holder')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Account Number</strong></lable>
                                    <input type="text" name="account_number" class="form-control" placeholder="account_number">
                                    @error('account_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Bank Name</strong></lable>
                                    <input type="text" name="bank_name" class="form-control" placeholder="bank name">
                                    @error('bank_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Branch Name</strong></lable>
                                    <input type="text" name="branch_name" class="form-control" placeholder="bank branch">
                                    @error('branch_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Supplier Type</strong></lable>
                                    <select name="type" class="form-control">
                                        <option selected="">--select--</option>
                                        <option value="Distributor">Distributor</option>
                                        <option value="Whole_Seller">Whole Seller</option>
                                        <option value="Brochure">Broker</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>City</strong></lable>
                                    <input type="text" id="city" name="city" class="form-control" placeholder="city">
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-12">
                                    <lable><strong>Address</strong></lable>
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-12">
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

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection