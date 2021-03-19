<?php namespace Samuell\Restaurant\Components;

use Validator;
use Input;

use Cms\Classes\ComponentBase;
use Samuell\Restaurant\Models\Review;

class Reviews extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Reviews',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $this->page['reviews'] = Review::where("is_active",1)->limit(6)->get();
    }

    public function onAddReview()
    {

      $messages = [
               'required' => ':attribute pole je vyžadované.',
               'name.required' => 'Názov je vyžadovaný.',
               'min' => 'Minimálna hodnota pola :attribute je 3 znakov.',
               'max' => 'Maximálna hodnota pola :attribute je 150 znakov.',
               'numeric' => 'Pole :attribute zadajte numericky.',
               ];
       $rules = [
                "name" => "required|min:3",
                "review" => "required|min:10|max:300",
                "gdpr" => "accepted",
                // "rate" => "required",
               ];

       $validator = Validator::make(Input::all(), $rules, $messages);
       $messages = $validator->messages();

       if ($validator->fails()) {
           $this->page['result'] = [
               "success" => 0,
               "message" => $messages->first()
               ];
       }else{

           $review = new Review;
           $review->name = post("name");
           // $review->rate = post("rate");
           $review->review = post("review");
           $review->save();

           $this->page['result'] = [
               "success" => 1,
               "message" => "Your review has been successfully added."
               ];

       }

    }
}
