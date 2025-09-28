<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Acciones")
                ->label(function($row) {// para cada fila, genera contenido dinamico usado una vista blade.
                    return view('admin.categories.actions', ['category' => $row]);// pasa la fila actual como 'category' a la vista.
                }
                    
                ),
        ];
    }
}
