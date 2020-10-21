<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    protected $table = "learning_material";
    
    protected $primaryKey = 'material_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id', 'employee_id', 'category_id', 'department', 'title', 'description', 'file', 'preview_avatar'];
    
    /**
     * Get the users for the department
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}