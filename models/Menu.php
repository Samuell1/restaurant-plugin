<?php namespace Samuell\Restaurant\Models;

use Model;

/**
 * Menu Model
 */
class Menu extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'samuell_restaurant_menus';

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
    public $jsonable = ["menu"];

    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getDayAttribute (){
      $day = [1 => "Pondelok",2 => "Utorok",3 => "Streda",4 => "Štvrtok",5 => "Piatok",6 => "Sobota",7 => "Nedeľa"];
      return date("j. n. Y", strtotime($this->date))." - ".$day[date("N", strtotime($this->date))];
    }

}
