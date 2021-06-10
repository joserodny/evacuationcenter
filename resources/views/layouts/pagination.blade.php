
  @if ($paginator->hasPages())
  <nav aria-label="...">
  <ul class="pagination justify-content-end">

    @if($paginator->onFirstPage())
        <li class="page-item">
            <a class="page-link" href="{{$paginator->previousPageUrl()}}" tabindex="-1">
                <i class="fas fa-angle-left"><span class="sr-only">Previous</span></i>
            </a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link active" href="{{$paginator->previousPageUrl()}}" tabindex="-1">
                <i class="fas fa-angle-left"><span class="sr-only">Previous</span></i>
            </a>
        </li>
      @endif

      @if($paginator->currentPage() > 3)
          <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
      @endif
      @if($paginator->currentPage() > 4)
          <li class="page-item"><span class="sr-only">...</span></li>
      @endif
      @foreach(range(1, $paginator->lastPage()) as $i)
          @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
              @if ($i == $paginator->currentPage())
                  <li class="page-item active"><span class="sr-only">{{ $i }}</span></li>
              @else
                  <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
              @endif
          @endif
      @endforeach
      @if($paginator->currentPage() < $paginator->lastPage() - 3)
          <li class="page-item"><span >...</span></li>
      @endif
      @if($paginator->currentPage() < $paginator->lastPage() - 2)
          <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
      @endif


      @if ($paginator->hasMorePages())
      <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}"><i class="fas fa-angle-right"></i>
        <span class="sr-only">Next</span></a></li>
      @else
      <li class="page-item disabled"><a class="page-link"><i class="fas fa-angle-right"></i>
        <span class="sr-only">Next</span></a></li>
      @endif
  </ul>
</nav>
@endif

  