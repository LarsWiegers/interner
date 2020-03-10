<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = ['id', 'title', 'description', 'state_class'];

    public static function getAllStateClasses()
    {
        $classPaths = glob(app_path() . '/States/Internship/*.php');
        $classes = array();
        $namespace = 'App\States\Internship\\';
        foreach ($classPaths as $classPath) {
            $segments = explode('/', $classPath);
            $segments = explode('\\', $segments[count($segments) - 1]);
            $classes[] = $namespace . $segments[count($segments) - 1];
        }
        return $classes;
    }


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
