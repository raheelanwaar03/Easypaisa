@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="text-align: center">Add Task</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Store.Task') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter Task Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Link</label>
                                        <input type="text" name="link" class="form-control"
                                            placeholder="Enter Task Link" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" name="description" class="form-control"
                                            placeholder="Enter Task Description" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </div>
                                </form>
                            </div>
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
