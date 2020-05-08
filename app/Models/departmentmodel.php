<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class departmentmodel extends Model
{
  protected $table = "department";
protected $fillable = [ "name_department"];
public $primarykey = "id";

public function lists($request){
  $query = DB::table( $this->table );
  if( !empty($request->search) ){
    $query->where('name_department','LIKE', "%{$request->search}%");
  }
  return $query->paginate( $request->limit );
}
}
