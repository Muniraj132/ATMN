<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class applicationcomments extends Model
{
    use HasFactory;
    use SoftDeletes;
    
       /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'applicationcomments';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id','pastor_id','submitted_by','comment','created_at','updated_at','deleted_at'];
}
