<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="adm">
    <div class="sidebar">
        <div class="logo">
        </div>
        <ul class="menu">
            <li class="active">
                <a href="admindashboard.php">
                    <img src="images/user.png" alt="">
                    <span>Manage User</span>
                </a>
            </li>
            <li>
                <a href="managecsp.php">
                    <img src="images/food-service.png" alt="">
                    <span>Manage CSP</span>
                </a>
            </li>
            <li>
                <a href="viewbooking.php">
                    <img src="images/booking.png" alt="">
                    <span>View Bookings</span>
                </a>
            </li>
            <li>
                <a href="viewfeedback.php">
                    <img src="images/feedback.png" alt="">
                    <span>View Feedback</span>
                </a>
            </li>
            <li class="logout">
                <a href="login.php">
                    <img src="images/logout.png" alt="">
                    <span>logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="maincontent">
        <div class="wrapper">
            <div class="title">
                <h1>Admin Dashboard</h1>
            </div>
            <div class="info">
                <!-- <div class="searchbox">
                    <img src="images/search-interface-symbol.png" alt="">
                    <input type="text" placeholder="Search" />
                </div> -->
                <img src="images/guest-user-250x250.jpg" alt="">
            </div>
        </div>
        <div class="vuser">
            <div class="head">
                <h1>Bookings</h1>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Booked CSP</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                <tr class="hover">
                    <td>1</td>
                    <td>Shamsu</td>
                    <td>Rahmania</td>
                    <td>01/03/2025</td>
                    <td>Sample venue</td>
                    <td>50000</td>
                    <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                </tr>
                <tr class="hover">
                    <td>2</td>
                    <td>Althaf</td>
                    <td>B 4 Biriyani</td>
                    <td>10/10/2024</td>
                    <td>Sample venue</td>
                    <td>20000</td>
                    <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
            </table>
        </div>
    </div>
</body>
</html>
