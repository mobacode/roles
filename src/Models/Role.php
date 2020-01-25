<?php

namespace mobacode\Roles\Models;

use Illuminate\Database\Eloquent\Model;
use mobacode\Roles\Contracts\RoleHasRelations as RoleHasRelationsContract;
use mobacode\Roles\Traits\RoleHasRelations;
use Illuminate\Support\Facades\Route;
use mobacode\Roles\Traits\Slugable;

class Role extends Model implements RoleHasRelationsContract
{
    use Slugable, RoleHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
   
    public function getAllPermission(){
        $routeList  = Route::getRoutes();
        $Route      = [];
        foreach ($routeList as $value){ 
            $model = substr($value->getName(), 0, strpos($value->getName(), "."));
            if($model == 'debugbar' || $model =='password'){
            }else{
                $Route[$value->getName()] = $model;
            }
        }
        $Route = array_filter($Route); 
        return   $Route;        
    }
    
    public function getSelectedPermission(){        
        return $this->belongsToMany('mobacode\Roles\Models\Permission', 'permission_role','role_id','permission_id');
    }   
}
