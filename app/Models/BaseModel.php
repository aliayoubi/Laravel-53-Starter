<?php
/**
 * Created by PhpStorm.
 * User: Sarfraz
 * Date: 11/20/2015
 * Time: 12:33 PM
 */

namespace App\Models;

use LaravelArdent\Ardent\Ardent;
use Propaganistas\LaravelFakeId\FakeIdTrait;
use Watson\Rememberable\Rememberable;

class BaseModel extends Ardent
{
    use Rememberable;       // for cache
    use FakeIdTrait;        // for hashed ids in urls for safety

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

        $this->purgeFilters[] = function ($key) {
            return !in_array($key, $this->purgeFields);
        };
    }
}