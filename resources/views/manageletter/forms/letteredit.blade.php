@extends('layouts.adminlay')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ฟอร์มใบลา</div>

                <div class="card-body">
                  <form method="POST" action="{{ action('manageletterController@update', $data->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                  @csrf
                  <input  type="text" class="form-control {{ !empty($errors->first('user_id'))}}" name="user_id" value="{{ !empty($data->user_id) ? $data->user_id: old('user_id') }}" hidden >
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_title" >คำนำหน้า </label>
                                        <input  type="text" class="form-control {{ !empty($errors->first('name_title'))}}" name="name_title" value="{{ !empty($data->name_title) ? $data->name_title: old('name_title') }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" >ชื่อ </label>
                                        <input  type="text" class="form-control {{ !empty($errors->first('name'))}}" name="name" value="{{ !empty($data->name) ? $data->name: old('name') }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">สกุล </label>
                                        <input  type="text" class="form-control {{ !empty($errors->first('lastname'))}}" name="lastname" value="{{ !empty($data->lastname) ? $data->lastname: old('lastname') }}" disabled>

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">ตำแหน่งงาน : </label>
                                        <input  type="text" class="form-control {{ !empty($errors->first('position'))}}" name="position" value="{{ !empty($data->position) ? $data->position: old('position') }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department">แผนกงาน : </label>
                                        <input  type="text" class="form-control {{ !empty($errors->first('department'))}}" name="department" value="{{ !empty($data->department) ? $data->department: old('department') }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                            <div class="col-md-6">
                                    <div class="form-group">
                                       <h5> <sapan>มีความประสงค์ </sapan> </h5>
                                    </div>
                                </div>
                                </div>
                            <div class="row" style="margin-top:7px;">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="title_name">การลา</label>
                                      <input  type="text" class="form-control {{ $errors->first('title_name')  }}" name="title_name" value="{{ !empty($data->title_name) ? $data->title_name: old('title_name') }}" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="etc">อื่นๆ โปรดระบุ </label>
                                        <input  type="text" class="form-control" name="etc" value="{{ !empty($data->etc) ? $data->etc: old('etc') }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail">เนื่องจาก </label>
                                        <textarea  name="detail" class="form-control {{ !empty( $errors->first('detail'))}}" rows="4" disabled>{{ !empty($data->detail) ? $data->detail: old('detail') }}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="date">ตั้งแต่วันที่ *</label>
                                        <input  type="date" class="form-control {{ $errors->first('date')  }}" name="date" value="{{ !empty($data->date) ? $data->date: old('date') }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_to">ถึงวันที่</label>
                                        <input  type="date" class="form-control {{ $errors->first('date_to')  }}" name="date_to" value="{{ !empty($data->date_to) ? $data->date_to: old('date_to') }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="all_time">เป็นเวลา</label>
                                        <input  type="text"
                                            class="form-control {{ $errors->first('all_time')  }}"
                                            name="all_time" value="{{ !empty($data->all_time) ? $data->all_time: old('all_time') }}" disabled>

                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">เบอร์โทรศัพท์ติดต่อ หากมีธุระเร่งด่วน</label>
                                        <input  type="text"
                                            class="form-control {{ $errors->first('phone')  }}"
                                            name="phone" value="{{ !empty($data->phone) ? $data->phone: old('phone') }}" disabled>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <label for="status">การอนุมัติการลา</label>
                                    <select id="status" name="status" class="form-control {{ !empty( $errors->first('status'))}}" required>
                                        <option value="">-เลือกการอนุมัติ-</option>
                                        <option value="อนุมัติ">อนุมัติ</option>
                                        <option value="ไม่อนุมัติ">ไม่อนุมัติ</option>

                                    </select>
                                  </div>
                                </div>


                            <div class="col-md-12" style="margin-top:30px; text-align:center;">
                               <button type="submit" class="btn btn-success "> บันทึก</button>
                              <a href="{{ url('/manageletter') }}" class="btn btn-danger "> ยกเลิก</a>
                            </div>
                            <div class="form-group col-md-12" style="margin-left:270px;">
                            </div>
                              </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
