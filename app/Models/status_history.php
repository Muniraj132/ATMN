<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Session;

class status_history extends Model
{
    // Use of soft delete to delete record (record will not be shown in the web portal but still exists in table)
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'status_history';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id', 'user_id', 'status', 'date', 'created_at', 'updated_at', 'deleted_at'];
    
}