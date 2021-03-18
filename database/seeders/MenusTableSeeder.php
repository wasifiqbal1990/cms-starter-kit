<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    private $menuId = null;
    private $dropdownId = array();
    private $dropdown = false;
    private $sequence = 1;
    private $joinData = array();
    private $adminRole = null;
    private $userRole = null;
    private $subFolder = '';

    public function join($roles, $menusId){
        $roles = explode(',', $roles);
        foreach($roles as $role){
            array_push($this->joinData, array('role_name' => $role, 'menus_id' => $menusId));
        }
    }

    /*
        Function assigns menu elements to roles
        Must by use on end of this seeder
    */
    public function joinAllByTransaction(){
        DB::beginTransaction();
        foreach($this->joinData as $data){
            DB::table('menu_role')->insert([
                'role_name' => $data['role_name'],
                'menus_id' => $data['menus_id'],
            ]);
        }
        DB::commit();
    }

    public function insertLink($roles, $name, $href, $icon = null){
        $href = $this->subFolder . $href;
        if($this->dropdown === false){
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'sequence' => $this->sequence
            ]);
        }else{
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'parent_id' => $this->dropdownId[count($this->dropdownId) - 1],
                'sequence' => $this->sequence
            ]);
        }
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        $permission = Permission::where('name', '=', $name)->get();
        if(empty($permission)){
            $permission = Permission::create(['name' => 'visit ' . $name]);
        }
        $roles = explode(',', $roles);
        if(in_array('user', $roles)){
            $this->userRole->givePermissionTo($permission);
        }
        if(in_array('admin', $roles)){
            $this->adminRole->givePermissionTo($permission);
        }
        return $lastId;
    }

    public function insertTitle($roles, $name){
        DB::table('menus')->insert([
            'slug' => 'title',
            'name' => $name,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence
        ]);
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function beginDropdown($roles, $name, $icon = ''){
        if(count($this->dropdownId)){
            $parentId = $this->dropdownId[count($this->dropdownId) - 1];
        }else{
            $parentId = null;
        }
        DB::table('menus')->insert([
            'slug' => 'dropdown',
            'name' => $name,
            'icon' => $icon,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence,
            'parent_id' => $parentId
        ]);
        $lastId = DB::getPdo()->lastInsertId();
        array_push($this->dropdownId, $lastId);
        $this->dropdown = true;
        $this->sequence++;
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function endDropdown(){
        $this->dropdown = false;
        array_pop( $this->dropdownId );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPrefix = 'admin';
        /* Get roles */
        $this->adminRole = Role::where('name' , '=' , 'admin' )->first();
        $this->userRole = Role::where('name', '=', 'user' )->first();
        /* Create Sidebar menu */
        DB::table('menulist')->insert([
            'name' => 'sidebar menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $this->insertLink('guest,user,admin', 'Dashboard', '/', 'cil-speedometer');
        $this->beginDropdown('admin', 'Settings', 'cil-calculator');
            $this->insertLink('admin', 'Notes',                   '/'.$adminPrefix.'/notes');
            $this->insertLink('admin', 'Users',                   '/'.$adminPrefix.'/users');
            $this->insertLink('admin', 'Edit menu',               '/'.$adminPrefix.'/menu/menu');
            $this->insertLink('admin', 'Edit menu elements',      '/'.$adminPrefix.'/menu/element');
            $this->insertLink('admin', 'Edit roles',              '/'.$adminPrefix.'/roles');
            $this->insertLink('admin', 'Media',                   '/'.$adminPrefix.'/media');
            $this->insertLink('admin', 'BREAD',                   '/'.$adminPrefix.'/bread');
            $this->insertLink('admin', 'Email',                   '/'.$adminPrefix.'/mail');
        $this->endDropdown();
        $this->insertLink('guest', 'Login', '/'.$adminPrefix.'/login', 'cil-account-logout');
        $this->insertLink('guest', 'Register', '/'.$adminPrefix.'/register', 'cil-account-logout');
        $this->insertTitle('user,admin', 'Theme');
        $this->insertLink('user,admin', 'Colors', '/'.$adminPrefix.'/colors', 'cil-drop1');
        $this->insertLink('user,admin', 'Typography', '/'.$adminPrefix.'/typography', 'cil-pencil');

        $this->beginDropdown('user,admin', 'CMS', 'cil-puzzle');
            $this->insertLink('user,admin','Pages','/'.$adminPrefix.'/cms/pages');
            $this->insertLink('user,admin','Sections','/'.$adminPrefix.'/cms/sections');
        $this->endDropdown();

        $this->beginDropdown('user,admin', 'Base', 'cil-puzzle');
            $this->insertLink('user,admin', 'Breadcrumb',    '/'.$adminPrefix.'/base/breadcrumb');
            $this->insertLink('user,admin', 'Cards',         '/'.$adminPrefix.'/base/cards');
            $this->insertLink('user,admin', 'Carousel',      '/'.$adminPrefix.'/base/carousel');
            $this->insertLink('user,admin', 'Collapse',      '/'.$adminPrefix.'/base/collapse');
            $this->insertLink('user,admin', 'Forms',         '/'.$adminPrefix.'/base/forms');
            $this->insertLink('user,admin', 'Jumbotron',     '/'.$adminPrefix.'/base/jumbotron');
            $this->insertLink('user,admin', 'List group',    '/'.$adminPrefix.'/base/list-group');
            $this->insertLink('user,admin', 'Navs',          '/'.$adminPrefix.'/base/navs');
            $this->insertLink('user,admin', 'Pagination',    '/'.$adminPrefix.'/base/pagination');
            $this->insertLink('user,admin', 'Popovers',      '/'.$adminPrefix.'/base/popovers');
            $this->insertLink('user,admin', 'Progress',      '/'.$adminPrefix.'/base/progress');
            $this->insertLink('user,admin', 'Scrollspy',     '/'.$adminPrefix.'/base/scrollspy');
            $this->insertLink('user,admin', 'Switches',      '/'.$adminPrefix.'/base/switches');
            $this->insertLink('user,admin', 'Tables',        '/'.$adminPrefix.'/base/tables');
            $this->insertLink('user,admin', 'Tabs',          '/'.$adminPrefix.'/base/tabs');
            $this->insertLink('user,admin', 'Tooltips',      '/'.$adminPrefix.'/base/tooltips');
        $this->endDropdown();
            $this->beginDropdown('user,admin', 'Buttons', 'cil-cursor');
            $this->insertLink('user,admin', 'Buttons',           '/'.$adminPrefix.'/buttons/buttons');
            $this->insertLink('user,admin', 'Buttons Group',     '/'.$adminPrefix.'/buttons/button-group');
            $this->insertLink('user,admin', 'Dropdowns',         '/'.$adminPrefix.'/buttons/dropdowns');
            $this->insertLink('user,admin', 'Brand Buttons',     '/'.$adminPrefix.'/buttons/brand-buttons');
        $this->endDropdown();
        $this->insertLink('user,admin', 'Charts', '/'.$adminPrefix.'/charts', 'cil-chart-pie');
        $this->beginDropdown('user,admin', 'Icons', 'cil-star');
            $this->insertLink('user,admin', 'CoreUI Icons',      '/'.$adminPrefix.'/icon/coreui-icons');
            $this->insertLink('user,admin', 'Flags',             '/'.$adminPrefix.'/icon/flags');
            $this->insertLink('user,admin', 'Brands',            '/'.$adminPrefix.'/icon/brands');
        $this->endDropdown();
        $this->beginDropdown('user,admin', 'Notifications', 'cil-bell');
            $this->insertLink('user,admin', 'Alerts',     '/'.$adminPrefix.'/notifications/alerts');
            $this->insertLink('user,admin', 'Badge',      '/'.$adminPrefix.'/notifications/badge');
            $this->insertLink('user,admin', 'Modals',     '/'.$adminPrefix.'/notifications/modals');
        $this->endDropdown();
        $this->insertLink('user,admin', 'Widgets', '/'.$adminPrefix.'/widgets', 'cil-calculator');
        $this->insertTitle('user,admin', 'Extras');
        $this->beginDropdown('user,admin', 'Pages', 'cil-star');
            $this->insertLink('user,admin', 'Login',         '/'.$adminPrefix.'/login');
            $this->insertLink('user,admin', 'Register',      '/'.$adminPrefix.'/register');
            $this->insertLink('user,admin', 'Error 404',     '/'.$adminPrefix.'/404');
            $this->insertLink('user,admin', 'Error 500',     '/'.$adminPrefix.'/500');
        $this->endDropdown();
        $this->insertLink('guest,user,admin', 'Download CoreUI', 'https://coreui.io', 'cil-cloud-download');
        $this->insertLink('guest,user,admin', 'Try CoreUI PRO', 'https://coreui.io/pro/', 'cil-layers');


        /* Create top menu */
        DB::table('menulist')->insert([
            'name' => 'top menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $this->beginDropdown('guest,user,admin', 'Pages');
        $id = $this->insertLink('guest,user,admin', 'Dashboard',    '/'.$adminPrefix.'/');
        $id = $this->insertLink('user,admin', 'Notes',              '/'.$adminPrefix.'/notes');
        $id = $this->insertLink('admin', 'Users',                   '/'.$adminPrefix.'/users');
        $this->endDropdown();
        $id = $this->beginDropdown('admin', 'Settings');

        $id = $this->insertLink('admin', 'Edit menu',               '/'.$adminPrefix.'/menu/menu');
        $id = $this->insertLink('admin', 'Edit menu elements',      '/'.$adminPrefix.'/menu/element');
        $id = $this->insertLink('admin', 'Edit roles',              '/'.$adminPrefix.'/roles');
        $id = $this->insertLink('admin', 'Media',                   '/'.$adminPrefix.'/media');
        $id = $this->insertLink('admin', 'BREAD',                   '/'.$adminPrefix.'/bread');
        $this->endDropdown();

        $this->joinAllByTransaction(); ///   <===== Must by use on end of this seeder
    }
}
