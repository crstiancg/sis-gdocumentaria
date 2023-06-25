<div>
    <h1 class="text-2xl font-semibold text-gray-900 text-center mb-8">
        LISTADO DE DOCUMENTOS
    </h1>

    <div class="py-4 space-y-4">
        <div class="w-1/4">
            <x-input.text id="asunto" wire:model="search" placeholder="Buscar Documento..."></x-input.text>
        </div>
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading>Asunto</x-table.heading>
                    <x-table.heading>Número</x-table.heading>
                    <x-table.heading>Administrado</x-table.heading>
                    <x-table.heading>Estado</x-table.heading>
                    <x-table.heading>Fecha de Ingreso</x-table.heading>
                </x-slot>
        
                <x-slot name="body">
                    @foreach ($documento as $item)
                    <x-table.row>
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
                    @endforeach
                </x-slot>
            </x-table>
            <div>
                {{ $documento->links() }}
            </div>
        </div>
    </div>
</div>

