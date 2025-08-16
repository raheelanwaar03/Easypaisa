@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Tasks With Plans</h4>
                            <a href="{{ route('Admin.Add.Plan.Task') }}" class="btn btn-primary">Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <th>Link</th>
                                            <th>Price</th>
                                            <th>Plan</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $task->name }}</td>
                                                <td>{{ $task->level }}</td>
                                                <td>{{ $task->link }}</td>
                                                <td>{{ $task->price }}</td>
                                                <td>{{ $task->plan }}</td>
                                                <td><img src="{{ asset('task/' . $task->image) }}"
                                                        class="img-fluid img-responsive" height="80px" width="80px"
                                                        alt="Image"></td>
                                                <td>
                                                    <a href="{{ route('Admin.Delete.Plan.Task', ['id' => $task->id]) }}"
                                                        class="btn btn-danger">Delete</a>
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
