<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Sucursales') }}
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
                Nueva Sucursal
            </button>
            @if($isModalOpen)
            @include('livewire.branches.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Dirección</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                    <tr>
                        <td class="border px-4 py-2">{{ $branch->id }}</td>
                        <td class="border px-4 py-2">{{ $branch->name }}</td>
                        <td class="border px-4 py-2">{{ $branch->address }}</td>
                        <td class="border px-4 py-2">{{ $branch->state == 1 ? 'Activo':'Inactivo'}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $branch->id }})"
                                class="flex px-4 py-2 rounded-md bg-yellow-500 text-gray-900 cursor-pointer">Editar</button>
                            <button wire:click="delete({{ $branch->id }})"
                                class="flex px-4 py-2 rounded-md bg-red-500 text-white-600 cursor-pointer">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
