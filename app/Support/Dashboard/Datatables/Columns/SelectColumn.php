<?php

namespace App\Support\Dashboard\Datatables\Columns;

use App\Domain\Order\Enums\OrderStatusEnum;

class SelectColumn
{
    public static function render($model): string
    {
        $status = OrderStatusEnum::translatedValues();
        $view = view('dashboard.order.orders.partials._status_options', compact('model', 'status'));
        return <<<HTML
            $view
        HTML;
    }
}
