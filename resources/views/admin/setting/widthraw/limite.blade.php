@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Widthraw & Refer Limites</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Minimum Widthraw</th>
                                            <th>Maximum Widthraw</th>
                                            <th>Plan A</th>
                                            <th>Plan B</th>
                                            <th>Plan C</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($limites as $limit)
                                            <tr>
                                                <td>{{ $limit->min_widthraw }}</td>
                                                <td>{{ $limit->max_widthraw }}</td>
                                                <td>{{ $limit->planA }}</td>
                                                <td>{{ $limit->planB }}</td>
                                                <td>{{ $limit->planC }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Edit.Widthraw.Limit', ['id' => $limit->id]) }}"
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
