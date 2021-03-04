@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            @php
             $data=date('F');
             $expense=DB::table('expenses')->where('month',$data)->sum('amount');
            @endphp
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome {{date('Y')}}</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Monthly Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{route('january_expense')}}" class="btn btn-sm btn-primary">January</a>
                <a href="{{route('february_expense')}}" class="btn btn-sm btn-danger">February</a>
                <a href="{{route('march_expense')}}" class="btn btn-sm btn-success">March</a>
                <a href="{{route('april_expense')}}" class="btn btn-sm btn-info">April</a>
                <a href="{{route('may_expense')}}" class="btn btn-sm btn-warning">May</a>
                <a href="{{route('june_expense')}}" class="btn btn-sm btn-primary">June</a>
                <a href="{{route('july_expense')}}" class="btn btn-sm btn-danger">July</a>
                <a href="{{route('august_expense')}}" class="btn btn-sm btn-success">August</a>
                <a href="{{route('september_expense')}}" class="btn btn-sm btn-info">September</a>
                <a href="{{route('october_expense')}}" class="btn btn-sm btn-warning">October</a>
                <a href="{{route('november_expense')}}" class="btn btn-sm btn-primary">November</a>
                <a href="{{route('december_expense')}}" class="btn btn-sm btn-danger">December</a>
            </div>
            <div class="panel panel-info">
                <h3 class="panel-light" style="color: red">Monthly All Expanse
                <a href="{{route('all_expense')}}" class="pull-right btn btn-danger btn-sm">View All</a>
                <a href="{{route('add_expense')}}" class="pull-right btn btn-info btn-sm">Add New</a>
                </h3> 
            </div>
            <table class="table table-bordered" id="datatable">
                <thead class="bg-info">
                <tr>
                    <th style="color: white">Expense Details</th>
                    <th style="color: white">Date</th>
                    <th style="color: white">Amount</th>
                    <th style="color: white">Action</th>
                </tr>
                </thead>
                @forelse($month as $d)
                <tr>
                    <td>{{$d->details}}</td>
                    <td>{{$d->date}}</td>
                    <td>{{$d->amount}}</td>
                    <td>
                        <a href="{{url('/edit_expense/'.$d->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{url('/delete_expense/'.$d->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a> 
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"><h2 style="color: red">No Data Found!</h2></td>
                </tr>
                @endforelse
            </table>
            <h3 class="bg-info" style="color: black;">Total : {{$expense}} Taka</h3>
        </div>
    </div>
</div>
@endsection