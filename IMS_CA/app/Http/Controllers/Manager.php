<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;
use App\Models\Recommendations;
use Session;

class Manager extends Controller
{
    public function dashboard()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('Manager/dashboard', compact('userdata'));
    }
    public function recommendEquipment()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $requests = Requests::where('status', 'In Progress')->get();

        return view('Manager/recommend_equipment', compact('userdata', 'requests'));
    }

    public function recommend(Request $request)
    {
        $newRecommendation = new Recommendations();
        $updateRequest = Requests::find($request->request_id);

        $updateRequest->recommended_by = $request->firstname ;
        $updateRequest->status = 'Recommended';
        $updateRequest->recommend_remarks = $request->recommend_remarks;

        $newRecommendation->user_id = $request->user_id;
        $newRecommendation->firstname = $request->firstname;
        $newRecommendation->remarks = $request->recommend_remarks;
        $newRecommendation->device_type = $request->device_type;
        $newRecommendation->requesters_name = $request->requesters_name;
        $newRecommendation->department = $request->department;
        $newRecommendation->application_date = $request->application_date;
        $newRecommendation->return_date = $request->return_date;
        $newRecommendation->status = 'Recommended';

        $res = $newRecommendation->save();
        $res = $updateRequest->save();
    }

    public function recommendHistory()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $recommendations = Recommendations::where('user_id', $userdata->id)->get();

        return view('Manager/recommendations_history', compact('userdata', 'recommendations'));
    }
}
