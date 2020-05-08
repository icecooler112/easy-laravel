@extends('layouts.adminlay')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ !empty($data->id) ? "แก้ไข" : "เพิ่ม" }}ตำแหน่งงาน</div>

                <div class="card-body">
                  @if( !empty($data->id) )
                  <form method="POST" action="{{ action('positionController@update', $data->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                    <form method="POST" action="{{ url('position') }}" enctype="multipart/form-data">
                      @endif

                        @csrf

                        <div class="form-group row">
                            <label for="name_position" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อตำแหน่งงาน') }}</label>
                            <div class="col-md-6">
                                <input id="name_position" type="text" class="form-control {{ !empty($errors->first('name_position')) ? 'is-invalid' : '' }}" name="name_position" value="{{ !empty($data->name_position) ? $data->name_position: old('name_position') }}">
                                @if( !empty($errors->first('name_position')) )
                                    <message class="text-danger">- {{ $errors->first('name_position') }}</message>
                                    @endif
                                  </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-success "> บันทึก</button>
                                 <a href="{{ url('/position') }}" class="btn btn-danger "> ยกเลิก</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
