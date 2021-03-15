<?php
namespace models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{

    public function test()
    {
        if (empty($this->test)) {
            return $this->name;
        }

        return "{$this->name} {$this->test}";
    }
}
