<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lettermodel AS LM; //เรียก positionmodel มาใช้ใน Controller นี้
use App\Models\staffmodel AS SM; //เรียก positionmodel มาใช้ใน Controller นี้
use App\Models\managelettermodel AS MM; //เรียก positionmodel มาใช้ใน Controller นี้
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use PDF;

class reportController extends Controller
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
       $request->status = "อนุมัติ";
      $data = $pm->lists( $request );
          return view('admin.report')->with( ["data"=>$data, "limit"=>$request->limit ]) ;
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
        abort(404);
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
    public function createPDF()

    {

        $data = ['title' => 'Welcome to HDTuto.com'];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->stream('report.pdf');

    }
}
