<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        'deb_name', 'description', 'keyword', 'parent'
    ];

    public function parents()
    {
        return $this->hasMany(Department::class, 'id', 'parent');
    }
}
