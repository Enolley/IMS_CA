@extends('Templates/jobdash')
@section('content')
<div class="home-content">
    <div class="sales-boxes">
            <div class="recent-sales-one box">
                <div class="title">Requests To Be Recommended</div>
                    <div class="sales-details" style="display:hidden;'">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Requester</th>
                            <th>Device Type</th>
                            <th>Application Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Recommended By</th>
                            <th>Recommendation Remarks</th>
                            <th>Checked By</th>
                            <th>Check Remarks</th>
                            <th>Assigned To</th>
                            <th>Given by</th>
                            <th>Return Status</th>
                            <th>Returned to</th>
                            <th>Return Remarks</th>
                            <th>Feedback by</th>
                            <th>Feedback Remarks</th>
                            <th>Action</th>
                        </tr>

                        @foreach($requests as $requests)

                        <tr>
                            <td>{{$requests->id}}</td>
                            <td>{{$requests->firstname}}</td>
                            <td>{{$requests->device_type}}</td>
                            <td>{{$requests->application_date}}</td>
                            <td>{{$requests->return_date}}</td>
                            <td>{{$requests->status}}</td>
                            <td>{{$requests->recommended_by}}</td>
                            <td>{{$requests->recommend_remarks}}</td>
                            <td>{{$requests->checked_by}}</td>
                            <td>{{$requests->check_remarks}}</td>
                            <td>{{$requests->assigned_to}}</td>
                            <td>{{$requests->assigned_by}}</td>
                            <td>{{$requests->return_status}}</td>
                            <td>{{$requests->returned_to}}</td>
                            <td>{{$requests->return_remarks}}</td>
                            <td>{{$requests->feedback_by}}</td>
                            <td>{{$requests->reject_feedback}}</td>
                            <td><a href="#popup1/{{$requests->id}}">Assign</a></td>
                        </tr>
                        <div id="popup1/{{$requests->id}}" class="overlay">
                            <div class="popup">
                                <h2>Remarks</h2>
                                <a class="close" href="#">&times;</a>
                                <div class="content">
                                    <form action="{{route('assign')}}" method="post">
                                        @csrf
                                        <input type="text" name="request_id" value="{{$requests->id}}" hidden>
                                        <input type="text" name="user_id" id="" value="{{$userdata->id}}" hidden>
                                        <input type="text" name="firstname" id="" value="{{$userdata->firstname}}" hidden>
                                        <input type="text" name="requesters_name" id="" value="{{$requests->firstname}}" hidden>
                                        <input type="text" name="department" id="" value="{{$requests->department}}" hidden>
                                        <input type="text" name="application_date" id="" value="{{$requests->application_date}}" hidden>
                                        <input type="text" name="return_date" id="" value="{{$requests->return_date}}" hidden>
                                        <input type="text" name="device_type" id="" value="{{$requests->device_type}}" hidden>
                                        <input type="text" name="recommended_by" id="" value="{{$requests->recommended_by}}" hidden>
                                        <input type="text" name="checked_by" id="" value="{{$requests->checked_by}}" hidden>
                                        <input type="text" name="assigned_by" id="" value="{{$userdata->firstname}}" hidden>
                                        <select name="device_serial_number" id="">
                                            @foreach ($desktops as $desktops)
                                                <option value="{{$desktops->cpu_serial_number}}">{{$desktops->cpu_serial_number}}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="additional_serial_number" id="" placeholder="Monitor Serial Number if applicable">
                                        <button type="submit">Assign</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
    </div>

</div>
@endsection
