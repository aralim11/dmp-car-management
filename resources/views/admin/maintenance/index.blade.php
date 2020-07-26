@extends('admin.app')

@section('title', 'Maintenance')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.maintenance.create') }}"><button class="btn btn-outline-primary btn-sm float-right">Add Maintenance</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Car ID</th>
                                    <th scope="col">Maintenance Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $datas->carInfo->car_id }}</td>
                                        <td>
                                            @if($datas->main_type == 1)<h5><span class="badge badge-secondary">Paper Work</span></h5>
                                            @elseif($datas->main_type == 2)<h5><span class="badge badge-secondary">Engine Problem</span></h5>
                                            @elseif($datas->main_type == 3)<h5><span class="badge badge-secondary">Electrical Problem</span></h5>
                                            @elseif($datas->main_type == 4)<h5><span class="badge badge-secondary">Oil/Air Filter Change</span></h5>
                                            @elseif($datas->main_type == 5)<h5><span class="badge badge-secondary">Brake Problem</span></h5>
                                            @elseif($datas->main_type == 6)<h5><span class="badge badge-secondary">Lights Problem</span></h5>
                                            @elseif($datas->main_type == 7)<h5><span class="badge badge-secondary">Gear Problem</span></h5>
                                            @elseif($datas->main_type == 8)<h5><span class="badge badge-secondary">Gear Oil Change</span></h5>
                                            @elseif($datas->main_type == 9)<h5><span class="badge badge-secondary">Car Interior</span></h5>
                                            @elseif($datas->main_type == 10)<h5><span class="badge badge-secondary">Other</span></h5>@endif
                                        </td>
                                        <td>@if($datas->status == 0)<h5><span class="badge badge-secondary">Under Maintenance</span></h5>
                                            @elseif($datas->status == 1)<h5><span class="badge badge-success">Released</span></h5>
                                            @elseif($datas->status == 2)<h5><span class="badge badge-warning">Request</span></h5>@endif</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('super.maintenance.edit', $datas->id) }}"><button class="btn btn-outline-primary btn-sm" @if($datas->status == 1){{'disabled'}}@endif>Edit</button></a>&nbsp;&nbsp;
                                                @if(Auth::user()->access == 0)
                                                    <form method="POST" action="{{ route('super.maintenance.destroy', $datas->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
