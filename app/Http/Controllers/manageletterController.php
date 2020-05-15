<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lettermodel AS LM; //เรียก positionmodel มาใช้ใน Controller นี้
use App\Models\staffmodel AS SM; //เรียก positionmodel มาใช้ใน Controller นี้
use App\Models\managelettermodel AS MM; //เรียก positionmodel มาใช้ใน Controller นี้
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;
class manageletterController extends Controller
{
  protected $cValidator = [

  ];

  protected $cValidatorMsg = [

  ];

  public $limit = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, MM $pm)
    {
      $request->limit = !empty($request->limit) ? $request->limit : $this->limit;
      $request->status = "รออนุมัติ";
      $data = $pm->lists( $request );
      return view('manageletter.manageletter')->with( ["data"=>$data, "limit"=>$request->limit ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = MM::findOrFail( $id );
    if( is_null($data) ){
      return back()->with('jsAlert', "ไม่พบข้อมูล");
    }
    return view('manageletter.forms.letteredit')->with( ['data'=>$data,'staff'=>SM::get()] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $validator = Validator::make( $request->all(), $this->cValidator, $this->cValidatorMsg);
    if( $validator->fails() ){
          return back()->withInput()->withErrors( $validator->errors() );
      }
      else{
    $data = MM::findOrFail( $id );
    if( is_null($data) ){
    return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
    }
    }
    $data->status = $request->status;
    $data->update();
    return redirect()->route('manageletter.index')->with('jsAlert', 'แก้ไขข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
