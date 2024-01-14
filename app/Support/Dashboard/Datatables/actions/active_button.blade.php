<a onclick="activeRow(this);" data-href="{{ $route }}"
   data-message="{{ isset($message) ? $message : __('You are going to in-active this row') }}" class="mt-2" title="{{ isset($title) ? $title : __('In-Activate') }}">
    <span class='badge badge-success'>{{ isset($name) ? $name : __('Active') }}</span>
</a>
