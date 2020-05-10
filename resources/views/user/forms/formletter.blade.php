@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ฟอร์มใบลา</div>
                @csrf

                <div class="card-body">
                <form method="POST" action="{{ url('letter') }}" enctype="multipart/form-data">
                  
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_title" >คำนำหน้า </label>
                                        <input id="name_title" type="text" class="form-control {{ !empty($errors->first('name_title'))}}" name="name_title" value="{{ !empty($data->name_title) ? $data->name_title: old('name_title') }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" >ชื่อ </label>
                                        <input id="name" type="text" class="form-control {{ !empty($errors->first('name'))}}" name="name" value="{{ !empty($data->name) ? $data->name: old('name') }}" disabled>
                                        <input id="name" name="name" value="{{ !empty($data->name) ? $data->name: old('name') }}" hidden>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">สกุล </label>
                                        <input id="lastname" type="text" class="form-control {{ !empty($errors->first('lastname'))}}" name="lastname" value="{{ !empty($data->lastname) ? $data->lastname: old('lastname') }}" disabled>
                                        <input id="lastname" name="lastname" value="{{ !empty($data->lastname) ? $data->lastname: old('lastname') }}" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">ตำแหน่งงาน : </label>
                                        <input id="position" type="text" class="form-control {{ !empty($errors->first('position'))}}" name="position" value="{{ !empty($data->position) ? $data->position: old('position') }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department">แผนกงาน : </label>
                                        <input id="department" type="text" class="form-control {{ !empty($errors->first('department'))}}" name="department" value="{{ !empty($data->department) ? $data->department: old('department') }}" disabled>
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
                                        <label for="title_name">การลา*</label>
                                        <select name="title_name" class="form-control {{ !empty( $errors->first('title_name'))}}" required>
                                            <option value="">-เลือกหมายเหตุการลา-</option>
                                            <option value="ลาป่วย">ลาป่วย</option>
                                            <option value="ลากิจ">ลากิจ</option>
                                            <option value="อื่นๆ">อื่นๆ</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="etc">อื่นๆ โปรดระบุ </label>
                                        <input  type="text" class="form-control" name="etc" value="{{ !empty($data->etc) ? $data->etc: old('etc') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail">เนื่องจาก </label>
                                        <textarea  name="detail" class="form-control {{ !empty( $errors->first('detail'))}}" rows="4" required></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="date">ตั้งแต่วันที่ *</label>
                                        <input id="date" type="date" class="form-control {{ $errors->first('date')  }}" name="date" value="{{ !empty($data->date) ? $data->date: old('date') }}" required>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_to">ถึงวันที่</label>
                                        <input id="date_to" type="date" class="form-control {{ $errors->first('date_to')  }}" name="date_to" value="{{ !empty($data->date_to) ? $data->date_to: old('date_to') }}" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="all_time">เป็นเวลา</label>
                                        <input id="all_time" type="text"
                                            class="form-control {{ $errors->first('all_time')  }}"
                                            name="all_time" value="{{ !empty($data->all_time) ? $data->all_time: old('all_time') }}">

                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">เบอร์โทรศัพท์ติดต่อ หากมีธุระเร่งด่วน</label>
                                        <input id="phone" type="text"
                                            class="form-control {{ $errors->first('phone')  }}"
                                            name="phone" value="{{ !empty($data->phone) ? $data->phone: old('phone') }}">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">ไฟล์แนบ</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" id="image" accept="image/*">
                                </div>

                            </div>
                            <div class="col-md-12" style="margin-top:30px; text-align:center;">
                              <button type="submit" class="btn btn-success "> บันทึก</button>
                              <a href="{{ url('/user') }}" class="btn btn-danger "> ยกเลิก</a>
                            </div>
                            <div class="form-group col-md-12" style="margin-left:270px;">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
