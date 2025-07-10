<?php
    include("../includes/footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel = "stylesheet" href = "../Seller_Design/dashboard.css">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>
<div class="mobileView">
           <div class="sidebar">
            <div class="menu">
                <input type="checkbox" id = "menu" hidden>
                <label for="menu"><i class='bx bx-menu'></i></label>
                <div class="contentForSidebar">
                <div class="containerS" style=" height: 100vh; margin-top: 50px;">
                    <a href="LoadToSellerDashboard.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">DASHBOARD</a>
                    <a href="LoadToHome.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 70px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">HOME</a>
                    <a href="LoadToStore.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 140px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">MY STORE</a>
                    <a href="LoadToPending.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 210px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PENDING</a>
                    <a href="LoadToProfile.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 280px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PROFILE</a>
                    <a href="LoadToLogout.php" style="color: black; background-color: red; color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; bottom: 10px; margin-top: 350px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">LOGOUT</a>
                </div>
                </div>

                
            </div>
            
           </div>

           <div class="content">
                        <!-- content aria for mobile! -->

                        <a href="LoadToHome.php" style = "text-decoration:none;">
                            <div class="box1">
                                        <div class="title" style = "display:flex; justify-content:center; margin: 20px;">Home</div>
                                        <div class="icon"  style = "display:flex; justify-content:center; font-size: 120px; margin: 20px; margin-top: -10px; color: rgb(114, 111, 111);"><i class='bx bx-store'></i></div>
                                        <div class="info"  style = "display:flex; justify-content:center; margin: 20px; color: rgb(114, 111, 111);">Proceed to Home page..</div>
                            </div>
                        </a>

                        <a href="LoadToStore.php" style = "text-decoration:none;">
                            <div class="box2">
                            <div class="title" style = "display:flex; justify-content:center; margin: 20px;">My Store</div>
                                        <div class="icon"  style = "display:flex; justify-content:center; font-size: 120px; margin: 20px; margin-top: -10px; color: rgb(114, 111, 111);"><i class='bx bx-store'></i></div>
                                        <div class="info"  style = "display:flex; justify-content:center; margin: 20px; color: rgb(114, 111, 111);">Proceed to My Store..</div>
                            </div>
                        </a>

                        <a href="LoadToPending.php" style = "text-decoration:none;">
                            <div class="box3">
                            <div class="title" style = "display:flex; justify-content:center; margin: 20px;">Pending</div>
                                        <div class="icon"  style = "display:flex; justify-content:center; font-size: 120px; margin: 20px; margin-top: -10px; color: rgb(114, 111, 111);"><i class='bx bx-cart-alt' ></i></div>
                                        <div class="info"  style = "display:flex; justify-content:center; margin: 20px; color: rgb(114, 111, 111);">Proceed to Pending Deliveries..</div>
                            </div>
                        </a>

                        <a href="LoadToProfile.php" style = "text-decoration:none;">
                            <div class="box4">
                            <div class="title" style = "display:flex; justify-content:center; margin: 20px;">Profile</div>
                                        <div class="icon"  style = "display:flex; justify-content:center; font-size: 120px; margin: 20px; margin-top: -10px; color: rgb(114, 111, 111);"><i class='bx bx-user' ></i></div>
                                        <div class="info"  style = "display:flex; justify-content:center; margin: 20px; color: rgb(114, 111, 111);">Proceed to Seller Profile..</div>
                            </div>
                        </a>
           </div>

           
    </div>


    <div class="desktop">
    <div class="header">
            <div class="logo">
                <img src="../images/logo.png" alt="logo of the shop">
            </div>

            <a href = "LoadToLogout.php" id = "logout">
            <div class="logoutBtn">
                
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="black" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg>
                    <h5>LOGOUT</h5>
                
            </div>
            </a>    
      </div>
      <div class="main">

          <div class="section1">
                
                    <div class="box">
                        <a href = "LoadToHome.php">
                                <div class="title"> 
                                    Home
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                    
                                is the main or introductory webpage of a website, typically serving as the starting point for users to navigate through the site. It often includes essential information, navigation links.
                                    </div>
                        </a>
                    </div>

                    <div class="box">
                            <a href="LoadToStore.php">
                                <div class="title">
                                  My Store
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-shop" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                A store is a retail establishment or business where goods or services are sold to customers in exchange for money or other forms of payment.
                                
                            </div>
                                </a>
                    </div>
          </div>
          <div class="section2">
            
                    <div class="box">
                        <a href="LoadToPending.php">
                                <div class="title">
                                    Pending Delivery
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                refers to the virtual container where users can add items they wish to purchase while browsing the platform's marketplace.
                                </div>
                        </a>
                    </div>

                    <div class="box">
                        <a href="LoadToProfile.php">
                                 <div class="title">
                                    Seller Profile
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11"/>
                                    </svg>
                                </div>
                                <div class="dis">
                                provides concise information about the organization, company, or individuals behind the products or services offered, including details such as its history, mission, values.
                                </div>
                        s</a>
                    </div>
          </div>

      </div>    
    </div>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
                            function toggleSidebar() {
                                    var sidebarContent = document.getElementById('sidebarContent');
                                        if (sidebarContent) {
                                            if (sidebarContent.style.right === '0px') {
                                                sidebarContent.style.right = '-360px'; // Adjust the value based on the width of your sidebar
                                            } else {
                                                sidebarContent.style.right = '200px';
                                            }
                                        }
                                }



                                                        document.addEventListener('DOMContentLoaded', function () {
                            const menuCheckbox = document.getElementById('menu');

                            menuCheckbox.addEventListener('change', function () {
                                const contentForSidebar = document.querySelector('.contentForSidebar');

                                if (menuCheckbox.checked) {
                                    contentForSidebar.style.left = '-150px';
                                } else {
                                    contentForSidebar.style.left = '-360px';
                                }
                            });
                        });

                    </script>   
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
