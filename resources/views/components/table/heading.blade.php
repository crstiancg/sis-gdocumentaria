@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge(['class' => 'px-6 py-3 bg-cool-gray-50'])->only('class') }}>

    @unless ($sortable)
        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            {{ $slot }}
        </span>
    @else
        <button {{ $attributes->except('class') }}
            class="flex items-center space-x-1 text-left text-xs leading-4 font-medium">
            <span>{{ $slot }}</span>

            <span>
                @if ($direction === 'ASC')
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"></path>
                    </svg>
                @elseif ($direction === 'DESC')
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                    </svg>
                @else
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5"></path>
                  </svg>
                @endif
            </span>
        </button>

        @endif
    </th>
