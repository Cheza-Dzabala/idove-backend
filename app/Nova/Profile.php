<?php

namespace App\Nova;

use App\Nova\Metrics\ProfileCount;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Place;

class Profile extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Profile::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'summary';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'summary', 'area_of_expertise', 'year_joined', 'physical_address', 'nationality'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable()->hideFromIndex(),

            BelongsTo::make('User', 'user', User::class),
            Select::make('Area of Expertise')->options([
                'PM' => 'Policy Maker',
                'CW' => 'Community Worker',
                'AR' => 'Academic / Researcher',
                'CR' => 'Creatives',
            ])->displayUsingLabels()->required(),
            Country::make('Country of Residence', 'country_of_residence')->required(),
            Country::make('Nationality', 'nationality')->required(),
            Number::make('Year Joined', 'year_joined')->required(),
            Trix::make('Physical Address', 'physical_address')->required()->hideFromIndex(),
            Trix::make('Summary')->required()->hideFromIndex(),
            Trix::make('Hobbies')->hideFromIndex(),
            Trix::make('Fun Facts', 'fun_facts')->hideFromIndex(),
            Text::make('Twitter Handle', 'twitter')->hideFromIndex(),
            Text::make('Facebook Page', 'facebook')->hideFromIndex(),
            Text::make('LinkedIn', 'linked_in')->hideFromIndex(),
            Text::make('Instagram', 'instagram')->hideFromIndex(),
        ];
    }
    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new ProfileCount
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
