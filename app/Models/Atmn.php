<?php
/**
 * PHP version 7.2.5 and Laravel version 5.6.22
 * Country Model Class
 * Provides functionality for maintainining the Country detail for Backend
 *
 * @Package             Model
 * @Author              Yesuraj J
 * @Created On          28-01-2022
 * @Modified            Cyril P
 * @Modified On         07-06-2018
 * @Reviewed            Immanual Kumar 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

class Atmn extends Model
{
    // Use of soft delete to delete record (record will not be shown in the web portal but still exists in table)
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'atmn_recruitment';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id','mainkey','b_id','user_id','district_id','last_name','first_name','title','status','submit_status','app_sent','app_received','atmn_certified','license','home_address','email','send_email','home_phone','cell_phone','office_phone','training','interim_pastor_ministries','vital_church_ministries','church_serving','affiliation','district_issuing','peacemaking','ministry_area','language','comments','latitude','longitude','willing_commute','onsite_arrangement','comfortable_serving_church','prefer_serve_church','prefer_serve_district','fields_1','agree','approved_by','approved_date', 'created_at', 'updated_at', 'deleted_at'];
    
}