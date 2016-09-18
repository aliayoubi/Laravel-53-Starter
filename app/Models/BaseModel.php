<?php
namespace App\Models;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Iatstuti\Database\Support\OwnsModels;
use LaravelArdent\Ardent\Ardent;
use Propaganistas\LaravelFakeId\FakeIdTrait;

class BaseModel extends Ardent
{
    use FakeIdTrait;            // for hashed ids in urls for safety
    use OwnsModels;             // to identify resource owner
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
}