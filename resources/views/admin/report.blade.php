@extends('layouts.adminlay')

@section('content')
<div class="container">
  <h3 class="text-center">รายงานการลาของพนักงาน</h3>
  <br>
    <div class="clearfix mb-2">
                 <div class="form-group text-center ">
                <a href="" class="btn btn-success text-center"> Export to Excel</a>
                <a href="{{ asset('report/pdf') }}" class="btn btn-danger text-center"> Export to PDF</a>
              </form>
          </div>

    </div>


    <table class="table table-striped">
    <thead class="text-center">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อ-สกุล</th>
      <th scope="col">การลา</th>
      <th scope="col">หมายเหตุ</th>
      <th scope="col">วันที่ลา</th>
      <th scope="col">ถึงวันที่</th>
      <th scope="col">เป็นจำนวนวัน</th>

    </tr>
    </thead>
    <tbody class="text-center">
      @foreach( $data as $key => $value)
    <tr>
      <td >{{$loop->iteration }}</td>
      <td >{{ $value->name_title }} {{ $value->name }} {{ $value->lastname }}</td>
      <td >{{ $value->title_name }}</td>
      <td >{{ $value->detail }}</td>
      <td >{{ $value->date }}</td>
      <td >{{ $value->date_to }}</td>
      <td >{{ $value->all_time }} วัน</td>
    </tr>
    @endforeach

    </tbody>
    </table>
</div>
@endsection
