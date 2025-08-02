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
                                <h3 style="text-align: center">Edit Whatsapp Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Update.Whatsapp.Setting', $whatsapp->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Whatsapp Link</label>
                                        <input type="text" name="whatsapp_link" value="{{ $whatsapp->whatsapp_link }}"
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
