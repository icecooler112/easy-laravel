
@extends('layouts.adminlay')

@section('content')
<div class="container">
  <h3 class="text-center">รายการลา</h3>
    <div class="clearfix mb-2">

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
      <th scope="col">สถานะ</th>
      <th scope="col">ตรวจสอบ</th>

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
      <td >{{ $value->status }}</td>
      <td >  <a href="{{ action('manageletterController@edit', $value->id) }}" class="btn btn-info">ตรวจสอบ</a></td>
    </tr>
@endforeach
    </tbody>
    </table>
</div>
@endsection
