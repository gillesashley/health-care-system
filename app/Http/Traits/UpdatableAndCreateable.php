<?php

namespace App\Http\Traits;

trait UpdatableAndCreateable
{
    /* 
        This trait will insert the user that is loggedin
        and assign a new data inside the database
        The id of the user will be created from this trait
    */

    public static function bootCreateable($model)
    {
        // if user is logged in
        if (auth()->check()) {

            // Creating function
            static::creating(function ($model) {
                $model->created_by_id = auth()->user()->id;
            });

            // Updating function
            static::updating(function ($model) {
                $model->updated_by_id = auth()->user()->id;
            });
        }
    }
}
