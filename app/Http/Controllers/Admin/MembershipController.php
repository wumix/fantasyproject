<?php

namespace App\Http\Controllers\Admin;

use App\MembershipDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
    public function index()
    {
        $data['memberships'] = \App\Membership::get()->all();

        return view('adminlte::memberships.membership_list', $data);
    }

    function showMembershipAddForm()
    {

        return view('adminlte::memberships.add_membership_plan');
    }

    function postAddMembership(Request $request)
    {
        //$detail=[]
        $membership = new \App\Membership();
        $membership->fill($request->all());
        $membership->save();

        //\App\MembershipDetail::insert(['package_id' => $id, 'feature' => $detail['feature'], 'value' => $detail['value']]);
        return redirect()->route('showEditMembershipForm',['id'=>$membership->id]);
        // return view('adminlte::memberships.add_membership_plan');
    }

    function showMembershipEditForm($plan_id, Request $request)
    {
//        dd($request->all());
        $data['membershipdetail'] = \App\Membership::where('id', $plan_id)->with(['membership_details'=>function($query){
            $query->orderBY('feature','asc');
        }])->first();
        return view('adminlte::memberships.edit_membership_plan', $data);
    }

    function postEditMembership(Request $request, $id)
    {
        //   dd($request->all());
        $membership = \App\Membership::find($id);
        $membership->fill([
            'name' => $request->name,
            'price' => $request->price,
            'is_active' => (int)$request->is_active,
        ]);
        $membership->save();
        $detail = \App\MembershipDetail::where('package_id', $id)->delete();
        foreach ($request->details as $key => $detail) {
            \App\MembershipDetail::insert(['package_id' => $id, 'feature' => $detail['feature'], 'value' => $detail['value']]);
        }
        return redirect()->back();
        //  dd($request->all());


        // return view('adminlte::memberships.edit_membership_plan');
    }
}
