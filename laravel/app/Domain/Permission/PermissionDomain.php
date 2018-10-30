<?php
namespace App\Domain\Permission;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;

class PermissionDomain {
    // 创建权限
    public function create($name){
        if(!$name){
            $permission = Permission::create(['name' => trim($name)]);
        }
        return true;
    }

    // 给用户添加权限
    public function givePermission($name){
        $user = Auth::user();
        $user->givePermissionTo(trim($name));
    }


}
?>