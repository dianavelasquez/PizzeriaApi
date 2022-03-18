<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @php
            $branches = \App\Models\Branch::all();
        @endphp
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            
            <table class="table-fixed w-full">
                <tbody>
                    
                </tbody>
            </table>

            <b>
                <h2 class="text-center">Sucursales</h2>
                <br>
            </b>

            <table class="table-fixed w-full">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                    </tr>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr>
                            <td>{{ $branch->id }}</td>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->address }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>

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
            <table class="table-fixed w-full">
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</x-app-layout>
