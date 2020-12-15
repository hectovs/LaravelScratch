<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use HasFactory;

    protected $collaborator;

    protected $foo;

    public function __construct(Collaborator $collaborator, $foo)
    {
        $this->collaborator = $collaborator;
        $this->foo = $foo; 
    }

    // protected $foo; 

    // public function __construct($foo)
    // {
    //     $this->foo = $foo; 
    // }
}
