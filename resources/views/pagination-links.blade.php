<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                        Prev
                    </span>
                @else
                    @if (method_exists($paginator, 'getCursorName'))
                        <button dusk="previousPage"
                            wire:click="setPage('{{ $paginator->previousCursor()->encode() }}','{{ $paginator->getCursorName() }}')"
                            wire:loading.attr="disabled"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Prev
                        </button>
                    @else
                        <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Prev
                        </button>
                    @endif
                @endif
            </span>

            <!-- numbers -->
            @foreach ($elements as $element)
                <div class="lg:flex hidden">
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <button
                                    class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-blue-500 text-white cursor-pointer"
                                    wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                            @else
                                <button
                                    class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer"
                                    wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endforeach
            <!-- end numbers -->

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if (method_exists($paginator, 'getCursorName'))
                        <button dusk="nextPage"
                            wire:click="setPage('{{ $paginator->nextCursor()->encode() }}','{{ $paginator->getCursorName() }}')"
                            wire:loading.attr="disabled"
                            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Next
                        </button>
                    @else
                        <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Next
                        </button>
                    @endif
                @else
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                        Next
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
