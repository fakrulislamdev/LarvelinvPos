@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Oriole</a></li>
                        <li class="active">IT</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Customers</h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form role="form" action="{{ url('/insert_customer') }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name"required>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email"required>
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone"required>
                                </div>
                                <div class="form-group">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="address"required>
                                </div>
                                <div class="form-group">
                                    <label for="shopname">Shop Name</label>
                                    <input type="text" class="form-control" name="shopname" placeholder="Shopname"required>
                                </div>
                                <div class="form-group">
                                    <label for="nid_no">Account Holder</label>
                                    <input type="text" class="form-control" name="account_holder" placeholder="Account Holder"required>
                                </div>
                                <div class="form-group">
                                    <label for="Account Number">Account Number</label>
                                    <input type="text" class="form-control" name="account_number" placeholder="Account Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="Salary">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" placeholder="Bank Name"required>
                                </div>
                                <div class="form-group">
                                    <label for="Salary">Bank Branch</label>
                                    <input type="text" class="form-control" name="bank_branch" placeholder="Bank Branch" required>
                                </div>
                                <div class="form-group">
                                    <label for="City">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="city" required>
                                </div>
                                <div class="form-group">
                                	<img id="image" src="#" />
                                    <label for="Photo">Photo</label>
                                    <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                                </div>
                              
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
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