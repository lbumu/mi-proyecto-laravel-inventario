<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductTable extends DataTableComponent
{
    // protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),
            Column::make("Categoria", "category.name")
                ->searchable() // accede a la relacion category y muestra el nombre de la categoria.
                ->sortable(),
            Column::make("Precio", "price")
                ->sortable(),
            Column::make("Acciones")
                ->label(function($row) {// para cada fila, genera contenido dinamico usado una vista blade.
                    return view('admin.products.actions', ['product' => $row]);// pasa la fila actual como 'category' a la vista.
                }
                    
                ),
        ];
    }

    public function builder(): Builder
    {
        return Product::query()->with(['category']); // carga la relacion category para evitar consultas adicionales.
    }
}
