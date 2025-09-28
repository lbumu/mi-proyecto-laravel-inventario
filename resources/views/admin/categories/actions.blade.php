<div class="flex items-center space-x-2">
    <x-wire-button href="{{ route('admin.categories.edit', $category) }}" color="blue" size="sm">
        Editar
    </x-wire-button>

    <form action="{{ route('admin.categories.destroy', $category) }}"
     method="POST"> {{-- paso variable category a la ruta destroy --}}
        @csrf   
        @method('DELETE') 
        <x-wire-button type="submit" color="red" size="sm"> 
            Eliminar 
        </x-wire-button>
    </form>
</div>