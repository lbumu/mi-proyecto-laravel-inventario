<x-admin-layout 
title="Categoría | Codersfree"
:breadcrumbs="[
    [
    'name' => 'Dashboard', 
    'href' => route('admin.dashboard'),
    ],

    [
        'name' => 'Categorías',
    ]
    ]">

    <x-slot name="action">
        <x-wire-button href="{{ route('admin.categories.create') }}">
            Nuevo
        </x-wire-button>

@livewire('admin.datatables.category-table')

@push('js')
    <script>
        forms = document.querySelectorAll('.delete-form');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                 title: "Estas seguro?",
                 text: "No podrás revertir esto!",
                 icon: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#3085d6",
                 cancelButtonColor: "#d33",
                 confirmButtonText: "Si, eliminar!",
                 cancelButtonText: "Cancelar"
                 }).then((result) => {
               if (result.isConfirmed) {
                form.submit();
             });
    }
  });
            })
        });
    </script>
@endpush

    
</x-admin-layout>