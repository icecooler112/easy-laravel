<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lettermodel AS LM; //เรียก lettermodel มาใช้ใน Controller นี้
use App\Models\staffmodel AS SM; //เรียก staffmodel มาใช้ใน Controller นี้
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;


class letterController extends Controller
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
    public function index(Request $request, LM $pm)
    {
      $request->limit = !empty($request->limit) ? $request->limit : $this->limit;

      $data = $pm->lists( $request );
      return view('user.dashboarduser')->with( ["data"=>$data, "limit"=>$request->limit ] );

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

      $validator = Validator::make( $request->all(), $this->cValidator, $this->cValidatorMsg);
         if( $validator->fails() ){
             return back()->withInput()->withErrors( $validator->errors() );
           }
           else{
           $data = new LM;
           $data->fill([
             "user_id" =>$request->user_id,
             "title_name" =>$request->title_name,
             "etc" => $request->etc,
             "detail" =>$request->detail,
             "date" =>$request->date,
             "date_to"=>$request->date_to,
             "all_time" =>$request->all_time,
             "phone" =>$request->phone,
             "status"=>'รออนุมัติ',
           ]);
           if($data->save()){
             if($request->has('image') ){
               $data->image = $request->file('image')->store('photosletter','public');
               $data->update();
             }
           }
           return redirect()->route('letter.index')->with('jsAlert', 'เพิ่มข้อมูลสำเร็จ');
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
