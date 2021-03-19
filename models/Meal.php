<?php namespace Samuell\Restaurant\Models;

use Model;

/**
 * Meal Model
 */
class Meal extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'samuell_restaurant_meals';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'offers' => [
            'Samuell\Restaurant\Models\Offer',
            'table'    => 'samuell_restaurant_offers_meals',
            'key'      => 'meal_id',
            'otherKey' => 'offer_id'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [
        'images' => ['System\Models\File', 'delete' => true]
    ];

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }
}
