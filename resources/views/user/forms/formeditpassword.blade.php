@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">แก้ไขรหัสผ่าน</div>

                <div class="card-body">
                  @if( !empty($data->id) )
                  <form method="POST" action="{{ action('userController@editProfile', $data->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                    <form method="POST" action="{{ url('user') }}" enctype="multipart/form-data">
                      @endif

                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่านเดิม') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ !empty($errors->first('name'))}}" name="name" value="{{ !empty($data->name) ? $data->name: old('name') }}" required>
                                  </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control {{ !empty($errors->first('lastname'))}}" name="lastname" value="{{ !empty($data->lastname) ? $data->lastname: old('lastname') }}" required>
                                  </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control {{ !empty($errors->first('email'))}}" name="email" value="{{ !empty($data->email) ? $data->email: old('email') }}" required>
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
