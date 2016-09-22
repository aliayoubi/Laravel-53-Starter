<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Malhal\CreatedBy\CreatedBy;

class Task extends BaseModel
{
    // allows soft deletes in cascade
    use SoftDeletes;
    // for automatically populating "created_by_id" and "updated_by_id" fields.
    use CreatedBy;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'description',
        'completed',
    ];

    /**
     * The validation rules.
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
    ];

    /**
     * The model relationships.
     *
     * @var array
     */
    public static $relationsData = array(
        'user' => array(self::BELONGS_TO, User::class),
    );
}
