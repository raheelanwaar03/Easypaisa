@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Level Settings</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Level 1</th>
                                            <th>Level 2</th>
                                            <th>Level 3</th>
                                            <th>Level 4</th>
                                            <th>Level 5</th>
                                            <th>Level 6</th>
                                            <th>Level 7</th>
                                            <th>Level 8</th>
                                            <th>Level 9</th>
                                            <th>Level 10</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($levels as $level)
                                            <tr>
                                                <td>{{ $level->level1 }}</td>
                                                <td>{{ $level->level2 }}</td>
                                                <td>{{ $level->level3 }}</td>
                                                <td>{{ $level->level4 }}</td>
                                                <td>{{ $level->level5 }}</td>
                                                <td>{{ $level->level6 }}</td>
                                                <td>{{ $level->level7 }}</td>
                                                <td>{{ $level->level8 }}</td>
                                                <td>{{ $level->level9 }}</td>
                                                <td>{{ $level->level10 }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.Edit.Level', ['id' => $level->id]) }}"
                                                        class="btn btn-primary">Edit</a>
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
