@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Easypaisa Number Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Easypaisa Number</th>
                                            <th>Easypaisa Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($easypaisa as $easypaisa)
                                            <tr>
                                                <td>{{ $easypaisa->esay_num }}</td>
                                                <td>{{ $easypaisa->esay_name }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Edit.Easypaisa.Num', ['id' => $easypaisa->id]) }}"
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
