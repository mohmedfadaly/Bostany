<?php

namespace App\Support\Dashboard\Datatables\Columns;

class ImageColumn
{
    public static function render($imageSource)
    {
        $code=\Str::random(5);
        return <<<HTML
        <img src="$imageSource" data-fancybox-$code='true' width="70px" height="70px" class=" rounded border border-2" alt="" />
        <script type="text/javascript">
        Fancybox.bind("[data-fancybox-$code]", {

        });
        </script>
        HTML;
    }
}



