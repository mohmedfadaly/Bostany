<a onclick="activeRow(this);" data-href="{{ $route }}" data-message="{{ isset($message) ? $message : __('You are going to active this row') }}"
   class="mt-2" title="{{ isset($title) ? $title : __('Activate') }}">
    <span class='badge badge-danger'>{{ isset($name) ? $name : __('In active') }}</span>
</a>
