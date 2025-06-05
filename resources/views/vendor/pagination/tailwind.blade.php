@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex justify-center items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed rounded-lg">
                        &laquo;
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-1 text-amber-600 hover:text-amber-800 rounded-lg transition duration-150"
                       rel="prev">
                        &laquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true">
                        <span class="px-3 py-1 text-gray-400">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span class="px-3 py-1 bg-amber-600 text-white rounded-lg">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1 text-amber-600 hover:text-amber-800 rounded-lg transition duration-150">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-1 text-amber-600 hover:text-amber-800 rounded-lg transition duration-150"
                       rel="next">
                        &raquo;
                    </a>
                </li>
            @else
                <li aria-disabled="true">
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed rounded-lg">
                        &raquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
