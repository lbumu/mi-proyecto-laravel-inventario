<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 
    'href' => route('admin.dashboard'),
    ],
    ['name' => 'Pruebas'],
    ]">

    <x-slot name="action">
        Hola Mundo 
    </x-slot>

    Hola desde el admin 
</x-admin-layout>