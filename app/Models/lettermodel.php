<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lettermodel extends Model
{
  protected $table = "letter";
protected $fillable = [ "user_id","title_name","etc", "detail", "date", "date_to", "all_time","phone", "status" ];
public $primarykey = "id";

public function lists($request){
      $query = DB::table( $this->table )
        ->select("{$this->table}.*","users.id AS user_id","users.name AS username","", "department.name_department AS department_name","position.name_position as position_name")
        ->leftjoin('department', "{$this->table}.department", "=", "department.id")
        ->leftjoin('position', "{$this->table}.position", "=", "position.id")
        ->leftjoin('letter',"letter.id","=","users.id")
        ->where('users.id',auth::user()->id);


}

}
