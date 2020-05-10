<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\positionmodel AS PM; //เรียก positionmodel มาใช้ใน Controller นี้
use App\Models\departmentmodel AS DM; //เรียก department มาใช้ใน Controller นี้
use App\Models\staffmodel AS SM; //เรียก staffmodel มาใช้ใน Controller นี้
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class staffController extends Controller
{
  protected $cValidator = [

  ];

  protected $cValidatorMsg = [

  ];
  private $limit = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, SM $pm)
    {
      $request->limit = !empty($request->limit) ? $request->limit : $this->limit;
      $request->type = 0;
      $data = $pm->lists( $request );

        return view('staff.staff')->with( ["data"=>$data, "limit"=>$request->limit, 'department'=>DM::get(), 'position'=>PM::get()  ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.forms.formstaff')->with(['department'=>DM::get() ,'position'=>PM::get() ]);
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
       $data = new SM;
       $data->fill([
         "name_title" =>$request->name_title,
         "name" =>$request->name,
         "lastname" =>$request->lastname,
         "email" =>$request->email,
         "password" => Hash::make($request->password),
         "lastname" =>$request->lastname,
         "position" =>$request->position,
         "department"=>$request->department,
         "type"=>0,
       ]);
       if($data->save()){
         if($request->has('img') ){
            $data->img = $request->file('img')->store('photos','public');
            $data->update();
         }
       }
       return redirect()->route('staff.index')->with('jsAlert', 'เพิ่มข้อมูลสำเร็จ');
     }
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
      $data = SM::findOrFail( $id );
    if( is_null($data) ){
      return back()->with('jsAlert', "ไม่พบข้อมูล");
    }
    return view('staff.forms.formstaff')->with( ['data'=>$data, 'department'=>DM::get(), 'position'=>PM::get()  ] );
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
           $data = SM::findOrFail( $id );
           if( is_null($data) ){
             return back()->with('jsAlert', "ไม่พบข้อมูล");
                 }
                 $data->fill([
                   "name_title" =>$request->name_title,
                   "name" =>$request->name,
                   "lastname" =>$request->lastname,
                   "email" =>$request->email,
                   "password" => Hash::make($request->password),
                   "lastname" =>$request->lastname,
                   "position" =>$request->position,
                   "department"=>$request->department,
                   "type"=>0,
                 ]);
                if( $data->update()) {
                 if( $request->has('img') ){

                   if( !empty($data->img) ){
                     storage::disk('public')->delete( $data->img );
                   }
                   $data->img = $request->file('img')->store('photos','public');
                   $data->update();
                 }
               }
                   return redirect()->route('staff.index')->with('jsAlert', 'แก้ไขข้อมูลสำเร็จ');

             }
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
        $data = SM::findOrFail($id);
        if(is_null($data) ){
          return back()->with('jsAlert', "ไม่พบข้อมูล");
        }
        if( !empty($data->img) ){
          storage::disk('public')->delete( $data->img );
        }
        $data->delete();
        return back()->with('jsAlert', "ลบข้อมูลสำเร็จ");
      }
}
