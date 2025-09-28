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

    
</x-admin-layout>