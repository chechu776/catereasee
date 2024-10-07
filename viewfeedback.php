<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Dashboard</title>
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
                <a href="login.png">
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
        <section class="wrapper">
            <h1>Feedbacks</h1>
            <div class="feedback">
                <h2>Shamsudheen</h2>
                <p>01/03/2024</p>
                <div class="reply">
                    <p class="fb">Lorem ipsum dolor sit amet consectetur adipisicing iure praesentium ex consequatur sunt voluptate soluta error explicabo ipsum ipsam dolorum quod. Nulla quam quo magni perferendis sint, temporibus ducimus quae saepe culpa eos repellat mollitia aspernatur harum consectetur itaque tempore numquam reiciendis.</p>
                    <a href="" class="button">Reply</a>
                </div>
            </div>
            <div class="feedback">
                <h2>Althaf</h2>
                <p>10/05/2024</p>
                <div class="reply">
                    <p class="fb">Lorem ipsum dolor sit amet consectetur adipisicing iure praesentium ex consequatur sunt voluptate soluta error explicabo ipsum ipsam dolorum quod. Nulla quam quo magni perferendis sint, temporibus ducimus quae saepe culpa eos repellat mollitia aspernatur harum consectetur itaque tempore numquam reiciendis.</p>
                    <a href="" class="button">Reply</a>
                </div>
            </div>
            <div class="feedback">
                <h2>Raashid</h2>
                <p>11/04/2024</p>
                <div class="reply">
                    <p class="fb">Lorem ipsum dolor sit amet consectetur adipisicing iure praesentium ex consequatur sunt voluptate soluta error explicabo ipsum ipsam dolorum quod. Nulla quam quo magni perferendis sint, temporibus ducimus quae saepe culpa eos repellat mollitia aspernatur harum consectetur itaque tempore numquam reiciendis.</p>
                    <a href="" class="button">Reply</a>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
