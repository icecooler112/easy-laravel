<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lettermodel AS LM; //เรียก positionmodel มาใช้ใน Controller นี้
use App\Models\staffmodel AS SM; //เรียก positionmodel มาใช้ใน Controller นี้
use Auth;
class letterController extends Controller
{
  protected $cValidator = [

  ];

  protected $cValidatorMsg = [

  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, LM $pm)
    {
      $request->limit = !empty($request->limit) ? $request->limit : $this->limit;

      $data = $pm->lists( $request );

        return view('user.dashboarduser')->with( ["data"=>$data, "limit"=>$request->limit, 'department'=>DM::get(), 'position'=>PM::get(), 'letters'=>LM::get() ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = SM::findOrFail( Auth::user()->id );
      if( is_null($data) ){
        return 'error';
      }
      return view('user.forms.formletter')->with(['data'=>$data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
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
  }
