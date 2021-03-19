<?php namespace Samuell\Restaurant\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Samuell\Restaurant\Models\Review;

/**
 * Reviews Back-end Controller
 */
class Reviews extends Controller
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

        BackendMenu::setContext('Samuell.Restaurant', 'restaurant', 'reviews');
    }
    public function onDelete() {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (!$object = Review::find($objectId))
                    continue;
                $object->delete();
            }

        }
        return $this->listRefresh();
    }
}
