<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = ['id', 'title', 'description', 'state_class'];


    /**
     * Get the state.
     *
     * @param string $value
     * @return string
     */
    public function getStateAttribute($value)
    {
        $state = new $this->state_class();
        $state->colour = $state->colour();
        $state->title = $state->title();
        return $state;
    }

}
