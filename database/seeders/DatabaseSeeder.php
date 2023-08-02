<?php

namespace Database\Seeders;

use App\Models\Admin\Like;
use App\Models\Admin\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'token' => Str::uuid(),
            'first_name' => 'Leandro',
            'last_name' => 'Oliveira',
            'email' => 'lfoadm@icloud.com',
        ]);

        User::factory(9)->create();        

        Post::factory(10)->create()->each(function ($post) {
            return $post->like()->save(Like::factory()->make());
        });


        //Role admin
        $roleAdmin = Role::create([
            'name' => 'admin',
            'label' => 'Administrador',
        ]);
        $permissionAdmin = Permission::create([
            'name' => 'delete_user',
            'label' => 'Deletar usuário do sistema',
        ]);
        $roleAdmin->givePermissionTo($permissionAdmin);

        //Role seller
        $roleSeller = Role::create([
            'name' => 'seller',
            'label' => 'Vendedor de produtos',
        ]);
        $permissionSeller = Permission::create([
            'name' => 'ship_product',
            'label' => 'Despachar produtos',
        ]);
        $roleSeller->givePermissionTo($permissionSeller);
        
        $user1 = User::find(1);
        $user1->assignRole('admin');
        
        $user2 = User::find(2); 
        $user2->assignRole('seller');
    }
}
