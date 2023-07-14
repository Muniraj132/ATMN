<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comfortable_serving_church extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'comfortable_serving_church';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id','name'];
}
