<?php

namespace App\Domains\Test1\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Test1\Models\Traits\Attribute\Test1Attribute;
use App\Domains\Test1\Models\Traits\Method\Test1Method;
use App\Domains\Test1\Models\Traits\Relationship\Test1Relationship;
use App\Domains\Test1\Models\Traits\Scope\Test1Scope;


/**
 * Class Test1.
 */
class Test1 extends Model
{
    use SoftDeletes,
        Test1Attribute,
        Test1Method,
        Test1Relationship,
        Test1Scope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'test1s';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "name",        "mobile",    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public $timestamps =["create_at","update_at"];

    /**
     * @var array
     */
    protected $dates = [
    "create_at",
    "update_at",
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

}