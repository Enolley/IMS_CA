@extends('Templates/dashboard')
@section('content')


    <div class="home-content">
        <div class="sales-boxes">
                <div class="recent-sales-one box">
                    <div class="title">Desktops</div>
                        <div class="sales-details" style="display:hidden;'">
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
                                <th>Report a Problem</th>
                            </tr>
                
                            @foreach($desktop as $desktops)
                
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
                                <td><a href="#popup1/{{$desktops->id}}">Faulty</a><a href="#popup2/{{$desktops->id}}">Missing</a></td>
                            </tr>
                            <div id="popup1/{{$desktops->id}}" class="overlay">
                                <div class="popup">
                                    <h2>Report Faulty Device</h2>
                                    <a class="close" href="#">&times;</a>
                                    <div class="content">
                                        <form action="{{route('report-faulty-desktop')}}" method="post">
                                            @csrf
                                            <input type="text" name="desktops_id" value="{{$desktops->id}}" hidden>
                                            <textarea name="remarks" id="" cols="30" rows="10"></textarea>
                                                
                                            <button type="submit">Send Remarks</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="popup2/{{$desktops->id}}" class="overlay">
                                <div class="popup">
                                    <h2>Report Missing Device</h2>
                                    <a class="close" href="#">&times;</a>
                                    <div class="content">
                                        <form action="{{route('report-missing-desktop')}}" method="post">
                                            @csrf
                                            <input type="text" name="desktops_id" value="{{$desktops->id}}" hidden>
                                            <textarea name="remarks" id="" cols="30" rows="10"></textarea>
                                                
                                            <button type="submit">Send Remarks</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>

                        

                        </div>
                        <div class="buttons">
                            <a href="/add-desktop">Add Desktop</a>
                            <a href="/available-desktops">View Available Desktops</a>
                            <a href="/faulty-desktops">View Faulty Desktops</a>
                            <a href="/missing-desktops">View Missing Desktops</a>
                        </div>
                      
                    </div>
                    
                </div>
                <div class="paginator">
                    {{$desktop->links()}}
                </div>
        </div>

    </div>

@endsection