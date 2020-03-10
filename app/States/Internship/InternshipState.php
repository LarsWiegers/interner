<?php

namespace App\States\Internship;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

abstract class InternshipState
{
    abstract public function colour(): string;

    public function title(): string
    {
        return self::get_title($this);
    }

    public static function get_title($class): string
    {
        if(is_object($class)) {
            $class = get_class($class);
        }
        $parts = explode("\\", $class);
        $size = sizeof($parts);
        $classname = $parts[$size - 1];
        $withSpacesBeforeCaps = preg_replace('/(?<!\ )[A-Z]/', ' $0', $classname);
        $removedFirstSpace = substr($withSpacesBeforeCaps, 1);
        $removedWordState = str_replace("Internship", "", $removedFirstSpace);
        $removedWordState = str_replace("State", "", $removedWordState);
        $removedWordState = str_replace(".php", "", $removedWordState);
        $trimmed = trim($removedWordState);
        $lowercase = strtolower($trimmed);
        return $lowercase;
    }
}
