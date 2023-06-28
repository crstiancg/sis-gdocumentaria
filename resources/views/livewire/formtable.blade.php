<div>
    <h1 class="text-2xl font-semibold text-gray-900 text-center mb-8">
        LISTADO DE DOCUMENTOS
    </h1>

    <div class="py-4 space-y-4">
        <div class="w-1/4">
            <x-input.text id="asunto" wire:model="search" placeholder="Buscar Documento..."></x-input.text>
        </div>
            {{-- <button wire:click="revision('Revision')" class="inline-flex items-center mr-4 px-4 py-2 leading-5 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Revisión</button>
            <button wire:click="aceptado('Aceptado')" class="inline-flex items-center mr-4 px-4 py-2 leading-5 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Aceptado</button>
            <button wire:click="noaceptado('No Aceptado')" class="inline-flex items-center px-4 py-2 leading-5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">No Aceptado</button> --}}
        @if ($this->search != null)
            <div class="flex-col space-y-4">
                {{-- <div x-data="{ open: false }">
                    <div x-show="open"> --}}
                        <x-table>
                            <x-slot name="head">
                                <x-table.heading sortable>Asunto</x-table.heading>
                                <x-table.heading sortable>Número</x-table.heading>
                                <x-table.heading sortable>Administrado</x-table.heading>
                                <x-table.heading sortable>Estado</x-table.heading>
                                <x-table.heading sortable>Fecha de Ingreso</x-table.heading>
                            </x-slot>
                    
                            <x-slot name="body">
                                @forelse ($noaceptado as $item)
                                <x-table.row wire:loading.class.delay='opacity-50'>
                                    <x-table.cell>
                                        <span class="inline-flex space-x-2 truncate text-sm leading-5">
                                            <p class="text-cool-gray-600 truncate">
                                                {{ $item->asunto }}
                                            </p>
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell>{{ $item->numero }}</x-table.cell>
                                    <x-table.cell>
                                        {{ $item->remitente->nombre }} 
                                        {{ $item->remitente->paterno }}
                                        {{ $item->remitente->materno }}
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium  leading-5 bg-{{ $item->status_color }}-100 text-{{ $item->status_color }}-800 capitalize">
                                            {{ $item->estado }}
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell>{{ $item->fingreso->toDayDateTimeString() }}</x-table.cell>
                                </x-table.row>
                                @empty
                                <x-table.row>
                                    <x-table.cell colspan="6">
                                        <div class="flex justify-center items-center">
                                        <span class="font-medium py-8 text-gray-400 text-xl">
                                            No se encontro ningún documento registrado...
                                        </span>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                                @endforelse
                            </x-slot>
                        </x-table>
                    {{-- </div>
                </div> --}}
                {{-- <div>
                    {{ $noaceptado->links() }}
                </div> --}}
            </div>
        @endif
    </div>
</div>

