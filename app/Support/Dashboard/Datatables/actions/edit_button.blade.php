@if (!$is_ajax)
    <a href="{{ $route }}" class="btn btn-icon  btn-active-color-primary btn-sm me-1">
        <img src="{{ url('/') }}/images/edit_pen.svg" class="table-action-icon">
    </a>
@else
    <a onclick="form_button(this);" data-href="{{ $route }}"
        @foreach ($data as $key => $row)
            data-{{ $key }} = "{{ $row }}"
        @endforeach
        class="btn btn-icon  btn-active-color-primary btn-sm me-1">
        <img src="/images/edit_pen.svg" class="table-action-icon">
    </a>
@endif
