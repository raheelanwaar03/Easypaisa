@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Plans</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Plan Name</th>
                                            <th>Plan Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($home_plans as $plan)
                                            <tr>
                                                <td>{{ $plan->plan_name }}</td>
                                                <td>{{ $plan->details }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Edit.Home.Plan', ['id' => $plan->id]) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
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
