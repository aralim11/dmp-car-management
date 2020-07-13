@extends('admin.app')

@section('title', 'Driver')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.driver.create') }}"><button class="btn btn-outline-primary btn-sm float-right">Add Driver</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ddriver Name</th>
                                    <th scope="col">License Number</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">License Issue Date</th>
                                    <th scope="col">License Expire Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $datas->driver_name }}</td>
                                        <td>{{ $datas->license_number }}</td>
                                        <td>{{ $datas->phone_number }}</td>
                                        <td>{{ $datas->license_issue_date }}</td>
                                        <td>{{ $datas->license_exp_date }}</td>
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
