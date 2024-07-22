<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Menu;
use MoonShine\Fields\ID;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;

use MoonShine\Fields\Image;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Menu>
 */
class MenuResource extends ModelResource
{
    protected string $model = Menu::class;

    protected string $title = 'Меню';

    public function getActiveActions(): array
    {
        return ['create', 'view', 'update', 'delete'];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable()->hideOnIndex(),

                Flex::make([
                    Text::make('Наименование', 'name')
                        ->reactive(),

                    Slug::make('ЧПУ', 'slug')
                        ->from('name')
                        ->live()
                ]),

                Image::make('Превью', 'preview')
                    ->dir('menus')
                    ->allowedExtensions(['jpg', 'jpeg', 'png', 'gif', 'webp'])
                    ->enableDeleteDir()
                    ->removable()
                    ->nullable()
                    ->itemAttributes(fn() => [
                        'style' => 'width: 50px; height: auto;'
                    ]),

                Switcher::make('Активен', 'active'),
            ]),
        ];
    }

    /**
     * @param Menu $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
