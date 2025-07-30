@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Reject Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Balance</th>
                                            <th>Referral</th>
                                            <th>Package</th>
                                            <th>TrxId</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->balance }}</td>
                                                <td>{{ $user->referral }}</td>
                                                <td>{{ $user->package }}</td>
                                                <td>{{ $user->trxIds->trx_id ?? 'UnpaidUser' }}</td>
                                                <td>{{ $user->status }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Make.User.Approve', ['id' => $user->id]) }}"
                                                        class="btn btn-sm btn-success">Approve</a>
                                                    <a href="{{ route('Admin.Make.User.Pending', ['id' => $user->id]) }}"
                                                        class="btn btn-sm btn-primary">Pending</a>
                                                    <a href="{{ route('Admin.Edit.User', ['id' => $user->id]) }}"
                                                        class="btn btn-sm btn-success">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--**********************************
                                                Footer start
                                            ***********************************-->
                <div class="footer">
                    <div class="copyright">
                        <p>Copyright © Designed &amp; Developed by <a href="#">
                                {{ env('APP_NAME') }}</a> 2022</p>
                    </div>
                </div>
                <!--**********************************
                                                Footer end
                                            ***********************************-->

            </div>
        </div>
    @endsection
