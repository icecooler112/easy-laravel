<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class positionmodel extends Model
{
  protected $table = "position";
protected $fillable = [ "name_position"];
public $primarykey = "id";

public function lists($request){
  $query = DB::table( $this->table );
  if( !empty($request->search) ){
    $query->where('name_position','LIKE', "%{$request->search}%");
  }
  return $query->paginate( $request->limit );
}
}
