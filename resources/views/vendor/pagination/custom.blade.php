<div class="page-info text-center mt-4">
    Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
</div>

<div class="btn-box mt-1">
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
    @endif

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
    @endif
</div>
