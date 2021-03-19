<?php namespace Samuell\Restaurant\Components;

use Cms\Classes\ComponentBase;

use Carbon\Carbon;
use Samuell\Restaurant\Models\Menu as MenuDB;

class Menu extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Menu',
            'description' => 'Show menu, week or day'
        ];
    }

    public function defineProperties()
    {
        return [
          'today' => [
               'title'             => 'Today',
               'default'           => 0,
          ]
        ];
    }
    public function onRun()
    {

      $startofweek = $this->page['startofweek'] = Carbon::now()->startOfWeek();
      $endofweek = $this->page['endofweek'] = Carbon::now()->endOfWeek();

      if($this->property("today")){
        $this->page['menu'] = MenuDB::whereRaw('date(date) = ?', [Carbon::today()])->first();
      } else {
        $this->page['menu'] = MenuDB::whereBetween('date', [$startofweek, $endofweek])->orderBy("date")->get();
      }
    }
}
