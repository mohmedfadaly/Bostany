@props(['route', 'target' => null])
<a href="{{ $route }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
    target="{{ $target }}">
    <img src="/images/print.svg" class="table-action-icon" alt="">
</a>

@if ($target)
    <iframe name="{{ $target }}" width=0 height=0 frameborder=0></iframe>
@endif
