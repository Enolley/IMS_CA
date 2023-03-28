@extends('Templates/clientdash')
@section('content')
    <div class="home-content">
        <div class="sales-boxes">
        <div class="top-sales-one box">
            <div class="title">IT Equipment Request Form</div>
            <form action="{{route('submit-request')}}" method="post">
                @csrf
                <input type="text" name="firstname" id="name" value="{{$userdata->firstname}}" hidden>
                <input type="text" name="department" value="{{$userdata->department}}" hidden>
                <select name="device_type" id="device_type">
                    <option value="0" disabled selected>Select Equipment</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Projector">Projector</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Desktop">Desktop</option>
                    <option value="UPS">UPS</option>
                </select>
                <input type="text" name="application_date" id="application_date" placeholder="Application Date" onfocus="(this.type='date')">
                <input type="text" name="return_date" id="return_date" placeholder="Return Date" onfocus="(this.type='date')">
                <textarea name="justification" id="justification" cols="30" rows="10" placeholder="Justification(s) for Borrowing the equipment"></textarea>
                <input type="text" name="user_id" value="{{$userdata->id}}" hidden><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection