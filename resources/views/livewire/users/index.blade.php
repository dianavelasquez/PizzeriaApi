<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Clientes') }}
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
                Nuevo cliente
            </button>
            @if($isModalOpen)
            @include('livewire.users.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Nombre completo</th>
                        <th class="px-4 py-2">Correo electrónico</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email}}</td>
                        <td class="border px-4 py-2">{{ $user->state == 1 ? 'Activo':'Inactivo'}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $user->id }})"
                                class="flex px-4 py-2 rounded-md bg-yellow-500 text-gray-900 cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $user->id }})"
                                class="flex px-4 py-2 rounded-md bg-red-500 text-white-600 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
