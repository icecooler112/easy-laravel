<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class lettermodel extends Model
{
  protected $table = "letter";
protected $fillable = [ "user_id","title_name","etc", "detail", "date", "date_to", "all_time","phone", "status" ];
public $primarykey = "id";

public function lists($request){
      $query = DB::table( $this->table )
        ->select("{$this->table}.*","users.name_title","users.name", "users.lastname", "department.name_department AS department_name",
        "position.name_position as position_name","letter.title_name")
        ->leftjoin('users', $this->table.'.user_id', '=', 'users.id')
        ->leftjoin('department', "users.department", "=", "department.id")
        ->leftjoin('position', "users.position", "=", "position.id")
        ->where('user_id',auth::user()->id);

        return $query->paginate();
}

}
