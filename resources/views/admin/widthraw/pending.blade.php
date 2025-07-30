@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pending Request for buying plans</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Receiver Name</th>
                                            <th>Receiver Number</th>
                                            <th>Bank Type</th>
                                            <th>Widthraw Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($widthraws as $request)
                                            <tr>
                                                <td>{{ $request->user_name }}</td>
                                                <td>{{ $request->account }}</td>
                                                <td>{{ $request->type }}</td>
                                                <td>{{ $request->amount }}</td>
                                                <td>{{ $request->status }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Make.Approved.Widthraw', ['id' => $request->id]) }}"
                                                        class="btn btn-sm btn-success">Approved</a>
                                                        <a href="{{ route('Admin.Make.Rejected.Widthraw', ['id' => $request->id]) }}"
                                                            class="btn btn-sm btn-danger">Reject</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="copyright">
                        <p>Copyright © Designed &amp; Developed by <a href="#">
                                {{ env('APP_NAME') }}</a> 2022</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
