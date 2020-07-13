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
                                    <th scope="col">Car Type</th>
                                    <th scope="col">Fuel Type</th>
                                    <th scope="col">Fuel Consumption </th>
                                    <th scope="col">Site Number</th>
                                    <th scope="col">Registration Data</th>
                                    <th scope="col">Expire Data</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $datas->number_plate }}</td>
                                        <td>{{ $datas->car_type }}</td>
                                        <td>{{ $datas->fuel_type }}</td>
                                        <td>{{ $datas->fuel_consumption }}</td>
                                        <td>{{ $datas->site_number }}</td>
                                        <td>{{ $datas->reg_date }}</td>
                                        <td>{{ $datas->exp_date }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('super.driver.edit', $datas->id) }}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>&nbsp;&nbsp;

                                                <form method="POST">
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
