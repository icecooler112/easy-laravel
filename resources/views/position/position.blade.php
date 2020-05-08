@extends('layouts.adminlay')

@section('content')
<div class="container">
  <h3 class="text-center">ข้อมูลตำแหน่งงาน</h3>
    <div class="clearfix mb-2">
      <div class="float-right">
             <form method="GET" class="form-inline">

                 <div class="form-group">
                     <label for="search" class="sr-only">Search</label>
                     <input type="text" class="form-control" id="search" name="search" placeholder="" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
    </div>
                <button type="submit" class="btn btn-primary "><i class="fa fa-search"></i> ค้นหา</button>
                <a href="{{ url('position/create') }}" class="btn btn-success float-right ml-2"> เพิ่มข้อมูลตำแหน่งงาน</a>
              </form>
          </div>

    </div>


    <table class="table table-striped">
    <thead class="text-center">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อตำแหน่งงาน</th>
      <th scope="col">แก้ไขล่าสุด</th>
      <th scope="col">จัดการ</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <tr>
      <td >1</td>
      <td >IT</td>
      <td ></td>
      <td>
      <a href="#" class="btn btn-warning">แก้ไข</a>
      <a href="#" class="btn btn-danger">ลบข้อมูล</a>
    </td>
    </tr>

    </tbody>
    </table>
</div>
@endsection
