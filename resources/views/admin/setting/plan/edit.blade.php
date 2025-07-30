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
                                <h3 style="text-align: center">Edit Plan Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Update.Home.Plan', ['id' => $home_plan->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Plan Name</label>
                                        <input type="text" name="plan_name" value="{{ $home_plan->easy_num }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Easypaisa Name</label>
                                        <textarea name="details" cols="30" rows="10">{{ $home_plan->detail }}</textarea>
                                    </div>
                                    <div class="my-3">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
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
