<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function completed()
    {
        $this->completed = true;
        $this->save();
    }
}
