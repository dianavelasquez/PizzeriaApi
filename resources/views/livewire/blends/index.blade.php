<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Combinaciones') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="my-4 inline-flex justify-center w-1/4 rounded-md border border-transparent px-4 py-2 bg-indigo-500 text-base font-bold text-white shadow-sm hover:bg-indigo-600">
                Nueva Combinación
            </button>
            @if($isModalOpen)
            @include('livewire.blends.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Tamaño</th>
                        <th class="px-4 py-2">Ingredientes</th>
                        <th class="px-4 py-2">Existencias</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blends as $blend)
                    <tr>
                        <td class="border px-4 py-2">{{ $blend->id }}</td>
                        <td class="border px-4 py-2">{{ $blend->name }}</td>
                        <td class="border px-4 py-2">$ {{ $blend->price }}</td>
                        <td class="border px-4 py-2">{{ $blend->getSize($blend->id) }}</td>
                        <td class="border px-4 py-2">
                            @foreach($blend->ingredients as $ingredient)
                                <li>{{ $ingredient->ingredient->name }}</li>
                            @endforeach
                        </td>
                        <td class="border px-4 py-2">{{ $blend->stock }}</td>
                        <td class="border px-4 py-2">{{ $blend->state == 1 ? 'Activo':'Inactivo'}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="delete({{ $blend->id }})"
                                class="flex px-4 py-2 rounded-md bg-red-500 text-white-600 cursor-pointer">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
