@extends('admin.app')

@section('title', 'User Info')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.user.create') }}"><button class="btn btn-outline-primary btn-sm float-right">Add User</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $datas->name }}</td>
                                        <td>{{ $datas->designation }}</td>
                                        <td>{{ $datas->phone }}</td>
                                        <td>{{ $datas->email }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('super.user.edit', $datas->id) }}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>&nbsp;&nbsp;
                                                @if(Auth::user()->access == 0)
                                                    <form method="POST" action="{{ route('super.user.destroy', $datas->id) }}">
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
