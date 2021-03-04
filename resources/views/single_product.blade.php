@extends('layouts.app')
@section('content')
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">



			<!-- Start Widget -->
			<div class='panel panel-default'>
				<div class="panel-heading">
					<h3>{{$prod->product_name}}
						<a href="{{route('all_product')}}" class="pull-right btn btn-info btn-sm">View All</a>
					</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-6 m-t-30">
                          <h4>Product Name : {{$prod->product_name}}</h4>
                          <h4>Product Code : {{$prod->product_code}}</h4>
                          <h4>Category Name : {{$prod->cat_name}}</h4>
                          <h4>Supplier Name : {{$prod->name}}</h4>
                          <h4>Selling Price : {{$prod->selling_price}}</h4>
					</div>
					<div class="col-md-6">
						<img src="../upload/{{$prod->photo}}" class="thambnail ima-responsive" height="450" width="400">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

