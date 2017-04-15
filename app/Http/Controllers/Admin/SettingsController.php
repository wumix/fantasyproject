<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller {

    //
    function index() {

        return view('adminlte::settings.add-header');
    }

    function postAddHeader(Request $request) {
        $postedData = array_except($request->all(), '_token');
        foreach ($postedData as $key => $val) {
            $siteSetting = \App\SiteSetting::updateOrCreate(
                            ['meta_key' => $key], [
                        'meta_key' => $key,
                        'meta_value' => $val
                            ]
            );
        }
        return redirect()->back()->with('status', 'Updated successfully');
    }

}
