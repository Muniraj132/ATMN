<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

class PastorAssign extends Model
{
    // Use of soft delete to delete record (record will not be shown in the web portal but still exists in table)
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'pastor_assign';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id','pastor_id','assign_start_date','assign_end_date','church_name','assigned_at','assigned_by','status','created_at','updated_at','deleted_at'];
     
}