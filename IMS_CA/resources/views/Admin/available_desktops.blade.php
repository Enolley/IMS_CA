@extends('Templates/dashboard')
@section('content')

<div class="home-content">
        <div class="sales-boxes">
                <div class="recent-sales-one box">
                    <div class="title">Desktops</div>
                        <div class="sales-details">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Region</th>
                                <th>Department</th>
                                <th>User</th>
                                <th>Desktop Make</th>
                                <th>CPU SNO</th>
                                <th>Monitor SNO</th>
                                <th>Operating System</th>
                                <th>Purchase Year</th>
                                <th>Device Status</th>
                                <th>Remarks</th>
                                <th>Availability</th>
                                <th>Action</th>
                            </tr>
                
                            @foreach($available as $desktops)
                
                            <tr>
                                <td>{{$desktops->id}}</td>
                                <td>{{$desktops->region}}</td>
                                <td>{{$desktops->department}}</td>
                                <td>{{$desktops->user}}</td>
                                <td>{{$desktops->make}}</td>
                                <td>{{$desktops->cpu_serial_number}}</td>
                                <td>{{$desktops->monitor_serial_number}}</td>
                                <td>{{$desktops->operating_system}}</td>
                                <td>{{$desktops->purchase_year}}</td>
                                <td>{{$desktops->status}}</td>
                                <td>{{$desktops->remarks}}</td>
                                <td>{{$desktops->availability}}</td>
                                <td><a href="#popup/{{$desktops->id}}">Assign</a></td>
                            </tr>
                            <div id="popup/{{$desktops->id}}" class="overlay">
                                <div class="popup">
                                    <h2>Assign</h2>
                                    <a class="close" href="#">&times;</a>
                                    <div class="content">
                                        <form action="{{route('assign-available-desktop')}}" method="post">
                                            @csrf
                                            <input type="text" name="desktops_id" value="{{$desktops->id}}" hidden>
                                            <input type="text" name="user" placeholder = "User's Full Name">
                                            <input type="text" name="department" placeholder="User's Department">
                                            <textarea name="remarks" id="" cols="30" rows="10" placeholder="Your Remarks"></textarea>
                                                
                                            <button type="submit">Send Remarks</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </table>

                        

                        </div>
                        <div class="buttons">
                            <a href="/desktops">Back to Desktop</a>
                        </div>
                        <div class="paginator">
                            {{$available->links()}}
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>

@endsection