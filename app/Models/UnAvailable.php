<?php
/**
 * PHP version 7.2.5 and Laravel version 5.6.22
 * Country Model Class
 * Provides functionality for maintainining the Country detail for Backend
 *
 * @Package             Model
 * @Author              mcgdev3
 * @Created On          28-01-2022
 * @Modified            Cyril P
 * @Modified On         07-06-2018
 * @Reviewed            Immanual Kumar 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

class UnAvailable extends Model
{
    // Use of soft delete to delete record (record will not be shown in the web portal but still exists in table)
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'unavailable_dates';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id','user_id','start_date','end_date','type','church','reason', 'created_at', 'updated_at', 'deleted_at'];
    
}