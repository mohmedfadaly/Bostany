<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Setting extends Model
{
    use HasTranslations;
    protected $table = 'settings';
    protected array $translatable = ['address','culture','mission','manager_message','about'];

}
