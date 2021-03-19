<?php namespace Samuell\Restaurant\Models;

use Model;

/**
 * Offer Model
 */
class Offer extends Model
{
    use \October\Rain\Database\Traits\NestedTree;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'samuell_restaurant_offers';

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
    public $belongsToMany = [
        'meals' => [
            'Samuell\Restaurant\Models\Meal',
            'table'    => 'samuell_restaurant_offers_meals',
            'key'      => 'offer_id',
            'otherKey' => 'meal_id'
        ]
    ];
}
