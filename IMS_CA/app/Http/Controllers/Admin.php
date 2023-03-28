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
use Session;

class Admin extends Controller
{
    public function dashboard()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('Admin/dashboard', compact('userdata'));
    }

    public function desktops()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $desktop = Desktops::paginate(10);
        return view('Admin/desktops', compact('desktop', 'userdata'));
    }

    public function addDesktop()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('Admin/add_desktop', compact('userdata'));
    }

    public function newDesktop(Request $request)
    {
        $desktop = new Desktops();

        $desktop->region = $request->region;
        $desktop->department = $request->department;
        $desktop->user = $request->user;
        $desktop->make = $request->make;
        $desktop->cpu_serial_number = $request->cpu_serial_number;
        $desktop->monitor_serial_number = $request->monitor_serial_number;
        $desktop->operating_system = $request->operating_system;
        $desktop->purchase_year = $request->purchase_year;
        $desktop->status = $request->status;
        $desktop->remarks = $request->remarks;
        $desktop->availability = $request->availability;

        $res = $desktop->save();

        if($res)
        {
            return back()->with('success', 'The Desktop was successfully added');
        }
        else
        {
            return back()->with('fail', 'The Desktop was not added');
        }
    }

    public function availableDesktop()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $available = Desktops::where('status', 'WORKING')->where('availability', 'Available')->where('user', 'UNALLOCATED')->paginate(10);

        return view('Admin/available_desktops', compact('available', 'userdata'));
    }

    public function faultyDesktop()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $faulty = Desktops::where('status', 'FAULTY')->paginate(10);

        return view('Admin/faulty_desktops', compact('faulty', 'userdata'));
    }

    public function missingDesktop()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $missing = Desktops::where('status', 'MISSING')->paginate(10);

        return view('Admin/missing_desktops', compact('missing', 'userdata'));
    }

    public function reportFaultyDesktop(Request $request)
    {
        $faulty = new Faultydesktop();
        $desktop = Desktops::find($request->desktops_id);

        $faulty->remarks = $request->remarks;
        $desktop->status = 'FAULTY';
        $desktop->remarks = $request->remarks;

        $desktop->save();
        $res = $faulty->save();

        if($res)
        {
            return back()->with('success', 'The issue was reported');
        }
        else
        {
            return back()->with('fail', 'The issue was not reported');
        }
    }

    public function reportMissingDesktop(Request $request)
    {
        $missing = new Missingdesktop();
        $desktop = Desktops::find($request->desktops_id);

        $missing->remarks = $request->remarks;
        $desktop->status = 'MISSING';
        $desktop->remarks = $request->remarks;

        $desktop->save();
        $res = $missing->save();

        if($res)
        {
            return back()->with('success', 'The issue was reported.');
        }
        else
        {
            return back()->with('fail', 'The issue was not reported.');
        }
    }

    public function assignAvailableDesktop(Request $request)
    {
        $desktop = Desktops::find($request->desktops_id);

        $desktop->user = $request->user;
        $desktop->remarks = $request->remarks;
        $desktop->department = $request->department;
        $desktop->status = $request->status;

        $res = $desktop->save();

        if($res)
        {
            return back()->with('success', 'The device has been assigned.');
        }
        else
        {
            return back()->with('fail', 'The device has not been assigned.');
        }
    }

    public function faultyDesktopFeedback(Request $request)
    {
        $faulty = Desktops::find($request->desktop_id);
        $feedback = new Faultydesktopfeedback();

        $faulty->status = $request->status;
        $faulty->remarks = $request->feedback;

        $feedback->desktop_id = $request->desktop_id;
        $feedback->user = $request->user;
        $feedback->feedback = $request->feedback;
        $feedback->status = $request->status;

        $res = $feedback->save();
        $faulty->save();

        if($res)
        {
            return back()->with('success', 'Feedback has been submitted.');
        }
        else
        {
            return back()->with('fail', 'Feedback has not been submitted');
        }

    }

    public function missingDesktopFeedback(Request $request)
    {
        $missing = Desktops::find($request->desktop_id);
        $feedback = new Missingdesktopfeedback();

        $missing->status = $request->status;
        $missing->remarks = $request->feedback;

        $feedback->desktop_id = $request->desktop_id;
        $feedback->user = $request->user;
        $feedback->feedback = $request->feedback;
        $feedback->status = $request->status;

        $res = $feedback->save();
        $missing->save();

        if($res)
        {
            return back()->with('success', 'Feedback has been submitted.');
        }
        else
        {
            return back()->with('fail', 'Feedback has not been submitted');
        }

    }

    public function viewRecommendations()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $requests = Requests::where('status', 'Recommended')->get();

        return view('Admin/recommendations', compact('userdata', 'requests'));
    }

    public function approveRequest(Request $request)
    {
        $newCheck = new checkedRecommendations();
        $updateRequest = Requests::find($request->request_id);

        $updateRequest->recommended_by = $request->firstname ;
        $updateRequest->status = 'Approved';
        $updateRequest->check_remarks = $request->recommend_remarks;
        $updateRequest->assigned_to = $request->assigned_to;
        $updateRequest->checked_by = $request->firstname;

        $newCheck->user_id = $request->user_id;
        $newCheck->firstname = $request->firstname;
        $newCheck->remarks = $request->recommend_remarks;
        $newCheck->device_type = $request->device_type;
        $newCheck->requesters_name = $request->requesters_name;
        $newCheck->department = $request->department;
        $newCheck->application_date = $request->application_date;
        $newCheck->return_date = $request->return_date;
        $newCheck->status = 'Approved';
        $newCheck->recommended_by = $request->recommended_by;

        $res = $newCheck->save();
        $res = $updateRequest->save();
    }

    public function rejectRequest(Request $request)
    {

    }

    public function checkHistory()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $checked = CheckedRecommendations::where('user_id', $userdata->id)->get();

        return view('Admin/check_history', compact('userdata', 'checked'));
    }

}
