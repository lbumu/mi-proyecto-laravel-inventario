<x-admin-layout 
title="Productos | Codersfree"
:breadcrumbs="[
    ['name' => 'Dashboard', 
    'href' => route('admin.dashboard'),
    ],
    ['name' => 'Productos',
    'href' => route('admin.products.index'),
    ],
    ['name' => 'Editar'],
    ]">

    <x-wire-card>

         <form action="{{ route('admin.products.update',$product) }}" method="POST" class="space-y-4">
            
         @csrf
            @method('PUT')

            <x-wire-input label="Nombre" name="name" placeholder="Nombre del producto" value="{{old('name', $product->name)}}" />
            <x-wire-textarea label="Descripcion" name="description" placeholder="Descripcion del producto" value="{{old('description', $product->description)}}" />
            <x-wire-input type="number" label="Precio" name="price" placeholder="Precio del producto" value="{{old('price', $product->price)}}" />
             
            <x-wire-native-select label="Categoria" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                        {{ $category->name }}</option>
                @endforeach
            </x-wire-native-select>

            <div class="flex justify-end">
                <x-button>
                    Actualizar
                </x-button>
            </div>

         </form>


    </x-wire-card>

   

    
</x-admin-layout>