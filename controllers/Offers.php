<?php namespace Samuell\Restaurant\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Offers Back-end Controller
 */
class Offers extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Samuell.Restaurant', 'restaurant', 'offers');
    }
}
