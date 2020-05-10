@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ฟอร์มใบลา</div>
                @csrf

                <div class="card-body">
                <form action="" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">


                            <input type="hidden" name="id" value="">

                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">ข้าพเจ้า : </label>
                                        <h5><p></p></h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">พนักงานประจำตำแหน่ง : </label>
                                        <h5><p for="date"> </p></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">ฝ่าย/แผนก : </label>
                                        <h5><p for="date"> </p></h5>
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
                                        <label for="date">การลา*</label>
                                        <select name="title_name" class="form-control {{ !empty( $errors->first('title_name')) ? 'is-invalid' : '' }}">
                                            <option value="">-เลือกหมายเหตุการลา-</option>
                                            <option value="ลาป่วย">ลาป่วย</option>
                                            <option value="ลากิจ">ลากิจ</option>
                                            <option value="อื่นๆ">อื่นๆ</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">อื่นๆ โปรดระบุ *</label>
                                        <input  type="text" class="form-control" name="etc" value="{{ !empty($data->etc) ? $data->etc: old('etc') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">เนื่องจาก *</label>
                                        <textarea  name="detail" class="form-control {{ !empty( $errors->first('detail')) ? 'is-invalid' : '' }}"
                                            placeholder="สาเหตุการลา *" rows="4"
                                            data-error="Please, leave us a message.">

                                            </textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="since">ตั้งแต่วันที่ *</label>
                                        <input id="since" type="date"
                                            class="form-control {{ $errors->first('since') ? ' is-invalid' : '' }}"
                                            name="since" value="{{ !empty($data->since) ? $data->since: old('since') }}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date">ถึงวันที่</label>
                                        <input id="todate" type="date"
                                            class="form-control {{ $errors->first('todate') ? ' is-invalid' : '' }}"
                                            name="todate" value="{{ !empty($data->todate) ? $data->todate: old('todate') }}">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="since">เป็นเวลา</label>
                                        <input id="since" type="text"
                                            class="form-control {{ $errors->first('alltime') ? ' is-invalid' : '' }}"
                                            name="alltime" value="{{ !empty($data->alltime) ? $data->alltime: old('alltime') }}">

                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contacted">เบอร์โทรศัพท์ติดต่อ หากมีธุระเร่งด่วน</label>
                                        <input id="contacted" type="text"
                                            class="form-control {{ $errors->first('contacted') ? ' is-invalid' : '' }}"
                                            name="contacted" value="{{ !empty($data->contacted) ? $data->contacted: old('contacted') }}">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ไฟล์แนบ</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" accept="image/*">
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
