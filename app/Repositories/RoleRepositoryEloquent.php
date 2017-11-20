<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoleRepository;
use App\Models\Role;
use App\Models\Permission_Role;
use App\Models\Permission;
use App\Validators\RoleValidator;
/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllPermissions()
    {
        $permission_lists = array();
        $temp = Permission::where('parent_id',0)->get()->toArray();
        foreach ($temp as $key => $value) {
            $permission_lists[$value['id']] = $value;
            $permission_lists[$value['id']]['chlid'] = Permission::where('parent_id',$value['id'])->get()->toArray();
        }
        return $permission_lists;
    }

    public function getUserPermissions($user_id)
    {
        $data = Permission_Role::where('role_id',$user_id)->get()
                                ->map(function ($info) {
                                    return $info;
                                })->pluck('permission_id')->toArray();
        return $data;
    }
}
