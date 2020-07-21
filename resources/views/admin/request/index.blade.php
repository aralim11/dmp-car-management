@extends('admin.app')

@section('title', 'Car Requisition')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requisition From</th>
                                    <th scope="col">Car ID</th>
                                    <th scope="col">Requisition Type</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Requisition Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $datas->ReqUserName->name }}</td>
                                        <td>@if($datas->car_id == '') <h5><span class="badge badge-danger">Not Assigned</span></h5>@else{{ $datas->getCar->car_id }}@endif</td>
                                        <td>@if($datas->requisition_type == 1){{ 'Permanent' }}@elseif($datas->requisition_type == 2){{ 'Official' }}@elseif($datas->requisition_type == 3){{ 'Rental' }}@elseif($datas->requisition_type == 4){{ 'For Guest' }}@endif</td>
                                        <td>{{ $datas->start_date }}</td>
                                        <td>{{ $datas->end_date }}</td>
                                        <td>{{ $datas->created_at }}</td>
                                        <td>
                                            @if($datas->status == 0) <h5><span class="badge badge-success">Accept</span></h5>
                                            @elseif($datas->status == 1) <h5><span class="badge badge-warning">Pending</span></h5>
                                            @elseif($datas->status == 2) <h5><span class="badge badge-info">Late</span></h5>
                                            @elseif($datas->status == 3) <h5><span class="badge badge-danger">Cancel</span></h5>@endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('super.requisition.edit', $datas->id) }}"><button class="btn btn-outline-primary btn-sm" @if($datas->status == 3){{ 'disabled' }}@endif>Review</button></a>&nbsp;&nbsp;

                                                @if(Auth::user()->access == 0)
                                                    <form method="POST" action="{{ route('super.requisition.destroy', $datas->id) }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
