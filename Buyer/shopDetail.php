<?php
session_start();
    include("../connection/conn.php");
    include("../includes/buyer_header.php");
    include("../includes/footer.php");
    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store</title>
    <link rel="stylesheet" href="../Buyer_Design/shopDetail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>

<div class = "mobileView">
    <div class="sidebar">
            <div class="menu" style = "position:fixed; z-index: 20;">
                <input type="checkbox" id = "menu" hidden>
                <label for="menu"><i class='bx bx-menu'></i></label>
                        <label for = "searchDataForMobile"><i class='bx bx-search-alt'style="position:absolute; left: 150px;z-index: 10; font-size: 35px; color:black; top: 11px;"></i></label>
                        <input type = "text" id = "searchDataForMobile" name = "searchDataForMobile" class = "form-control" style="width: 200px; height: 40px; position: absolute; right: 10px; top:8px; padding-left: 30px;">
                <div class="contentForSidebar">
                <div class="containerS" style=" height: 100vh; margin-top: 50px;">
                    <a href="LoadToUserDashboard.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">DASHBOARD</a>
                    <a href="LoadToHome.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 70px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">HOME</a>
                    <a href="LoadToStore.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 140px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">STORE</a>
                    <a href="LoadToMyCart.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 210px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">CART</a>
                    <a href="LoadToMyProfile.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 280px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PROFILE</a>
                    <a href="LoadToLogout.php" style="color: black; background-color: red; color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; bottom: 10px; margin-top: 350px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">LOGOUT</a>
                </div>
                </div>

                
            </div>
            
           </div>
        <div class="content" style = "margin-top: 80px;" >
                    <div class = "contain">
                                <!-- item list for mobile -->
                                <div class="searchItemsForMobile" id = "searchItemsForMobile" style = "margin-left: 8px;">
                                     <!-- search items from the database -->
                                 </div>

                               
                                
                    </div>
        </div>
    </div>



<div class="destop">
        
<div id="top" style = "position: absolute; top: 0;"></div>

<div class="header2" style = "position: fixed; top: 0; z-index: 3000; width: 1000px;">
    <h4 style = "color: black;">
        <?php    echo $_GET['shopName'];  ?>  's STORE
    </h4>
</div>

<div class="container"> 
<a href = "store.php" class = "btn btn-danger" style = " box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Back to list of Store</a>




<!-- end sa notification sa add items -->


    <div class="itemsInTheShop" id = "itemsInTheShop" style = "margin-top: 20px; margin-left: 25px; overflow-x: hidden;">
        <!-- automatically regenrated kay naa tay code sa seller ajax -->
    </div>


    <div class  = "container-fluid" style = "margin-top: 30px; font-size: 30px; color: rgb(133, 129, 129);">
        
        <div class = "store" style = "margin-left: 35%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="rgb(133, 129, 129)" class="bi bi-search" viewBox="0 0 16 16" style = "margin-left: 30px;">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                 Search More Product
        </div>

        <div class = "info" style = "width: 97vw; border:rgb(133, 129, 129) solid 1px; margin-top: 10px; margin-left: -10px; margin-bottom: 60px;"></div>
        <div class = "info" style = "width: 97vw;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: -50px; border-radius: 10px; font-size: 16px; height: 200px; padding: 28px; display:flex; margin-left: -15px; margin-bottom: 150px;">
                

            <div class = "t1">
                             Project: E Cloth All in Shopper Management System<br>
                            Programmer: Ejie Cabales Florida<br>
                            Course: Bachelor of Science in Information Technology<br>
                            Year: 2nd Year<br>
                            Section: BSIT-201<br>   
                            School: Southern Leyte State University<br>
                    </div>

                    <div class = "t2" style = "margin-left: 300px;">
                            Gmail: ejieflorida128@gmail.com or ejieflorida000@gmail.com<br>
                            Contact Number: 09125081976 <br>
                            GIthub: https://github/ejieflorida128<br>
                            Facebook: https://facebook/ejieflorida14<br>
                            Instagram: https://instagram/Code-ejiePrimaryKeysDupss<br>
                            Online Database: sql6.freesqldatabase.com<br>

                    </div>
                
    </div>
</div>






</div>

<div class="functions">
<a href="#top">
        <div class="returnTop">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
        <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0"/>
        </svg>
        </div>
</a>
</div>
</div>


<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>





        <script>   

                    $(document).ready(function () {
                        DisplayAllItemsInTheShops(null);
                        DisplayAllItemsInTheShopsMobile(null);
                            $("#searchData").on('input', function () {
                                var value = $(this).val();

                                DisplayAllItemsInTheShops(value);
                                DisplayAllItemsInTheShopsMobile(value);
                            });         
                        });

                        $(document).ready(function () {
                        
                        DisplayAllItemsInTheShopsMobile(null);
                            $("#searchDataForMobile").on('input', function () {
                                var value = $(this).val();

                               
                                DisplayAllItemsInTheShopsMobile(value);
                            });         
                        });
        
                    function refreshIfClose(){
                                $(document).ready(function(){
                                    DisplayAllItemsInTheShops(null);
                                    DisplayAllItemsInTheShopsMobile(null);
                                });
                    }



                    



        
             function DisplayAllItemsInTheShops(ItemSearchValue) {
                    $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                            ItemsSearchInTheCurrentShop: true,
                            ItemSearchValue: ItemSearchValue,
                            SelectedShop: '<?php echo $_GET['shopName']; ?>'
                        },
                        success: function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#itemsInTheShop').html(data);                       
                        }
                    });
                }


                function DisplayAllItemsInTheShopsMobile(ItemSearchValue) {
                    $.ajax({
                        url: "../ajax/buyer_ajax.php",
                        type: 'post',
                        data: {
                            ItemsSearchInTheCurrentShopForMobile: true,
                            ItemSearchValue: ItemSearchValue,
                            SelectedShop: '<?php echo $_GET['shopName']; ?>'
                        },
                        success: function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#searchItemsForMobile').html(data);                       
                        }
                    });
                }

        </script>

        
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