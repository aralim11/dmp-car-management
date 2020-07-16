@extends('user.app')

@section('title', 'Car Requisition')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('user.requisition.index') }}"><button class="btn btn-outline-danger btn-sm float-right">Back</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <div class="container emp-profile">
                            <form method="post">
                                <div class="row">
                                    @if($data->status != 0)
                                        <div class="col-md-12">
                                            <h4 style="color: red; text-align: center;">No Car Assigned For This Requisition!</h4>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                                <img src="{{ asset("images/".$data->getCar->driverName->picture) }}" alt="Driver Image" style="height: 280px; width: 334px;"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Driver Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Car Info</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-content profile-tab" id="myTabContent" style="margin-top: 10px">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Driver ID</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->driverName->driver_id }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Driver Name</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->driverName->driver_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>License Number</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->driverName->license_number }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Phone Number</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->driverName->phone_number }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>License Issue Date</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->driverName->license_issue_date }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>License Expire Date</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->driverName->license_exp_date }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Car ID</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->car_id }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Number Plate</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->number_plate }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Engine Number</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->engine_number }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Fuel Type</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>@if($data->getCar->fuel_type == 1){{ 'Petrol' }}@elseif($data->getCar->fuel_type == 2){{ 'Diesel' }}@elseif($data->getCar->fuel_type == 3){{ 'Octane' }}@elseif($data->getCar->fuel_type == 4){{ 'Kerosene' }}@elseif($data->getCar->fuel_type == 5){{ 'GAS' }}@endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Fuel Consumption</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->fuel_consumption }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Car Type</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>@if($data->getCar->car_type == 1){{ 'Pickup Truck' }}@elseif($data->getCar->car_type == 2){{ 'Sport Utility Vehicle' }}@elseif($data->getCar->car_type == 3){{ 'Mini-Van' }}@elseif($data->getCar->car_type == 4){{ 'Station Wagon' }}@elseif($data->getCar->car_type == 5){{ 'Sedan' }}@endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Car Weight</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->car_weight }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Site Number</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->site_number }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Door Number</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->door_number }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Registration Date</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->reg_date }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Expire Date</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ $data->getCar->exp_date }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
