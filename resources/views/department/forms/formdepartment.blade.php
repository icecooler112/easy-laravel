@extends('layouts.adminlay')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ !empty($data->id) ? "แก้ไข" : "เพิ่ม" }}แผนกงาน</div>

                <div class="card-body">
                  @if( !empty($data->id) )
                  <form method="POST" action="{{ action('departmentController@update', $data->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                    <form method="POST" action="{{ url('department') }}" enctype="multipart/form-data">
                      @endif

                        @csrf

                        <div class="form-group row">
                            <label for="name_department" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อแผนกงาน') }}</label>
                            <div class="col-md-6">
                                <input id="name_department" type="text" class="form-control {{ !empty($errors->first('name_department')) ? 'is-invalid' : '' }}" name="name_department" value="{{ !empty($data->name_department) ? $data->name_department: old('name_department') }}">
                                @if( !empty($errors->first('name_department')) )
                                    <message class="text-danger">- {{ $errors->first('name_department') }}</message>
                                    @endif
                                  </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-success "> บันทึก</button>
                                 <a href="{{ url('/department') }}" class="btn btn-danger "> ยกเลิก</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
