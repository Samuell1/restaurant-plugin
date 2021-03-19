<?php namespace Samuell\Restaurant\Components;

use Cms\Classes\ComponentBase;
use Samuell\Restaurant\Models\Offer;
use Samuell\Restaurant\Models\Meal;

class Offers extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Offers',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'orderBy' => [
                'title'       => 'Order By',
                'default'     => 'created_at',
            ],
            'sort' => [
                'title'       => 'Sort',
                'description' => 'Sort ASC or DESC',
                'default'     => 'asc',
                'type'        => 'dropdown',
                'options'     => ['desc' => 'Descending', 'asc' => 'Ascending']
            ],
            'limit' => [
                'title'       => 'Limit per page',
                'default'     => 12
            ],
        ];
    }
    public function init()
    {
        $this->loadMeals();
        $this->page['offers'] = $this->loadOffers();
    }

    public function onFilterMeals()
    {
        $this->loadMeals();
        return $this->refreshMeals();
    }

    public function refreshMeals()
    {
        return [
            '#meals' => $this->renderPartial('@meals')
        ];
    }

    public function loadOffers()
    {
        return Offer::all();
    }

    public function loadMeals()
    {
        // Filter by category slug
        $offersIds = post('offers');
        if ($offersIds) {
            $meals = Meal::enabled()->whereHas('offers', function($query) use ($offersIds) {
                $query->whereIn('id', $offersIds);
            });
        } else {
            $meals = Meal::enabled();
        }

        $this->page['meals'] = $meals->orderBy($this->property('orderBy'), $this->property('sort'))->limit($this->property('limit'))->get();
    }
}
