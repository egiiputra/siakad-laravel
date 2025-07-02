<ul class="pagination">
  @php
    $current = intval($_GET['page']);
    if ($current <= 0) {
      $current = 1;
    } elseif ($current > $pageCount) {
      $current = $pageCount;
    }

    $start = $current - 7;
    if ($start <= 0) {
      $start = 1;
    }

    $end = $current + 7;
    if ($end > $pageCount) {
      $end = $pageCount;
    }
  @endphp
  @if ($current > 1)
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
  @endif
  @for ($i = $start; $i <= $end; $i++)
    <li class="page-item {{ ($i == $current) ? 'active':'' }}"><a class="page-link" onclick="loadPage({{$i}})" href="#">{{ $i }}</a></li>
  @endfor
  <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
  @if ($current < $end)
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  @endif
</ul>