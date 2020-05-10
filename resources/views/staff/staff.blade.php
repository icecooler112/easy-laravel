@extends('layouts.adminlay')

@section('content')
<div class="container">
  <h3 class="text-center">ข้อมูลสมาชิก</h3>
    <div class="clearfix mb-2">
      <div class="float-right">
             <form method="GET" class="form-inline">

                 <div class="form-group">
                     <label for="search" class="sr-only">Search</label>
                     <input type="text" class="form-control" id="search" name="search" placeholder="" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
    </div>
                <button type="submit" class="btn btn-primary "><i class="fa fa-search"></i> ค้นหา</button>
                <a href="{{ url('staff/create') }}" class="btn btn-success float-right ml-2"> เพิ่มข้อมูลสมาชิก</a>
              </form>
          </div>

    </div>


    <table class="table table-striped">
    <thead class="text-center">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">รูปภาพ</th>
      <th scope="col">ชื่อ-สกุล</th>
      <th scope="col">ตำแหน่งงาน</th>
      <th scope="col">แผนก</th>
      <th scope="col">จัดการ</th>
    </tr>
    </thead>
    <tbody class="text-center">
      @foreach( $data as $key => $value)
    <tr>
      <td >{{$loop->iteration }}</td>
      <td >
        @if( !empty($value->img) )
        <img src="{{ asset('storage/'.$value->img) }}" style="width: 80px; height: auto;">
        @endif
      </td>
      <td >{{ $value->name }} {{ $value->lastname }}</td>
      <td >{{ $value->position }}</td>
      <td >{{ $value->department }}</td>
      <td>
      <a href="{{ action('staffController@edit', $value->id) }}" class="btn btn-warning">แก้ไข</a>
      <a href="{{ action('staffController@delete', $value->id) }}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบข้อมูล</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
