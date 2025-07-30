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
                                <h3 style="text-align: center">Edit Level Settings</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Update.Level', ['id' => $level->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Level 1</label>
                                        <input type="text" name="level1" value="{{ $level->level1 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 2</label>
                                        <input type="text" name="level2" value="{{ $level->level2 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 3</label>
                                        <input type="text" name="level3" value="{{ $level->level3 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 4</label>
                                        <input type="text" name="level4" value="{{ $level->level4 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 5</label>
                                        <input type="text" name="level5" value="{{ $level->level5 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 6</label>
                                        <input type="text" name="level6" value="{{ $level->level6 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 7</label>
                                        <input type="text" name="level7" value="{{ $level->level7 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 8</label>
                                        <input type="text" name="level8" value="{{ $level->level8 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 9</label>
                                        <input type="text" name="level9" value="{{ $level->level9 }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level 10</label>
                                        <input type="text" name="level10" value="{{ $level->level10 }}"
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
