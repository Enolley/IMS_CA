@extends('Templates/dashboard')
@section('content')
  <div class="home-content">
      <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Devices</div>
              <div class="number">####</div>
              <div class="indicator">
              </div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Requests</div>
              <div class="number">####</div>
              <div class="indicator">
              </div>
            </div>
            <i class='bx bxs-cart-add cart two' ></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Assigned</div>
              <div class="number">####</div>
              <div class="indicator">
              </div>
            </div>
            <i class='bx bx-cart cart three' ></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Device Types</div>
              <div class="number">####</div>
              <div class="indicator">
              </div>
            </div>
            <i class='bx bxs-cart-download cart four' ></i>
          </div>
      </div>

      <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Recent Requests</div>
            <div class="sales-details">
              <table>
                <tr>
                    <th>Name</th>
                    <th>Item Borrowed</th>
                    <th>Date Borrowed</th>
                    <th>Return Date</th>
                    <th>Department</th>
                    <th>Justification</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
              </table>
            </div>
            <div class="button">
              <a href="">See All</a>
            </div>
          </div>
          <div class="top-sales box">
          <div class="title">Devices</div>
              <table>
                <tr>
                      <th>Serial Number</th>
                      <th>Device Type</th>
                      <th>Device Status</th>
                      <th>Device Location</th>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

              </table>
              <div class="button">
              <a href="">See All</a>
            </div>
          </div>
      </div>
  </div>
@endsection