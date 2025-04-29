<?php

namespace App\Shortcodes;

class CustomShortcodes
{
    public function img($shortcodes)
    {
        return getImageTag($shortcodes->id);
    }
}
