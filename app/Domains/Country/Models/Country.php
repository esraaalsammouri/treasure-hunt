<?php

namespace App\Domains\Country\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Country\Models\Traits\Attribute\CountryAttribute;
use App\Domains\Country\Models\Traits\Method\CountryMethod;
use App\Domains\Country\Models\Traits\Relationship\CountryRelationship;
use App\Domains\Country\Models\Traits\Scope\CountryScope;


/**
 * Class Country.
 */
class Country extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        CountryAttribute,
        CountryMethod,
        CountryRelationship,
        CountryScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'countries';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "code",        "icon",    ];

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