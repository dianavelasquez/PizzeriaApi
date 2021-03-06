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

            <b>
                <h2 class="text-center">Sucursales Activas</h2>
                <br>
            </b>

            <table class="table-fixed table-auto border-collapse w-full" border="1" rules="all">
                <thead>
                    <tr class="bg-gray-100">
                        <th>Nombre</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                    @if($branch->state == 1)
                        <tr>
                            <td class="text-center border px-4 py-2">{{ $branch->name }}</td>
                            <td class="text-center border px-4 py-2">{{ $branch->address }}</td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
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

    <div class="py-12">
        @php
            $users = \App\Models\User::all();

            $frecuentes=\DB::table('purchases as r')
            ->select('u.email',\DB::raw('count(r.user_id) AS veces'),\DB::raw('sum(r.total) AS total'))
            ->join('users as u','u.id','r.user_id')
            ->where('r.state',0)
            ->groupBy('r.user_id','u.email')
            ->orderBy('veces','DESC')
            ->get();
        @endphp
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <b>
                <h2 class="text-center">Clientes Frecuentes</h2>
                <br>
            </b>

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th>Correo electronico</th>
                        <th>Compras </th>
                        <th>Total </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($frecuentes as $user)
                        <tr>
                            <td class="text-center border px-4 py-2">{{ $user->email }}</td>
                            <td class="text-center border px-4 py-2">{{ $user->veces }}</td>
                            <td class="text-center border px-4 py-2">${{ $user->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</x-app-layout>
