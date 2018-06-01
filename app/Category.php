<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
        /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

     /**
     * Permissions can belong to many roles.
     *
     * @return Model
     */
    public function permissions()
    {
        return $this->hasMany('\Caffeinated\Shinobi\Models\Permission');
    }

}
