@extends('Templates/dashboard')
@section('content')
    <div class="home-content">
    <div class="sales-boxes">
        <div class="recent-sales-one box">
            <div class="title">Desktops</div>
                <div class="sales-details">
                    <form action="{{route('new-desktop')}}" method="post">
                        @if(Session::has('success'))
                            <div class="response success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="response fail">
                                {{Session::get('fail')}}
                            </div>
                        @endif
                        @csrf
                        <input type="text" name="region" id="" placeholder="Region" required>
                        <input type="text" name="department" id="" placeholder="Department" required>
                        <input type="text" name="user" id="" placeholder="User" required>
                        <input type="text" name="make" id="" placeholder="Device Make" required>
                        <input type="text" name="cpu_serial_number" id="" placeholder="CPU Serial Number" required>
                        <input type="text" name="monitor_serial_number" id="" placeholder="Monitor Serial Number" required>
                        <input type="text" name="operating_system" id="" placeholder="Operating  System" required>
                        <input type="text" name="purchase_year" id="" placeholder="Purchase Year" required>
                        <input type="text" name="status" id="" placeholder="Device Status" required>
                        <input type="text" name="remarks" id="" placeholder="Remarks" required>
                        <select name="availability" id="" required>
                            <option value="0" disable selected>Availability</option>
                            <option value="In Use">In Use</option>
                            <option value="Available">Available</option>
                        </select>
                        <input type="submit">
                    </form>
                </div>
                    <div class="buttons">
                        <a href="/desktops">Back to Desktops</a>
                    </div>
            </div>
                    
        </div>
    </div>
    </div>
@endsection