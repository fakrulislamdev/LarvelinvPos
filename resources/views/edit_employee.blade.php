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
                        <div class="panel-heading"><h3 class="panel-title">Update Employee Information</h3></div>
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
                            <form role="form" action="{{ route('update.employee',['id'=>$edit->id]) }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" value="{{$edit->name}}" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Email</label>
                                    <input type="email" class="form-control" value="{{$edit->email}}" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Phone</label>
                                    <input type="text" class="form-control" value="{{$edit->phone}}" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">Address</label>
                                    <input type="text" class="form-control" value="{{$edit->address}}" name="address" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Expeience</label>
                                    <input type="text" class="form-control" value="{{$edit->experience}}" name="experience" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">NID NO.</label>
                                    <input type="text" class="form-control" value="{{$edit->nid_no}}" name="nid_no" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Salary</label>
                                    <input type="text" class="form-control" value="{{$edit->salary}}" name="salary">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Vacation</label>
                                    <input type="text" class="form-control" value="{{$edit->vacation}}" name="vacation" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">City</label>
                                    <input type="text" class="form-control" value="{{$edit->city}}" name="city" >
                                </div>
                                <div class="form-group">
                                	<img id="image" src="#" />
                                    <label for="exampleInputPassword11">New Photo</label>
                                    <input type="file"  name="photo" accept="image/*" onchange="readURL(this);">
                                </div>
                                <div class="form-group">
                                	<img id="image" src="{{URL::to($edit->photo)}}" style="height:80px;width:80px;" name="old_photo"/>
                                </div>
                              
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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