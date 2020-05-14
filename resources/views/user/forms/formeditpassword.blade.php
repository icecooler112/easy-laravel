@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">แก้ไขรหัสผ่าน</div>

                <div class="card-body">
                    <form method="POST" action="{{ asset('/changepassword') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่านเดิม') }}</label>
                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control " name="old_password" value="" required>
                                  </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control " name="new_password" value="" required>
                                  </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>
                            <div class="col-md-6">
                                <input id="new_password2" type="password" class="form-control " name="new_password2" value="" required>
                                  </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-success "> บันทึก</button>
                                 <a href="{{ url('/user') }}" class="btn btn-danger "> ยกเลิก</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
