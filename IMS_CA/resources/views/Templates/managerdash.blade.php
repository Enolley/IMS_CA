<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{url('css/dash.css')}}">
    </head>
    <body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="{{url('/images/logo.png')}}" alt="">
        </div>
        <ul class="nav-links">
            <li>
                <a href="/manager-dashboard" class="active">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/recommend-equipment">
                    <i class='' ></i>
                    <span class="links_name">View Requests</span>
                </a>
            </li>
            <li>
                <a href="/recommend-history">
                    <i class='' ></i>
                    <span class="links_name">View History</span>
                </a>
            </li>
           
            <li class="log_out">
            <a href="/logout">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
            <h2>Inventory Management System</h2>
        </div>
        <div class="profile-details">
            <span class="admin_name">Hello {{$userdata->firstname}} {{$userdata->lastname}}</span>
        </div>
        </nav>
        
        @yield('content')
    </section>

    <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
    </script>

    </body>
</html>

