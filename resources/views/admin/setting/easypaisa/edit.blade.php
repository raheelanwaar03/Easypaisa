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
                                <h3 style="text-align: center">Edit Easypaisa Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Update.Easypaisa.Num', ['id' => $easypaisa->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Account Number</label>
                                        <input type="text" name="easy_num" value="{{ $easypaisa->easy_num }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Account Title</label>
                                        <input type="text" name="easy_name" value="{{ $easypaisa->easy_name }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bank</label>
                                        <input type="text" name="bank" value="{{ $easypaisa->bank }}"
                                            class="form-control">
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
