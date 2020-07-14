@extends('admin.app')

@section('title', 'Car Info')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.car.create') }}"><button class="btn btn-outline-primary btn-sm float-right">Add Car Info</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Car Number</th>
                                    <th scope="col">Driver Name</th>
                                    <th scope="col">Car Type</th>
                                    <th scope="col">Fuel Type</th>
                                    <th scope="col">Fuel Consumption </th>
                                    <th scope="col">Site Number</th>
                                    <th scope="col">Registration Date</th>
                                    <th scope="col">Expire Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $datas->number_plate }}</td>
                                        <td>{{ $datas->driverName->driver_name }}</td>
                                        <td>@if($datas->car_type == 1){{ 'Pickup Truck' }}@elseif($datas->car_type == 2){{ 'Sport Utility Vehicle' }}@elseif($datas->car_type == 3){{ 'Mini-Van' }}@elseif($datas->car_type == 4){{ 'Station Wagon' }}@elseif($datas->car_type == 5){{ 'Sedan' }}@endif</td>
                                        <td>@if($datas->fuel_type == 1){{ 'Petrol' }}@elseif($datas->fuel_type == 2){{ 'Diesel' }}@elseif($datas->fuel_type == 3){{ 'Octane' }}@elseif($datas->fuel_type == 4){{ 'Kerosene' }}@elseif($datas->fuel_type == 5){{ 'GAS' }}@endif</td>
                                        <td>{{ $datas->fuel_consumption }}</td>
                                        <td>{{ $datas->site_number }}</td>
                                        <td>{{ $datas->reg_date }}</td>
                                        <td>{{ $datas->exp_date }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('super.car.edit', $datas->id) }}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>&nbsp;&nbsp;

                                                <form method="POST" action="{{ route('super.car.destroy', $datas->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
