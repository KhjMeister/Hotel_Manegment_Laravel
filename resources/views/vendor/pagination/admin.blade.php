@if ($paginator->hasPages())
<div class="table-pagination">
    <div class="flex items-center justify-between">
        <div class="buttons">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))

            <button class="button" type="button">{{
                $element }}</button>
            @endif




            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <button class="button active" type="button">{{  $page }}</button>
            @else
            <a href="{{ $url }}" type="button" class="button "
                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                {{ $page }}
            </a>
            @endif
            @endforeach
            @endif

            @endforeach

        </div>
    </div>
    @endif