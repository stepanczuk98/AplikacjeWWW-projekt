@if ($paginator->lastPage() > 1)
    <div>
        Strona:
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <a class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </a>
        @endfor
    </div>
@endif
