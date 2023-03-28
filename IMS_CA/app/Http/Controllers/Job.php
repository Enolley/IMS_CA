<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Desktops;
use App\Models\Faultydesktop;
use App\Models\Missingdesktop;
use App\Models\Faultydesktopfeedback;
use App\Models\Missingdesktopfeedback;
use App\Models\Requests;
use App\Models\Recommendations;
use App\Models\CheckedRecommendations;
use App\Models\Assigned;
use Session;

class Job extends Controller
{

    public function dashboard()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('Job/dashboard', compact('userdata'));
    }
    public function deliverEquipment()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $requests = Requests::where('status', 'Approved')->get();
        $desktops = Desktops::where('availability', 'Available')->where('status', 'Working')->get();

        return view('Job/deliver_equipment', compact('userdata', 'requests', 'desktops'));
    }

    public function assign(Request $request)
    {
        $assigned = new Assigned();

        $updateRequest = Requests::find($request->request_id);

        $updateRequest->status = 'Assigned';
        $updateRequest->assigned_by = $request->assigned_by;

        $assigned->user_id = $request->user_id;
        $assigned->firstname = $request->firstname;
        $assigned->remarks = 'Not Applicable';
        $assigned->device_type = $request->device_type;
        $assigned->requesters_name = $request->requesters_name;
        $assigned->department = $request->department;
        $assigned->application_date = $request->application_date;
        $assigned->return_date = $request->return_date;
        $assigned->status = 'Assigned';
        $assigned->recommended_by = $request->recommended_by;
        $assigned->device_serial_number = $request->device_serial_number;
        $assigned->additional_serial_number = $request->additional_serial_number;
        $assigned->assigned_by = $request->assigned_by;

        $res = $assigned->save();
        $res = $updateRequest->save();

    }

    public function jobHistory()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $assigned = Assigned::where('user_id', $userdata->id)->get();

        return view('Job/job_history', compact('userdata', 'assigned'));
    }
}
