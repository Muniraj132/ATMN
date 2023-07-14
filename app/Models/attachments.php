<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'attachments_status';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id', 'user_id', 'self_assessment', 'self_assessment_status', 'application_part_I', 'app_part1_status', 'application_part_II', 'app_part2_status', 'background_check', 'bk_check_status', 'resume', 'resume_status','created_at','updated_at','deleted_at'];
}
