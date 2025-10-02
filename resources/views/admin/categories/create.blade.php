<x-admin-layout 
title="Categoría | Codersfree"
:breadcrumbs="[
    ['name' => 'Dashboard', 
    'href' => route('admin.dashboard'),
    ],
    ['name' => 'Categorías',
    'href' => route('admin.categories.index'),
    ],
    ['name' => 'Nueva Categoría'],
    ]">

    <x-wire-card>

         <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            
         @csrf

            <x-wire-input label="Nombre" name="name" placeholder="Nombre de la categoria" value="{{old('name')}}" />
            <x-wire-textarea label="Descripcion" name="description" placeholder="Descripcion de la categoria" value="{{old('description')}}" />

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>

         </form>


    </x-wire-card>
   

    
</x-admin-layout>