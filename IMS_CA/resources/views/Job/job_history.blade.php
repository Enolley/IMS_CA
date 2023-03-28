@extends('Templates/jobdash')
@section('content')
<div class="home-content">
    <div class="sales-boxes">
            <div class="recent-sales-one box">
                <div class="title">My Assign History</div>
                    <div class="sales-details" style="display:hidden;'">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Requester</th>
                            <th>Device Type</th>
                            <th>Application Date</th>
                            <th>Return Date</th>
                            <th>Assign Remarks</th>
                        </tr>

                        @foreach($assigned as $assigned)

                        <tr>
                            <td>{{$assigned->id}}</td>
                            <td>{{$assigned->requesters_name}}</td>
                            <td>{{$assigned->device_type}}</td>
                            <td>{{$assigned->application_date}}</td>
                            <td>{{$assigned->return_date}}</td>
                            <td>{{$assigned->remarks}}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
    </div>

</div>
@endsection

