<?php
namespace App\Models;

use Carbon\Carbon;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use LaravelArdent\Ardent\Ardent;

class BaseModel extends Ardent
{
    use CascadeSoftDeletes;     // to be used along with LV's SoftDelete trait.

    // purgable fields
    public $purgeFields = [];

    // Auto Hydrate
    public $autoHydrateEntityFromInput = true; // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called (for updates)
    public $autoPurgeRedundantAttributes = true;

    // Auto hash passwords
    public static $passwordAttributes = ['password'];
    public $autoHashPasswordAttributes = true;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    ############################################################
    ### global dates format when showing up
    ############################################################
    public function getCreatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('d F, Y H:i');
    }

    public function getUpdateAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('d F, Y H:i');
    }

    public function getDeletedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('d F, Y H:i');
    }
    ############################################################
}