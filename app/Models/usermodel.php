<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
  <?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;
  use DB;


  class staffmodel extends Model
  {
    protected $table = "users";
  protected $fillable = [ "name_title" , "name", "lastname", "email", "password","position", "department", "type"];
  protected $hidden = [ 'password', 'remember_token',];
  public $primarykey = "id";

  public function lists($request){
        $query = DB::table( $this->table )
          ->select("{$this->table}.*", "department.name_department AS department_name","position.name_position as position_name")
          ->leftjoin('department', "{$this->table}.department", "=", "department.id")
          ->leftjoin('position', "{$this->table}.position", "=", "position.id");

          if( !empty($request->search) ){
          $query->where(function($q) use ($request){
          $q->where('position','LIKE', "%{$request->search}%");
          $q->orwhere('department','LIKE', "%{$request->search}%");
        });
      }
        if( !empty($request->position) ){
          $query->where("{$this->table}.position", '=', $request->position);
        }
        if( !empty($request->department) ){
          $query->where("{$this->table}.department", '=', $request->department);
        }
        if( is_numeric($request->type) ) {
          $query->where("{$this->table}.type", '=', $request->type);
        }
        return $query->paginate( $request->limit );
      }
  }

}
