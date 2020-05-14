@extends('layouts.adminlay')

@section('content')
<div class="container">
  <h3 class="text-center">รายงานการลาของพนักงาน</h3>
  <br>
    <div class="clearfix mb-2">
                 <div class="form-group text-center ">
                <a href="{{ url('letter/create') }}" class="btn btn-success text-center"> Export to Excel</a>
                <a href="{{ url('letter/create') }}" class="btn btn-danger text-center"> Export to PDF</a>
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
      <th scope="col">จัดการ</th>
    </tr>
    </thead>
    <tbody class="text-center">

    <tr>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td>

    </td>
    </tr>

    </tbody>
    </table>
</div>
@endsection
