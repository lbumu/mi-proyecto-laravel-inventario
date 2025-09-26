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

@livewire('admin.datatables.category-table')

    
</x-admin-layout>