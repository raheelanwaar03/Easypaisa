@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rejected Request for buying plans</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Investment</th>
                                            <th>Sender Name</th>
                                            <th>Sender Number</th>
                                            <th>Trx Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $request)
                                            <tr>
                                                <td>{{ $request->plan_name }}</td>
                                                <td>{{ $request->plan_investment }}</td>
                                                <td>{{ $request->name }}</td>
                                                <td>{{ $request->number }}</td>
                                                <td>{{ $request->trxId }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Make.Buy.Request.Approved', ['id' => $request->id]) }}"
                                                        class="btn btn-sm btn-success">Approved</a>
                                                    <a href="{{ route('Admin.Make.Buy.Request.Pending', ['id' => $request->id]) }}"
                                                        class="btn btn-sm btn-primary">Pending</a>
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
