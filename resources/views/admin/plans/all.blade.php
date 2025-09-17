@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Plans With Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Investment</th>
                                            <th>Total_Profit</th>
                                            <th>Duration</th>
                                            <th>Bounce</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plans as $plan)
                                            <tr>
                                                <td>{{ $plan->name }}</td>
                                                <td>{{ $plan->investment }}</td>
                                                <td>{{ $plan->total_profit }}</td>
                                                <td>{{ $plan->duration }}</td>
                                                <td>{{ $plan->bounce }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Edit.Plan', ['id' => $plan->id]) }}"
                                                        class="btn btn-primary">Edit</a>
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
