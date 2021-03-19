<?php namespace Samuell\Restaurant\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Meal Back-end Controller
 */
class Meal extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Samuell.Restaurant', 'restaurant', 'meal');
    }
}
