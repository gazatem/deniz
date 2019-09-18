<?php

namespace App\Http\Controllers\BackOffice;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Str;
/**
 * Class DashboardController.
 */
class SettingsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settings =  Setting::orderBy('group_id')->get();
        return view('backend.settings.index', compact('settings'));        
    }

    public function update(Request $request)
    {
        $setting = Setting::find($request->setting_id);
        $setting->setting_value = $request->setting_value;
        $setting->save();
        return redirect(route('backoffice.settings'))->with('success', 'Setting updated!');
    }
}
