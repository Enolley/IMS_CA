@extends('Templates/clientdash')
@section('content')
<div class="home-content">
    <div class="sales-boxes">
            <div class="recent-sales-one box">
                <div class="title">Request History</div>
                    <div class="sales-details" style="display:hidden;'">
                    <table>
                        <tr>
                            <th>ID</th>
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
                            <th></th>
                        </tr>
            
                        @foreach($requests as $requests)
            
                        <tr>
                            <td>{{$requests->id}}</td>
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
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
    </div>

</div>
@endsection