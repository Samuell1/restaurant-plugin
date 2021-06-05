<?php namespace Samuell\Restaurant\Models;

use Model;

/**
 * Review Model
 */
class Review extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'samuell_restaurant_reviews';

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
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
