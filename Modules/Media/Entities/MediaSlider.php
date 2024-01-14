<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class MediaSlider extends Model
{
    use HasTranslations;
    protected $table = 'media_sliders';
    protected array $translatable = ['title'];

}
