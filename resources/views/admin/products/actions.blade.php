<div class="flex items-center space-x-2">
    <x-wire-button href="{{ route('admin.products.edit', $product) }}" color="blue" size="sm">
        Editar
    </x-wire-button>

    <form action="{{ route('admin.products.destroy', $product) }}" 
     method="POST" class="delete-form"> {{-- paso variable product a la ruta destroy y se conecta al metodo destroy() del controlador mediante la ruta admin.products.destroy --}}
        @csrf   
        @method('DELETE') 
        <x-wire-button type="submit" color="red" size="sm"> 
            Eliminar 
        </x-wire-button>
    </form>
</div>