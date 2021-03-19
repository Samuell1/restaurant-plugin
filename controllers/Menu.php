<?php namespace Samuell\Restaurant\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Samuell\Restaurant\Models\Menu as MenuDB;

/**
 * Menu Back-end Controller
 */
class Menu extends Controller
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

        BackendMenu::setContext('Samuell.Restaurant', 'restaurant', 'menu');
    }
    public function onDelete() {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (!$object = MenuDB::find($objectId))
                    continue;
                $object->delete();
            }

        }
        return $this->listRefresh();
    }
}
