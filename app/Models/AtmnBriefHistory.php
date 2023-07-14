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

class AtmnBriefHistory extends Model
{
    // Use of soft delete to delete record (record will not be shown in the web portal but still exists in table)
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
     
    protected $table = 'atmn_brief_history';
    
     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
     
    protected $fillable = ['id','mainkey','d_id','user_id','brief_status','church_name','personal_wellbeing_are_you_exited','overview_church_health_prayer_attention','specific_concern_restoring_hope','specific_concern_developing_culture_of_prayer','specific_concern_rebuilding_mission','specific_concern_recruit_lay_leaders','specific_concern_reset_governance','specific_concern_resolve_conflict','other_objectives_outline','greatest_priority_for_next_month','mou_with_church','approver_id','ds_comments','ds_approved_date','created_at','updated_at','deleted_at'];
    
}