<?php
    session_start();
    include("../includes/seller_header.php");
    include("../includes/footer.php");
    include("../connection/conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
    <link rel="stylesheet" href="../Seller_Design/viewItem.css">
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


<!-- modals -->

<div class="modal" tabindex="-1" id = "modalForDeletion" style = "margin-top: 120px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        
        
      </div>
      <div class="modal-body">
        <p>Item is successfully Deleted!</p>
      </div>
      <div class="modal-footer">
            <a href="store.php" class = "btn btn-danger">CLOSE</a>
        
      </div>
    </div>
  </div>
</div>






<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style = "position:relative; top: 190px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <label for="item_Name">Item Name:</label><br>   
              <input type="text" id = "item_Name" class = "form-control">
              <label for="item_Price">Item Price:</label><br>
              <input type="text" id = "item_Price" class = "form-control">       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick = "EditItemFromTheSelectedShop()">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div class="sidebar">
            <div class="menu" style = "position:fixed; z-index: 20;">
                  <h2 style = "font-weight: bold; margin-top: 12px;">INFORMATION</h2>
                <!-- <input type="checkbox" id = "menu" hidden>
                <label for="menu"><i class='bx bx-menu'></i></label>
                <div class="contentForSidebar">
                <div class="container" style=" height: 100vh; margin-top: 50px;">
                    <a href="LoadToSellerDashboard.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">DASHBOARD</a>
                    <a href="LoadToHome.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 70px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">HOME</a>
                    <a href="LoadToStore.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 140px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">MY STORE</a>
                    <a href="LoadToPending.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 210px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PENDING</a>
                    <a href="LoadToProfile.php" style="color: black; background-color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; margin-top: 280px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">PROFILE</a>
                    <a href="LoadToLogout.php" style="color: black; background-color: red; color: white; padding: 15px; font-weight: bold; position: absolute; left: 170px; bottom: 10px; margin-top: 350px; width: 160px; display: flex; justify-content:center; border-radius: 10px;">LOGOUT</a>
                </div>
                </div> -->

                
            </div>
            
           </div>
        <div class="content" style = "margin-top: 80px;" >
                    <div class = "contain">
                            <?php
                            $id = $_GET['ItemId'];
                                $sql = "SELECT * FROM items WHERE id = $id";
                                $query = mysqli_query($connforMyOnlineDb,$sql);

                                while($test = mysqli_fetch_assoc($query)){

                             
                            ?>
                               
                            <div class="forItemPicture" style = "display:flex; justify-content: center;">
                                <img src="<?php echo $test['img']?>" alt="item picture" style="width: 100vw; height: 50vh; display:flex; justify-content:center; ">
                            </div>
                            <div class="moreInformation">
                                <p style = "font-weight: bold; letter-spacing: 2px; margin: 5px; font-size: 11px; color: rgb(92, 104, 116);"><?php  echo $test['item_source']; ?></p>
                                <h4 style = "font-weight:bold; letter-spacing: 2px; margin:5px; font-size: 22px; color: rgb(92, 104, 116);"><?php echo $test['item_name']; ?></h4>
                                <h4 style = "font-weight:bolder; letter-spacing: 2px; margin:5px; font-size: 35px; color:rgb(28, 90, 148); "><?php  echo $test['item_price'] ?></h4>
                                <a href="rating_analysis.php?item_id=<?php  echo $test['id']; ?>">

                                <div class="rate" style = "margin-left: 10px;">
                                <?php
                                      $selectAllRatingCondition = "SELECT * FROM irate_ratings WHERE item_id = $id";
                                      $check = mysqli_query($connforMyOnlineDb, $selectAllRatingCondition);

                                      $totalnumberofrating = 0;
                                      $totaluserRate = 0;

                                      while ($test = mysqli_fetch_assoc($check)) {
                                          $totaluserRate++;
                                          $totalnumberofrating += $test['rate'];
                                      }

                                      if ($totaluserRate == 0) {
                                          $rateOfanItem = 0;
                                      } else {
                                          $rateOfanItem = round($totalnumberofrating / $totaluserRate, 1);
                                      }
                      
                                     
                                    
                                         

                                      if($rateOfanItem == 1){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                        </svg>';
                                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>';
                                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>';
                                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>';
                                      }else if($rateOfanItem >= 1.1 && $rateOfanItem <= 1.9){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
                                    <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
                                  </svg>';
                                  echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
    
                                      }else if ($rateOfanItem == 2){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>';
                                                    echo'<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>';
                                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>';
                                      }else if($rateOfanItem >= 2.1 && $rateOfanItem <= 2.9){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
                                <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
                              </svg>';
                              echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                     
                                      }else if($rateOfanItem == 3){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
    
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>';
                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>';
                                      } else if ($rateOfanItem >= 3.1 && $rateOfanItem <= 3.9){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
                            <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
                          </svg>';
                          echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                   
                                      }else if($rateOfanItem == 4){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                      </svg>';
                                      
                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                      } else if($rateOfanItem >= 4.1 && $rateOfanItem <= 4.9){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>';
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
                        <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
                      </svg>';
                                     
                                      }else if($rateOfanItem == 5){
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>';
                            echo'<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>';
                        
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>';
                                      }
                               
    
                                    if($rateOfanItem == 0) {
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                      </svg>';
                                                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                  </svg>';
                                                  echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                              </svg>';
                                              echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                              <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>';
                                          echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>';
                            }
                                      ?>

                                </div>
                                </a>
                            </div>
                           
                            <div class="footerForMobile">
                                    <div class="moreInfor" style = "display:flex;">
                                    <a href = "../Seller/store.php" class = "btn btn-primary" style="margin-top: 0px; height: 60px; margin-top: 10px; margin-left: 10px; width: 100px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); align-items:center; padding: 18px;">Back</a>
                                    <button class = "btn btn-danger" id = "forDeleteItem" onclick = "deleteItemFromTheSelectedShop()" style="margin-top: 0px; height: 60px; margin-top: 10px; margin-left: 10px;">DELETE</button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EditModal" style="margin-top: 0px; height: 60px; margin-top: 10px; margin-left: 10px;" onclick = "openEditBoxWithValues()">
                                    Edit Information
                                    </button>
                                    </div>
                            </div>

                            


                            <?php
                               }
                            ?>
                                
                    </div>
        </div>
    </div>


<div class="main">
    <a href = "store.php?" class = "btn btn-danger" style = "position:relative; top: 90px; left: 10px;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Back to Store</a>
         
    <div class="container">

    <div class="section1">
            <?php
             $idOfaItem = $_GET['ItemId']; 
             

             $sql = "SELECT img FROM items WHERE id = $idOfaItem";
             $query = mysqli_query($connforMyOnlineDb,$sql);

             while($findTheImageId = mysqli_fetch_assoc($query)){
              

                    echo'
                            <img src = '.$findTheImageId['img'].' style = "width: 300px; height: 300px; margin-top: 150px; margin-left: -50px; border-radius:20px;box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);  ">
                    ';
             }
            
            ?>
        </div>


        <div class="section2">
            
          
                    <?php

                            $idOfaItem = $_GET['ItemId'];

                            
              $selectAllRatingCondition = "SELECT * FROM irate_ratings WHERE item_id = $idOfaItem";
              $check = mysqli_query($connforMyOnlineDb,$selectAllRatingCondition);
  
            
              $totalnumberofrating = 0;
              $totaluserRate = 0;
  
              while($test = mysqli_fetch_assoc($check)){
  
                
                    $totaluserRate++;
                    $totalnumberofrating+=$test['rate'];
                    
  
              }
  
             if($totalnumberofrating == 0){
                  $rateOfanItem = 0;
             }else{
                  $rateOfanItem = round($totalnumberofrating / $totaluserRate,1);
             }
            
                 $div='
             
               <a href = "rating_analysis.php?item_id='.$idOfaItem.'">
                <div style ="font-size: 25px; position: absolute; top: 160px; left: 30px;">';  

                if($rateOfanItem == 1){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>';
                                        $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>';
                                $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>';
                            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>';
                  }else if($rateOfanItem >= 1.1 && $rateOfanItem <= 1.9){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>';
                $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
                <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
              </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';

                  }else if ($rateOfanItem == 2){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>';
                                $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>';
                            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>';
                  }else if($rateOfanItem >= 2.1 && $rateOfanItem <= 2.9){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>';
                $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>';
            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
            <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
          </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                 
                  }else if($rateOfanItem == 3){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';

                            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>';
                        $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>';
                  } else if ($rateOfanItem >= 3.1 && $rateOfanItem <= 3.9){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>';
                $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>';
            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
        </svg>';
        $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
        <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
      </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
               
                  }else if($rateOfanItem == 4){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>';
                  
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>';
                  } else if($rateOfanItem >= 4.1 && $rateOfanItem <= 4.9){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>';
                $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>';
            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
        </svg>';
        $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
    </svg>';
    $div.= '    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-half" viewBox="0 0 16 16">
    <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
  </svg>';
                 
                  }else if($rateOfanItem == 5){
                    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>';
                $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>';
            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
        </svg>';
        $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
    </svg>';
    
    $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>';
                  }
           

                if($rateOfanItem == 0) {
                            $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                  </svg>';
                                  $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                              </svg>';
                              $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                              <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>';
                          $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg>';
                        $div.= '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>';
        }   

        $div .='</a>';

                            echo '
                            
                                     <div style ="font-size: 25px; position: absolute; top: 50px; left: 350px;">

                                      '.$div.'

                            </div>
                            ';

                            $sqlForDisplayingDatas = "SELECT * FROM items WHERE id = $idOfaItem";
                            $queryForDispayingDatas = mysqli_query($connforMyOnlineDb,$sqlForDisplayingDatas);

                            while($DisplayData = mysqli_fetch_assoc($queryForDispayingDatas)){
                                    echo'
                                    
                                        <h4 style = "margin-top: 230px; margin-left: 30px; color: rgb(114, 111, 111);">'.$DisplayData['item_name'].'</h4>
                                        <h4 style = "margin-top: 10px; margin-left: 30px; color: rgb(114, 111, 111);">'.$DisplayData['item_price'].'</h4>
                                        <h4 style = "margin-top: 10px; margin-left: 30px; color: rgb(114, 111, 111);">'.$DisplayData['item_source'].'</h4>


                                    
                                    ';
                            }

                    ?>

                    <button class = "btn btn-danger" id = "forDeleteItem" onclick = "deleteItemFromTheSelectedShopD()">DELETE</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EditModalD" style = "margin-top: 30px;" onclick = "openEditBoxWithValuesD()">
                    Edit Information
                    </button>


                    <!-- modals -->

<div class="modal" tabindex="-1" id = "modalForDeletionD" style = "margin-top: 120px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        
        
      </div>
      <div class="modal-body">
        <p>Item is successfully Deleted!</p>
      </div>
      <div class="modal-footer">
            <a href="store.php" class = "btn btn-danger">CLOSE</a>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditModalD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <label for="item_Name">Item Name:</label><br>   
              <input type="text" id = "item_NameD" class = "form-control">
              <label for="item_Price">Item Price:</label><br>
              <input type="text" id = "item_PriceD" class = "form-control">       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick = "EditItemFromTheSelectedShopD()">Save changes</button>
      </div>
    </div>
  </div>
</div>







<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <label for="item_Name">Item Name:</label><br>   
              <input type="text" id = "item_Name" class = "form-control">
              <label for="item_Price">Item Price:</label><br>
              <input type="text" id = "item_Price" class = "form-control">       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick = "EditItemFromTheSelectedShop()">Save changes</button>
      </div>
    </div>
  </div>
</div>

         

        </div>




        <div class="lineSeperator"></div>


        <div class="section3">
                        
        <div class="sec1">
                             <div class="facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="rgb(114, 111, 111)" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                    </svg>
                            </div>

                            <div class="messanger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="rgb(114, 111, 111)" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                    <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                    </svg>
                            </div>
        </div>

        <div class="sec2">
                            <div class="email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="rgb(114, 111, 111)" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                    <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                                    <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                                    </svg>
                            </div>

                            <div class="instagram">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="rgb(114, 111, 111)" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                    </svg>
                            </div>
        </div>

        <div class="sec3" style = "margin-top: 20px;">
            <div class = "informations">
            <h6>please contact me for more informations:</h6> 
                    <span><h6>09125081976</h6></span>
                    <span><h6>ejieflorida128@gmail.com</h6></span>
                        </div>
          
        </div>
                          

                          

                            
                    
        </div>

    </div>
      


</div>







<script>


                        
                    function refreshIfClose(){
                                $(document).ready(function(){
                                  location.reload();
                                });
                    }


                    function deleteItemFromTheSelectedShop() {  
                        $.ajax({
                            url: "../ajax/seller_ajax.php",
                            type: 'post',
                            data: {
                                clickForDelete: true,
                                deleteThisItem: '<?php echo $_GET['ItemId']; ?>'
                            },
                            success: function (data, status) {
                                console.log("clicked!");
                                // Handle success response if needed

                                $('#modalForDeletion').modal('show');
                            }
                        });
                    }

                    function deleteItemFromTheSelectedShopD() {  
                        $.ajax({
                            url: "../ajax/seller_ajax.php",
                            type: 'post',
                            data: {
                                clickForDelete: true,
                                deleteThisItem: '<?php echo $_GET['ItemId']; ?>'
                            },
                            success: function (data, status) {
                                console.log("clicked!");
                                // Handle success response if needed

                                $('#modalForDeletionD').modal('show');
                            }
                        });
                    }



                    function openEditBoxWithValues(){

                            var id =  '<?php echo $_GET['ItemId']; ?>';
                          
                            $.post("../ajax/seller_ajax.php", { editIdForTheSelectedItem:id}, function(data, status) {
                              console.log(data); // Log the raw response to the console

                              var SelectedItemDatas = JSON.parse(data);

                              $('#item_Name').val(SelectedItemDatas.item_name);
                              $('#item_Price').val(SelectedItemDatas.item_price);
                              
                            
                          });
                    }

                    function openEditBoxWithValuesD(){

var id =  '<?php echo $_GET['ItemId']; ?>';

$.post("../ajax/seller_ajax.php", { editIdForTheSelectedItem:id}, function(data, status) {
  console.log(data); // Log the raw response to the console

  var SelectedItemDatas = JSON.parse(data);

  $('#item_NameD').val(SelectedItemDatas.item_name);
  $('#item_PriceD').val(SelectedItemDatas.item_price);
  

});
}


                    function EditItemFromTheSelectedShop() {  

                      var itemName = $('#item_Name').val();
                      var itemPrice = $('#item_Price').val();


                        $.ajax({
                            url: "../ajax/seller_ajax.php",
                            type: 'post',
                            data: {
                                clickForEdit: true,
                                item_name:itemName,
                                item_price:itemPrice,
                                EditThisItem: '<?php echo $_GET['ItemId']; ?>'
                            },
                            success: function (data, status) {
                                console.log("clicked!");
                                // Handle success response if needed

                                refreshIfClose();

                                // $('#modalForDeletion').modal('show');
                            }
                        });
                    }


                    function EditItemFromTheSelectedShopD() {  

var itemName = $('#item_Name').val();
var itemPrice = $('#item_Price').val();


  $.ajax({
      url: "../ajax/seller_ajax.php",
      type: 'post',
      data: {
          clickForEdit: true,
          item_name:itemName,
          item_price:itemPrice,
          EditThisItem: '<?php echo $_GET['ItemId']; ?>'
      },
      success: function (data, status) {
          console.log("clicked!");
          // Handle success response if needed

          refreshIfClose();

          // $('#modalForDeletion').modal('show');
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