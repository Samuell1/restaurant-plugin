<?php namespace Samuell\Restaurant;

use Backend;
use System\Classes\PluginBase;

/**
 * Restaurant Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Restaurant',
            'description' => 'Restaurant plugin for menu and reviews',
            'author'      => 'Samuell',
            'icon'        => 'icon-cutlery'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Samuell\Restaurant\Components\Menu' => 'menu',
            'Samuell\Restaurant\Components\Reviews' => 'reviews',
            'Samuell\Restaurant\Components\Offers' => 'offers'
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'samuell.restaurant.restaurant' => [
                'tab' => 'Restaurant',
                'label' => 'Restaurant permission'
            ],
            'samuell.restaurant.menu' => [
                'tab' => 'Menu',
                'label' => 'Menu permission'
            ],
            'samuell.restaurant.reviews' => [
                'tab' => 'Reviews',
                'label' => 'Reviews permission'
            ],
            'samuell.restaurant.offers' => [
                'tab' => 'Offers',
                'label' => 'Offers permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'restaurant' => [
                'label'       => 'Reštaurácia',
                'url'         => Backend::url('samuell/restaurant/menu'),
                'icon'        => 'icon-cutlery',
                'permissions' => ['samuell.restaurant.*'],
                'order'       => 500,
                'sideMenu' => [
                    // 'menu' => [
                    //     'label'       => 'Denné menu',
                    //     'icon'        => 'icon-cutlery',
                    //     'url'         => Backend::url('samuell/restaurant/menu'),
                    //     'permissions' => ['samuell.restaurant.menu']
                    // ],
                    'offers' => [
                        'label'       => 'Jedálny lístok',
                        'icon'        => 'icon-database',
                        'url'         => Backend::url('samuell/restaurant/offers'),
                        'permissions' => ['samuell.restaurant.offers']
                    ],
                    'meals' => [
                        'label'       => 'Jedlá',
                        'icon'        => 'icon-database',
                        'url'         => Backend::url('samuell/restaurant/meal'),
                        'permissions' => ['samuell.restaurant.meal']
                    ],
                    'reviews' => [
                        'label'       => 'Recenzie',
                        'icon'        => 'icon-comments-o',
                        'url'         => Backend::url('samuell/restaurant/reviews'),
                        'permissions' => ['samuell.restaurant.reviews']
                    ]
                ]
            ],
        ];
    }

}
