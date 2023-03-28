@extends('Templates/Managerdash')
@section('content')
<div class="home-content">
    <div class="sales-boxes">
            <div class="recent-sales-one box">
                <div class="title">My Recommendations</div>
                    <div class="sales-details" style="display:hidden;'">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Requester</th>
                            <th>Device Type</th>
                            <th>Application Date</th>
                            <th>Return Date</th>
                            <th>Recommendation Remarks</th>
                        </tr>
            
                        @foreach($recommendations as $recommendations)
            
                        <tr>
                            <td>{{$recommendations->id}}</td>
                            <td>{{$recommendations->requesters_name}}</td>
                            <td>{{$recommendations->device_type}}</td>
                            <td>{{$recommendations->application_date}}</td>
                            <td>{{$recommendations->return_date}}</td>
                            <td>{{$recommendations->remarks}}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
    </div>

</div> 
@endsection