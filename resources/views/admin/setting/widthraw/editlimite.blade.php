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
                                <h3 style="text-align: center">Edit Refer and Widthraw Limite</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Update.Widthraw.Limit', ['id' => $limite->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Minimum Widthraw</label>
                                        <input type="text" name="mini_widthraw" value="{{ $limite->mini_widthraw }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Maximum Widthraw</label>
                                        <input type="text" name="max_widthraw" value="{{ $limite->max_widthraw }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Plan A</label>
                                        <input type="text" name="planA" value="{{ $limite->planA }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Plan B</label>
                                        <input type="text" name="planB" value="{{ $limite->planB }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Plan C</label>
                                        <input type="text" name="planC" value="{{ $limite->planC }}"
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
