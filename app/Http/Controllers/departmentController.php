<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departmentmodel AS DM; //เรียก positionmodel มาใช้ใน Controller นี้
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class departmentController extends Controller
{
  protected $cValidator = [
    'name_department' => 'required|min:2|max:255'
  ];

  protected $cValidatorMsg = [
    'name_department.required' => 'กรุณากรอกชื่อตำแหน่งงาน',
    'name_department.min' => 'ชื่อตำแหน่งงานต้องมีอย่างน้อย 2 ตัวอักษร',
    'name_department.max' => 'ชื่อตำแหน่งงานต้องมีไม่เกิน 255 ตัวอักษร'
    ];

    private $limit = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DM $pm)
    {
      $request->limit = !empty($request->limit) ? $request->limit : $this->limit;
      $data = $pm->lists( $request );
        return view('department.department')->with( 'data',$data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('department.forms.formdepartment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make( $request->all(), $this->cValidator, $this->cValidatorMsg);
    if( $validator->fails() ){
        return back()->withInput()->withErrors( $validator->errors() );
      }
      else{
    $data = new DM;
   $data->name_department = $request->name_department;
   $data->save();

}
   return redirect()->route('department.index')->with('jsAlert', 'เพิ่มข้อมูลสำเร็จ');
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
      $data = DM::findOrFail( $id );
    if( is_null($data) ){
      return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
    }
    return view('department.forms.formdepartment')->with( 'data',$data);
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
    $data = DM::findOrFail( $id );
 if( is_null($data) ){
   return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
 }
}
 $data->name_department = $request->name_department;
 $data->update();
 return redirect()->route('department.index')->with('jsAlert', 'แก้ไขข้อมูลสำเร็จ');
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
    public function delete($id){
     $data = DM::findOrFail($id);
     if(is_null($data) ){
       return back()->with('jsAlert', "ไม่พบข้อมูล");
     }
     $data->delete();
     return back()->with('jsAlert', "ลบข้อมูลสำเร็จ");
   }
}
