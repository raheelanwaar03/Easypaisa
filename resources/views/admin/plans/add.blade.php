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
                                <h3 style="text-align: center">Add Plan</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Store.Plans') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter plan name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Investment</label>
                                        <input type="number" name="investment" class="form-control"
                                            placeholder="Enter plan Investment" min="1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Total Profit</label>
                                        <input type="number" name="total_profit" class="form-control"
                                            placeholder="Enter plan Total Profit" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Duration</label>
                                        <select name="duration" class="form-control" required>
                                            <option value="15" style="color:black;">15Days</option>
                                            <option value="30" style="color:black;">30Days</option>
                                            <option value="45" style="color:black;">45Days</option>
                                            <option value="60" style="color:black;">60Days</option>
                                        </select>
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
