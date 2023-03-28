@extends('Templates/dashboard')
@section('content')
<div class="home-content">
    <div class="sales-boxes">
            <div class="recent-sales-one box">
                <div class="title">My Check History</div>
                    <div class="sales-details" style="display:hidden;'">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Requester</th>
                            <th>Device Type</th>
                            <th>Application Date</th>
                            <th>Return Date</th>
                            <th>Check Remarks</th>
                        </tr>
            
                        @foreach($checked as $checkedrecommendations)
            
                        <tr>
                            <td>{{$checkedrecommendations->id}}</td>
                            <td>{{$checkedrecommendations->requesters_name}}</td>
                            <td>{{$checkedrecommendations->device_type}}</td>
                            <td>{{$checkedrecommendations->application_date}}</td>
                            <td>{{$checkedrecommendations->return_date}}</td>
                            <td>{{$checkedrecommendations->remarks}}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
    </div>

</div> 
@endsection