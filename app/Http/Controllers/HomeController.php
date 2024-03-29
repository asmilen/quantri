<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Role;
use File;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function showSettingGeneral(){
        $roles = Role::all();
        return view('admin.pages.setting-general', array('roles' => $roles, 'menuActive' => 'Setting General'));
    }

    public function updateSettingGeneral(Request $request){
        $default_role_name = $request->default_role;
        //config(['setting.default_role' => $default_role_name]);
        $arraySetting = config('setting');
        $arraySetting['default_role'] = $default_role_name;
        $data = var_export($arraySetting, 1);
        if(File::put(base_path() . '/config/setting.php', "<?php\n return $data ;")) {
            return redirect('setting-general')->with(['flash_message' => 'Đã lưu cài đặt!', 'message_level' => 'success', 'message_icon' => 'check']);
        }
    }
}
