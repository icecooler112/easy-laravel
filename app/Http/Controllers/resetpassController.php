<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\staffmodel AS SM; //เรียก staffmodel มาใช้ใน Controller นี้
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class resetpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboarduser');
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
        //
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
        //
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

    public function pass(){
      return view('user.forms.formeditpassword');
    }
    public function changePass(Request $request){
      if( Hash::check($request->old_password, Auth::user()->password) ){
        if( $request->new_password == $request->new_password2 ){
          //Change Pass
          $data = SM::find(Auth::user()->id);
          $data->password = Hash::make($request->new_password);
          $data->update();
           return redirect()->route('user.index')->with('jsAlert', 'แก้ไขข้อมูลสำเร็จ');
        }
        else{
          return redirect()->route('user.index')->with('jsAlert', 'error password not matching');
        }
      }
      else{
        return redirect()->route('user.index')->with('jsAlert', 'รหัสผ่านเดิมไม่ถูกต้อง กรุณาลองใหม่');
      }

    }
}
