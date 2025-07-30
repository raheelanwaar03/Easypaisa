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
                                <h3 style="text-align: center">{{ $user->name }} Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Update.User.Details',['id'=>$user->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="number" name="email" value="{{ $user->email }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Balance</label>
                                        <input type="number" name="balance" value="{{ $user->balance }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="mobile" value="{{ $user->mobile }}" class="form-control" readonly>
                                    </div>
                                    <div class="my-3">
                                        <button class="btn btn-info" type="submit">Update</button>
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
