<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = "departments";
    
    protected $primaryKey = 'department_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['department_name', 'department_desc'];
    
    /**
     * Get the users for the department
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}