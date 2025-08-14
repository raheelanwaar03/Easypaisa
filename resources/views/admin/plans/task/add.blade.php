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
                                <h3 style="text-align: center">Add Task With Plan</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Store.Plan.Task') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Task Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Link</label>
                                        <input type="text" name="link" class="form-control"
                                            placeholder="Enter Task Link" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control bg-transperent" style="color:black">
                                            <option value="level 0">Level 0</option>
                                            <option value="level 1">Level 1</option>
                                            <option value="level 2">Level 2</option>
                                            <option value="level 3">Level 3</option>
                                            <option value="level 4">Level 4</option>
                                            <option value="level 5">Level 5</option>
                                            <option value="level 6">Level 6</option>
                                            <option value="level 7">Level 7</option>
                                            <option value="level 8">Level 8</option>
                                            <option value="level 9">Level 9</option>
                                            <option value="level 10">Level 10</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="price" class="form-control"
                                            placeholder="Enter Task price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="plan">Plan</label>
                                        <select name="plan" id="plan" class="form-control bg-transperent" style="color:black">
                                            @foreach ($plans as $item)
                                                <option value="{{ $item->name }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
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
