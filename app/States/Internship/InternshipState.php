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
        $parts = explode("\\", get_class($this));
        $size = sizeof($parts);
        $classname = $parts[$size - 1];
        $withSpacesBeforeCaps = preg_replace('/(?<!\ )[A-Z]/', ' $0', $classname);
        $removedFirstSpace = substr($withSpacesBeforeCaps, 1);
        $removedWordState = str_replace("Internship", "", $removedFirstSpace);
        $removedWordState = str_replace("State", "", $removedWordState);
        $trimmed = trim($removedWordState);
        $lowercase = strtolower($trimmed);
        return $lowercase;
    }
}
