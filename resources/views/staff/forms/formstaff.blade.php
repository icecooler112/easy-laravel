@extends('layouts.adminlay')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ !empty($data->id) ? "แก้ไข" : "เพิ่ม" }}สมาชิก</div>

                <div class="card-body">
                  @if( !empty($data->id) )
                  <form method="POST" action="{{ action('staffController@update', $data->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                    <form method="POST" action="{{ url('staff') }}" enctype="multipart/form-data">
                      @endif

                        @csrf
                        @if( !empty($data->img) )
                        <div class="text-center">
                          <img src="{{ asset('storage/'.$data->img) }}" width="150" height="150">
                        </div>
                        @endif
                        <br>
                        <div class="form-group row" >
                            <label for="name_title" class="col-md-4 col-form-label text-md-right">{{ __('คำนำหน้าชื่อ') }}</label>

                              <div class="col-md-6">
                                <select class="form-control {{ !empty( $errors->first('name_title'))}}" name="name_title" id="name_title" required>
                                    <option value="{{ !empty($data->name_title) ? $data->name_title: old('name_title') }}" class="form-control">-กรุณาเลือกคำนำหน้าชื่อ-</option>
                                        <option value="นาย" @if( old ('name_title')=='นาย') selected="selected" @endif>นาย</option>
                                        <option value="นาง" @if (old('name_title') == 'นาง') selected="selected" @endif>นาง</option>
                                        <option value="นางสาว" @if (old('name_title') == 'นางสาว') selected="selected" @endif>นางสาว</option>
                                            </select>
                                                    </div>
                                                </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ !empty($errors->first('name'))}}" name="name" value="{{ !empty($data->name) ? $data->name: old('name') }}" required>
                                  </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control {{ !empty($errors->first('lastname'))}}" name="lastname" value="{{ !empty($data->lastname) ? $data->lastname: old('lastname') }}" required>
                                  </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control {{ !empty($errors->first('email'))}}" name="email" value="{{ !empty($data->email) ? $data->email: old('email') }}" required>
                                  </div>
                        </div>

                        <div class="form-group row">
                           <label for="position" class="col-md-4 col-form-label text-md-right">ตำแหน่งงาน</label>

                           <div class="col-md-6">
                               <select class="form-control {{ !empty( $errors->first('position')) }}" name="position" id="position" value="{{ !empty($data->position) ? $data->position: old('position') }}" required>
                               <option value="" class="form-control">-เลือกตำแหน่งงาน-</option>
                               @foreach( $position AS $key => $value )
                               @php
                                   $sel = '';
                               @endphp

                               @if( !empty($data->position) )
                                   @if($value->id == $data->position )
                                       @php
                                           $sel='selected="1"';
                                       @endphp
                                   @endif
                               @endif
                                   @if($value->id == old('name_position'))
                                   @php
                                       $sel = 'selected="1"';
                                   @endphp
                               @endif
                               <option class="form-control" {{ $sel }} value="{{ $value->id }}"> {{ $value->name_position }} </option>
                               @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">แผนกงาน</label>

                            <div class="col-md-6">
                            <select class="form-control {{ !empty( $errors->first('department')) ? 'is-invalid' : '' }}" name="department" id="department" value="{{ !empty($data->department) ? $data->department: old('department') }}" required>
                            <option value="" class="form-control">-เลือกแผนกงาน-</option>
                            @foreach( $department AS $key => $value )
                            @php
                                $sel = '';
                            @endphp

                            @if( !empty($data->department) )
                                @if($value->id == $data->department )
                                    @php
                                        $sel='selected="1"';
                                    @endphp
                                @endif
                            @endif
                                @if($value->id == old('department'))
                                @php
                                    $sel = 'selected="1"';
                                @endphp
                            @endif
                            <option class="form-control" {{ $sel }} value="{{ $value->id }}"> {{ $value->name_department }} </option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('รูปภาพ') }}</label>
                            <div class="col-md-6">
                            <input type="file" class="form-control" id="img" name="img" accept="image/*">
                            </div>

                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-success "> บันทึก</button>
                                 <a href="{{ url('/staff') }}" class="btn btn-danger "> ยกเลิก</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
