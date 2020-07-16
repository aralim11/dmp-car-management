@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row w-100" style="margin-top: 30px;">
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-calculator" aria-hidden="true"></span></div>
                                <div class="text-info text-center mt-3"><h4>Total Requisition</h4></div>
                                <div class="text-info text-center mt-2"><h1>{{ $total }}</h1></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-danger mx-sm-1 p-3">
                                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-eye-slash" aria-hidden="true"></span></div>
                                <div class="text-danger text-center mt-3"><h4>Pending Requisition</h4></div>
                                <div class="text-danger text-center mt-2"><h1>{{ $pending }}</h1></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-success mx-sm-1 p-3">
                                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                                <div class="text-success text-center mt-3"><h4>Accept Requisition</h4></div>
                                <div class="text-success text-center mt-2"><h1>{{ $accepted }}</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
