<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function applyActiveClass(?ViewContext $context, $link): string
    {
        return !empty($context) && $context->isActive($link) ? 'active' : '';
    }

    public static function deletePublicFile($publicPath)
    {
        $path = str_replace('storage/', 'public/', $publicPath);

        Storage::delete($path);
    }
}
