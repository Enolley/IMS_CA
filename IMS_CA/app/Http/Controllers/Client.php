<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;
use Session;

class Client extends Controller
{
    public function dashboard()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('Client/dashboard', compact('userdata'));
    }

    public function requestForm()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        return view('Client/requestform', compact('userdata'));
    }

    public function submitRequest(Request $request)
    {
        $newRequest = new Requests();

        $newRequest->firstname = $request->firstname;
        $newRequest->user_id = $request->user_id;
        $newRequest->department = $request->department;
        $newRequest->device_type = $request->device_type;
        $newRequest->application_date = $request->application_date;
        $newRequest->return_date = $request->return_date;
        $newRequest->justification = $request->justification;
        $newRequest->returned_to = 'In Progress';
        $newRequest->recommend_remarks = 'In Progress';
        $newRequest->check_remarks = 'In Progress';
        $newRequest->return_remarks = 'In Progress';
        $newRequest->reject_feedback = 'In Progress';

        $res = $newRequest->save();

    }

    public function requestStatus()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $requests = Requests::where('user_id', $userdata->id)->get();

        return view('Client/requeststatus', compact('userdata', 'requests'));
    }

    public function requestHistory()
    {
        $userdata = array();

        if (Session::has('loginId'))
        {
            $userdata = User::where('id','=', Session::get('loginId'))->first();
        }

        $requests = Requests::where('user_id', $userdata->id)->get();

        return view('Client/requesthistory', compact('userdata', 'requests'));
    }
}
