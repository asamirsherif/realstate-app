<?php

namespace App\Orchid\Resources\Property;

use Orchid\Screen\TD;
use Orchid\Screen\Sight;
use Orchid\Crud\Resource;
use Orchid\Screen\Layout;
use Orchid\Screen\Fields\Map;
use App\Models\Station\Station;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Crud\ResourceRequest;
use Orchid\Support\Facades\Toast;
use App\Models\RealState\Property;
use Orchid\Screen\Fields\Relation;
use Illuminate\Database\Eloquent\Model;
use App\Services\Station\StationService;

class PropertyResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Property::class;

    public function __construct(private Property $propertyService)
    {
    }


    /**
     * Get the resource should be displayed in the navigation
     *
     * @return bool
     */
    public static function displayInNavigation(): bool
    {
        return false;
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return array
     */
    public function columns(): array
    {
        return [
            TD::make('title', __('Title')),

            TD::make('place','Location')
            ->render(function ($model){
                return '<a  style="color:blue;"
                            target="_blank"
                            href="https://maps.google.com/?q='. $model->latitude . ',' . $model->longitude . '"> '.
                             $model->latitude . ',' . $model->longitude.
                             '</a> ';
            }),

            TD::make('price', __('Price'))
            ->render(function ($model) {
                return number_format($model->price) ?? '  N/A  ';
            }),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [

        ];
    }

    /**
     * Get the legend text for the resource.
     *
     * @return string
     */
    public function legend(): array
    {
        return [
            Sight::make('id', "ID"),

            Sight::make('title', __('Title')),

        ];
    }


    /**
     * Perform any actions before storing the resource.
     *
     * @param Station $station
     */
    public function beforeStore(Station $station)
    {

    }



    /**
     * Action to delete a model
     *
     * @param Model $model
     *
     * @throws Exception
     */
    public function onDelete(Model $model)
    {
        $model->delete();
    }

    /**
     * Perform any actions after deleting the resource.
     *
     * @param Station $station
     */
    public function afterDelete(Station $station)
    {
        Toast::info('Property deleted!');
    }


}
