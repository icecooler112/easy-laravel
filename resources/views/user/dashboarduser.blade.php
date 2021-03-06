@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="text-center">รายการลา</h3>
    <div class="clearfix mb-2">
      <div class="float-right">
             <form method="GET" class="form-inline">

                 <div class="form-group">
                     <label for="search" class="sr-only">Search</label>
                     <input type="text" class="form-control" id="search" name="search" placeholder="" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
    </div>
                <button type="submit" class="btn btn-primary "><i class="fa fa-search"></i> ค้นหา</button>
                <a href="{{ url('letter/create') }}" class="btn btn-success float-right ml-2"> ยื่นเรื่องลา</a>
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
      <th scope="col">สถานะ</th>

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
    </tr>
@endforeach
    </tbody>
    </table>
</div>
@endsection
