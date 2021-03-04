@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Oriole</a></li>
                        <li class="active">IT</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <!-- Personal-Information -->
                    <div class="panel panel-default panel-fill">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$single->name}} Information</h3>
                        </div>
                        <div class="panel-body">
                        <div class="about-info-p m-b-0">
                                <br />
                                <img src="{{URL::to($single->photo)}}" style="height: 80px;width: 80px">
                        </div>
                            <div class="about-info-p">
                                <strong>Full Name</strong>
                                <br/>
                                <p class="text-muted">{{$single->name}}</p>
                            </div>
                            <div class="about-info-p">
                                <strong>Phone</strong>
                                <br />
                                <p class="text-muted">{{$single->phone}}</p>
                            </div>
                            <div class="about-info-p">
                                <strong>Email</strong>
                                <br />
                                <p class="text-muted">{{$single->email}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Location</strong>
                                <br />
                                <p class="text-muted">{{$single->address}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>City</strong>
                                <br />
                                <p class="text-muted">{{$single->city}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Salary</strong>
                                <br />
                                <p class="text-muted">{{$single->salary}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Vacation</strong>
                                <br />
                                <p class="text-muted">{{$single->vacation}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>Experience</strong>
                                <br />
                                <p class="text-muted">{{$single->experience}}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <strong>NID No.</strong>
                                <br />
                                <p class="text-muted">{{$single->nid_no}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Personal-Information -->


                </div>
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
    @endsection
