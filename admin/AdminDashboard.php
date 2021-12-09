<?php
session_start();
//Storing users info in session variable

if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    header("location:login.php"); // redirects to viewbooking page
        exit;   
}
if(isset($_SESSION['house'])) {
    $house = $_SESSION['house'];
} else {
    header("location:login.php"); // redirects to viewbooking page
        exit;  
}
?>
<?php 
                  ob_start(); 
                  include "dbconnect.php"; // Using database connection file here
                  ob_end_clean();
                  //Code for adding house equipment
                  if(isset($_POST['equipment'])){
                    $ename = $_POST['ename'];
                    $estatus = $_POST['estatus'];
                    $insert = mysqli_query($db,"INSERT INTO `equipment`(`Equipment_Name`,`Equipment_Status`, `House_Id`) VALUES ('$ename','$estatus','$house') ");
                    if($insert){
                      header("location:AdminDashboard.php"); 
                        exit;  
                      echo "Equipment Added Successfully";
                    }
                    else{
                      header("location:AdminDashboard.php"); 
                        exit;  
                      echo"Equipment not added";
                    }
                  }
                  ?>
                   <?php 
                  ob_start(); 
                  include "dbconnect.php"; // Using database connection file here
                  ob_end_clean();
                  //Code for allocating chores
                  if(isset($_POST['chores'])){
                    $name = $_POST['selectname'];
                    $chore = $_POST['selectchore'];
                    $equipment = $_POST['selectequip'];
                    $date = $_POST['dat'];
                    $insert = mysqli_query($db,"INSERT INTO `resident_chores`(`Resident_Id`,`Chore_Id`,`Equipment_Id`,`Date`,`Task_Complete`, House_Id) VALUES ('$name','$chore', '$equipment','$date', 'No','$house') ");
                    if ($insert) {
                       header("location:AdminDashboard.php"); 
                        exit;  
                      echo "Chore Allocated Successfully";
                    }
                    else{
                      header("location:AdminDashboard.php"); 
                        exit;  
                      echo "Chore not allocated";
                    }
                   

                    }
                  ?>
                   <?php 
                  ob_start(); 
                  include "dbconnect.php"; // Using database connection file here
                  ob_end_clean();
                  //Code for  adding chore
                  if(isset($_POST['chore'])){
                    $cname=$_POST['cname'];
                    $cdescrip=$_POST['cdescrip'];
                    $insert = mysqli_query($db,"INSERT INTO `chores`(`Chore_Name`,`Chore Description`, `House_Id`) VALUES ('$cname','$cdescrip','$house') ");
                    if($insert){
                      header("location:AdminDashboard.php"); 
                        exit;  
                      echo "Chore Added Successfully";
                    }
                    else{
                      header("location:AdminDashboard.php"); 
                        exit;  
                      echo"Chore not added";
                    }
                  }
                  ?>
                   <?php 
                  ob_start(); 
                  include "dbconnect.php"; // Using database connection file here
                  ob_end_clean();
                  //Code for adding members
                  if(isset($_POST['member'])){
                    $name = $_POST['name'];
                    $phone = $_POST['telephone'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $status = $_POST['status'];
                    $dob = $_POST['date'];
                    $gender = $_POST['gender'];
                    $insert = mysqli_query($db,"INSERT INTO `residents`(`Resident_Name`,`House_Id`,`Age`,`Resident_Status`,`House_Head`,`Gender`,`Email`,`Telephone`,`Date_of_Birth`) VALUES ('$name','$house', '$age','$status','No','$gender','$email','$phone','$dob') ");
                    if ($insert) {
                      header("location:AdminDashboard.php"); 
                        exit;  
                      echo "Member Added Successfully";
                    }
                    else{
                      header("location:AdminDashboard.php"); 
                        exit;  
                      echo "Member not added";
                    }
                   

                    }
                  ?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="WelcomeName">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>AdminDashboard</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="AdminDashboard.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="AdminDashboard">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <section class="u-clearfix u-image u-section-1" id="carousel_8964" data-image-width="1000" data-image-height="827">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-default u-image-1" src="images/choresuplogo.png" alt="" data-image-width="2602" data-image-height="855">
        <a href="logout.php" class="u-active-palette-1-dark-1 u-border-none u-btn u-button-style u-hover-palette-1-dark-1 u-btn-1" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-container-style u-list-item u-repeater-item u-white u-list-item-1">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span class="u-icon u-icon-circle u-palette-5-light-2 u-spacing-18 u-text-palette-5-dark-2 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 24 24" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-d74e"></use></svg><svg class="u-svg-content" viewBox="0 0 24 24" id="svg-d74e"><path d="m18.5 24h-9c-.276 0-.5-.224-.5-.5v-3.325l-2.414.733c-.159.059-.365.092-.586.092-1.103 0-2-.897-2-2v-3h-2c-.561 0-1-.439-1-1 0-.188.055-.373.157-.536l2.336-3.708c.332-.526.507-1.132.507-1.753 0-4.965 4.037-9.003 9-9.003s9 4.038 9 9c0 1.858-.565 3.646-1.636 5.17-.892 1.269-1.364 2.758-1.364 4.305v5.025c0 .276-.224.5-.5.5zm-8.5-1h8v-4.525c0-1.754.534-3.441 1.546-4.88.951-1.354 1.454-2.943 1.454-4.595 0-4.411-3.589-8-8-8s-8 3.589-8 8c0 .813-.229 1.604-.661 2.289l-2.336 3.708 2.497.003c.276 0 .5.224.5.5v3.5c0 .552.448 1 1 1 .104 0 .196-.014.271-.041l3.084-.938c.152-.045.316-.017.443.077s.202.244.202.402z"></path><path d="m14.5 16h-2c-.481 0-1-.369-1-1.18v-1.32c0-.586-.253-1.122-.676-1.433-1.17-.861-1.852-2.238-1.823-3.682.046-2.383 2.034-4.35 4.433-4.385 1.215-.04 2.369.443 3.235 1.296.858.847 1.331 1.975 1.331 3.176 0 1.422-.658 2.728-1.806 3.582-.434.323-.694.866-.694 1.453v1.493c0 .552-.448 1-1 1zm-1-11c-.018 0-.035 0-.053 0-1.833.026-3.412 1.585-3.446 3.404-.022 1.12.507 2.188 1.416 2.857.678.5 1.083 1.336 1.083 2.239v1.32c0 .149.036.198.036.198l1.964-.018v-1.493c0-.901.41-1.745 1.098-2.255.89-.664 1.402-1.677 1.402-2.78 0-.932-.367-1.806-1.033-2.463-.661-.652-1.535-1.009-2.467-1.009z"></path><path d="m15 14h-3c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h3c.276 0 .5.224.5.5s-.224.5-.5.5z"></path></svg></span>
                <h5 class="u-text u-text-default u-text-1">ALLocate chores</h5>
                <a href="AdminDashboard.html#sec-15a2" data-page-id="208602454" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-black u-border-hover-grey-60 u-btn u-button-style u-hover-none u-none u-text-body-color u-btn-2">GO</a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-repeater-item u-white u-list-item-2">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2"><span class="u-icon u-icon-circle u-palette-5-light-2 u-spacing-18 u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 128 128" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-746a"></use></svg><svg class="u-svg-content" viewBox="0 0 128 128" id="svg-746a"><path d="M58,128H10a2,2,0,0,1-2-1.87l-4-64A2,2,0,0,1,6,60H62a2,2,0,0,1,2,2.13l-4,64A2,2,0,0,1,58,128Zm-46.12-4H56.12l3.75-60H8.13Z"></path><path d="M66,64H2a2,2,0,0,1,0-4H66a2,2,0,0,1,0,4Z"></path><path d="M60,83.59a20.35,20.35,0,0,1-9.64-2.18,16.54,16.54,0,0,0-8-1.82,16.48,16.48,0,0,0-8,1.82,20.47,20.47,0,0,1-9.64,2.18,20.47,20.47,0,0,1-9.64-2.18,16.54,16.54,0,0,0-8-1.82,2,2,0,1,1,0-4,20.47,20.47,0,0,1,9.64,2.18,16.36,16.36,0,0,0,8,1.82,16.42,16.42,0,0,0,8-1.82,20.47,20.47,0,0,1,9.64-2.18A20.47,20.47,0,0,1,52,77.77a16.42,16.42,0,0,0,8,1.82,2,2,0,0,1,0,4Z"></path><path d="M94,73H82a2,2,0,0,1-2-2V8A8,8,0,0,1,96,8V71A2,2,0,0,1,94,73ZM84,69h8V8a4,4,0,0,0-8,0Z"></path><path d="M79,93a2,2,0,0,1-2-2V71a2,2,0,0,1,2-2H97a2,2,0,0,1,2,2V82a2,2,0,0,1-4,0V73H81V91A2,2,0,0,1,79,93Z"></path><path d="M122.62,121.83h-.15c-.59,0-14.51-1.1-22.43-3.08-8.35-2.09-16.37-11-16.71-11.41a2,2,0,0,1,3-2.66c.08.09,7.54,8.4,14.69,10.19,7.59,1.89,21.62,3,21.76,3a2,2,0,0,1-.15,4Z"></path><path d="M114.26,107a2,2,0,0,1-1-.29c-14.63-9-35.19-10.49-35.4-10.5A2,2,0,0,1,76,94.1a2,2,0,0,1,2.14-1.85c.88.06,21.76,1.61,37.21,11.08a2,2,0,0,1-1,3.7Z"></path><path d="M120.47,114.94a2,2,0,0,1-1.66-.88c-.11-.17-11.39-16.74-22.89-20.88a89.71,89.71,0,0,0-13.81-3.3,2,2,0,1,1,.6-4,92.8,92.8,0,0,1,14.57,3.5C110,94,121.64,111.1,122.13,111.82a2,2,0,0,1-1.66,3.12Z"></path><path d="M108.75,128c-10,0-21.44-1.94-28.77-9.27a22.13,22.13,0,0,1,0-31.28h0a22.15,22.15,0,0,1,31.28,0c6.32,6.32,8.53,14.9,10.49,22.47.17.65.33,1.31.5,1.95l5,4a2,2,0,0,1,.75,1.5,4.25,4.25,0,0,1-2.61,3.84,19.43,19.43,0,0,0,1.22,2.18,2,2,0,0,1-1.32,3A94.08,94.08,0,0,1,108.75,128ZM82.81,90.26a18.12,18.12,0,0,0,0,25.62c9.87,9.87,28.89,8.61,39,7.07-.37-.74-.71-1.54-1-2.39a2,2,0,0,1,.17-1.8,2,2,0,0,1,1.55-.92,5,5,0,0,0,.72-.11l-4-3.17a2,2,0,0,1-.68-1l-.69-2.62c-1.91-7.42-3.89-15.09-9.44-20.64a18.12,18.12,0,0,0-25.62,0ZM124,117.31Z"></path><path d="M120.49,115h-.18a84.9,84.9,0,0,1-13.18-2.25c-5.33-1.57-7.83-3.86-8.09-4.12a2,2,0,1,1,2.77-2.88,17.24,17.24,0,0,0,6.45,3.16A83.39,83.39,0,0,0,120.67,111a2,2,0,0,1-.18,4Z"></path></svg></span>
                <h5 class="u-text u-text-default u-text-2"> Equipment</h5>
                <a href="AdminDashboard.html#carousel_0eac" data-page-id="208602454" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-black u-border-hover-grey-60 u-btn u-button-style u-hover-none u-none u-text-body-color u-btn-3">GO</a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-repeater-item u-white u-list-item-3">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3"><span class="u-icon u-icon-circle u-palette-5-light-2 u-spacing-18 u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 64 64" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c803"></use></svg><svg class="u-svg-content" viewBox="0 0 64 64" id="svg-c803"><g id="Layer_20"><path d="M22,31A14,14,0,1,1,36,17,14,14,0,0,1,22,31ZM22,5A12,12,0,1,0,34,17,12,12,0,0,0,22,5Z"></path><path d="M42,31V29A12,12,0,0,0,42,5V3a14,14,0,0,1,0,28Z"></path><path d="M43,61H1a1,1,0,0,1-1-1V51a22,22,0,0,1,44,0v9A1,1,0,0,1,43,61ZM2,59H42V51A20,20,0,0,0,2,51Z"></path><path d="M63,61H47V59H62V51A20,20,0,0,0,42,31V29A22,22,0,0,1,64,51v9A1,1,0,0,1,63,61Z"></path>
</g></svg></span>
                <h5 class="u-text u-text-default u-text-3">members</h5>
                <a href="AdminDashboard.html#carousel_3b70" data-page-id="208602454" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-black u-border-hover-grey-60 u-btn u-button-style u-hover-none u-none u-text-body-color u-btn-4">GO</a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-repeater-item u-white u-list-item-4">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4"><span class="u-icon u-icon-circle u-palette-5-light-2 u-spacing-18 u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-746a"></use></svg><svg class="u-svg-content" viewBox="0 0 512 512" id="svg-ca32" style="enable-background:new 0 0 512 512;"><path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"></path></svg></span>
                <h5 class="u-text u-text-default u-text-4">CHORES</h5>
                <a href="AdminDashboard.html#carousel_92d2" data-page-id="208602454" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-black u-border-hover-grey-60 u-btn u-button-style u-hover-none u-none u-text-body-color u-btn-5">GO</a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-repeater-item u-white u-list-item-5">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-5"><span class="u-icon u-icon-circle u-palette-5-light-2 u-spacing-18 u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-ca32"></use></svg><svg class="u-svg-content" viewBox="0 0 512 512" id="svg-ca32" style="enable-background:new 0 0 512 512;"><path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"></path></svg></span>
                <h5 class="u-text u-text-default u-text-5">Search</h5>
                <a href="Search.php" data-page-id="2260304530" class="u-active-none u-align-center u-border-1 u-border-active-grey-60 u-border-black u-border-hover-grey-60 u-btn u-button-style u-hover-none u-none u-text-body-color u-btn-6">GO</a>
              </div>
            </div>
          </div>
        </div>
        <div class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-container-style u-group u-white u-group-1">
          <div class="u-container-layout u-container-layout-6">
            <h2 class="u-custom-font u-font-raleway u-text u-text-6">Welcome<br><?php
        ob_start();
       include "dbconnect.php"; // Using database connection file here
        ob_end_clean();
        $insert = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email') ");
        while($data = mysqli_fetch_array($insert)){
          echo $data['Resident_Name'];
        }
       
?><br>
            </h2>
            <h4 class="u-text u-text-7">You are the house head of the <?php
        ob_start();
       include "dbconnect.php"; // Using database connection file here
        ob_end_clean();
        $insert = mysqli_query($db,"SELECT * from `house` WHERE (`House_Id`='$house') ");
        while($data = mysqli_fetch_array($insert)){
          echo $data['House_Name'];
        }
       
?> House.</h4>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-15a2">
      <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
            <div class="u-align-center u-container-style u-layout-cell u-palette-5-dark-3 u-size-30 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <h6 class="u-text u-text-default u-text-palette-1-base u-text-1">ALLOCATE CHORES</h6>
                <div class="u-form u-form-1">
                  <form  method="POST" >
                    <div class="u-form-group u-form-select u-form-group-1">
                      <label for="select-836a" class="u-label">Resident Name</label>
                      <div class="u-form-select-wrapper">
                        <select id="select-836a" name="selectname" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                          <option value="Select your house member">Select your house member</option>
                           <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
        $records = mysqli_query($db,"SELECT * FROM `residents` WHERE `House_Id`='$house' AND Resident_Status='Active' AND House_head='No' "); // fetch data from database
        
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>  <option value="<?php echo $data['Resident_Id'];?>"><?php echo $data['Resident_Name'];?></option>
<?php
}


?>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                    <div class="u-form-group u-form-select u-form-group-2">
                      <label for="select-f88e" class="u-label">Chore</label>
                      <div class="u-form-select-wrapper">
                        <select id="select-f88e" name="selectchore" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                          <option value="Allocate a chore">Allocate a chore</option>
                           <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
        $records = mysqli_query($db,"SELECT * FROM `chores` WHERE `House_Id`='$house' "); // fetch data from database
        
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>  <option value="<?php echo $data['Chore_Id'];?>"><?php echo $data['Chore_Name'];?></option>
<?php
}


?>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                    <div class="u-form-group u-form-select u-form-group-3">
                      <label for="select-dc64" class="u-label">Equipment</label>
                      <div class="u-form-select-wrapper">
                        <select id="select-dc64" name="selectequip" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                          <option value="Select required equipment">Select required equipment</option>
                            <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
        $records = mysqli_query($db,"SELECT * FROM `equipment` WHERE `House_Id`='$house' AND Equipment_Status='Functional' "); // fetch data from database
        
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>  <option value="<?php echo $data['Equipment_Id'];?>"><?php echo $data['Equipment_Name'];?></option>
<?php
}


?>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                    <div class="u-form-group u-form-group-4">
                      <label for="text-4e71" class="u-label">Date</label>
                      <input type="text" placeholder="YYYY-MM-DD" id="text-4e71" name="dat" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required oninvalid="this.setCustomValidity('Invalid date format')" oninput="this.setCustomValidity('')"  >
                    </div>
                    <div class="u-align-left u-form-group u-form-submit">
                      <input type="submit" name="chores" value="Allocate Chores" class="u-active-grey-80 u-border-none u-btn u-btn-submit u-button-style u-hover-grey-80 u-palette-1-base u-btn-1" class="u-form-control-hidden">
                    </div>
                      
                  </form>
                </div>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-valign-middle u-container-layout-2"><span class="u-icon u-icon-circle u-text-palette-1-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 20 19.84" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-beeb"></use></svg><svg class="u-svg-content" viewBox="0 0 20 19.84" id="svg-beeb"><path d="M13.85,12a.39.39,0,0,0-.16.51,5.28,5.28,0,0,1,.57,2.06H3.52a5.39,5.39,0,0,1,2.64-4.26A2.84,2.84,0,0,0,8.68,12a2.85,2.85,0,0,0,2.59-1.91,5.35,5.35,0,0,1,.91.57.4.4,0,0,0,.23.08.38.38,0,0,0,.3-.15.37.37,0,0,0-.07-.52,5.45,5.45,0,0,0-1.05-.66.29.29,0,0,0-.1,0,5.43,5.43,0,0,0-.12-2.61A3.16,3.16,0,0,0,10,5a2.89,2.89,0,0,0-1.33-.3,3.1,3.1,0,0,0-3,3.41,4.79,4.79,0,0,0,.23,1.46s0,0-.07,0a6.15,6.15,0,0,0-3,5.3.38.38,0,0,0,.37.37H14.65a.38.38,0,0,0,.37-.37,6.18,6.18,0,0,0-.66-2.78A.39.39,0,0,0,13.85,12ZM8.68,5.46a2.25,2.25,0,0,1,1,.22,2.38,2.38,0,0,1,1,1.34,4.92,4.92,0,0,1,.07,2.35,2.28,2.28,0,0,1-2.05,1.87c-1.41,0-2.29-1.62-2.29-3.12A2.38,2.38,0,0,1,8.68,5.46Z"></path><path d="M17.15,6.7l-1.8-2a.37.37,0,0,0-.52,0L12.58,6.58a.38.38,0,0,0-.05.53.37.37,0,0,0,.53,0L14.53,5.9a9.64,9.64,0,0,1-1.32,4.72,5.28,5.28,0,0,1-3.83,2.43.38.38,0,0,0-.35.4.37.37,0,0,0,.37.35h0A6.08,6.08,0,0,0,13.84,11a10.32,10.32,0,0,0,1.44-5.29L16.59,7.2a.36.36,0,0,0,.28.12.38.38,0,0,0,.25-.09A.38.38,0,0,0,17.15,6.7Z"></path></svg></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-3" id="carousel_92d2">
      <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-palette-5-dark-3 u-size-30 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <h6 class="u-align-center u-text u-text-default u-text-palette-1-base u-text-1">ADD CHORES</h6>
                <div class="u-form u-form-1">

                  <form  method="POST">
                    <div class="u-form-group u-form-group-1">
                      <label for="text-49a4" class="u-label">Chore Name</label>
                      <input type="text" placeholder="Enter Chore Name" id="text-49a4" name="cname" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                    </div>
                    <div class="u-form-group u-form-textarea u-form-group-2">
                      <label for="textarea-f897" class="u-label">Chore Description</label>
                      <textarea rows="4" cols="50" id="textarea-f897" name="cdescrip" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="" placeholder="Enter Chore Description"></textarea>
                    </div>
                    <div class="u-align-left u-form-group u-form-submit">
                    <input type="submit" value="submit" name="chore" class="u-active-grey-80 u-border-none u-btn u-btn-submit u-button-style u-hover-grey-80 u-palette-1-base u-btn-1">
                    </div>
                  </form>
                 

                </div>
                <a href="View-Chores.php" data-page-id="1720423569" class="u-border-none u-btn u-button-style u-palette-1-base u-btn-2">View Chores</a>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2"><span class="u-icon u-icon-circle u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 128 128" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f2b8"></use></svg><svg class="u-svg-content" viewBox="0 0 128 128" id="svg-f2b8"><path d="M125,3A10.38,10.38,0,0,0,110.3,3L75.91,37.39,74,35.48a2,2,0,0,0-2.83,0L57.38,49.26h0a32.37,32.37,0,0,0-32.43,8C15.61,66.6,12.31,79.38,9.4,90.66c-.29,1.1-.57,2.19-.85,3.28l-7.8,6.23A2,2,0,0,0,0,101.66c0,1.47.86,4.09,4.3,5.21a33.19,33.19,0,0,1-2.36,4.38,2,2,0,0,0,1.32,3.06A141.9,141.9,0,0,0,28,116.64c14.89,0,31.82-2.87,42.63-13.67a32.33,32.33,0,0,0,8-32.4h0L92.49,56.78a2,2,0,0,0,.59-1.41A2,2,0,0,0,92.49,54L90.58,52,125,17.69A10.36,10.36,0,0,0,125,3ZM27.77,60.11a28.41,28.41,0,0,1,35-4,123.27,123.27,0,0,0-17.14,4.4c-12.31,4.43-24,16.8-30.79,25.18C17.43,76.34,20.72,67.15,27.77,60.11ZM67.1,59.4c.25.23.5.46.74.71a28.36,28.36,0,0,1,4,4.94c-6.59.69-24.9,3.15-42.1,10.63C35,70.84,41,66.44,47,64.27A130.74,130.74,0,0,1,67.1,59.4Zm.74,40.74c-15.66,15.65-46.05,13.15-61,10.72.59-1.12,1.15-2.31,1.69-3.59,4.79-.39,22-1.93,32.41-4.52,12.29-3.07,24.18-16.3,24.68-16.86a2,2,0,1,0-3-2.66C62.47,83.36,51,96.1,39.93,98.87s-30.87,4.34-32.82,4.49a4.5,4.5,0,0,1-2.77-.94L11.1,97c2.52-.25,12.29-1.32,19.06-3.31,8-2.32,11.64-5.8,11.79-5.95A2,2,0,0,0,42,84.94a2,2,0,0,0-2.83-.07s-3.22,3-10.14,5a103.49,103.49,0,0,1-14.5,2.71c1.57-2.07,3.79-4.89,6.49-8C41.31,72.33,68.9,69.33,73.8,68.88A28.32,28.32,0,0,1,67.84,100.14Zm9.28-33.66A32.43,32.43,0,0,0,61.46,50.83L72.59,39.72l11.2,11.19,2.54,2.54h0l1.91,1.91Zm45-51.62L87.75,49.21l-9-9L113.13,5.86a6.36,6.36,0,1,1,9,9Z"></path><path d="M101,102H78a2,2,0,0,0,0,4h23a3.5,3.5,0,0,1,0,7H89a2,2,0,0,0-2,2,9,9,0,0,1-9,9H2a2,2,0,0,0,0,4H78a13,13,0,0,0,12.85-11H101a7.5,7.5,0,0,0,0-15Z"></path><path d="M116,75h-3V70a2,2,0,0,0-4,0v5h-3a2,2,0,0,0,0,4h3v5a2,2,0,0,0,4,0V79h3a2,2,0,0,0,0-4Z"></path><path d="M13,36h4v5a2,2,0,0,0,4,0V36h4a2,2,0,0,0,0-4H21V27a2,2,0,0,0-4,0v5H13a2,2,0,0,0,0,4Z"></path><path d="M66,11h4v5a2,2,0,0,0,4,0V11h4a2,2,0,0,0,0-4H74V2a2,2,0,0,0-4,0V7H66a2,2,0,0,0,0,4Z"></path></svg></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-4" id="carousel_3b70">
      <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
            <div class="u-align-center u-container-style u-layout-cell u-palette-5-dark-3 u-size-30 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                
                <div class="u-form u-form-1">
                  <form  method="POST" >
                    <h6 class="u-text u-text-default u-text-palette-1-base u-text-1">ADD HOUSE MEMBERS</h6>
                    <div class="u-form-group u-form-group-1">
                      <label for="text-2f3f" class="u-label">Member Name</label>
                      <input type="text" placeholder="Enter Member Name" id="text-2f3f" name="name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                    </div>
                    <div class="u-form-group u-form-group-2">
                      <label for="text-2edb" class="u-label">Age</label>
                      <input type="text" placeholder="Enter age" id="text-2edb" name="age" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                    </div>
                    <div class="u-form-group u-form-select u-form-group-3">
                      <label for="select-2755" class="u-label">Member Status</label>
                      <div class="u-form-select-wrapper">
                        <select id="select-2755" name="status" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                          <option value="Active">Active</option>
                          <option value="Away">Away</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                    <div class="u-form-group u-form-select u-form-group-4">
                      <label for="select-bb3e" class="u-label">Gender</label>
                      <div class="u-form-select-wrapper">
                        <select id="select-bb3e" name="gender" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                    <div class="u-form-email u-form-group u-form-group-5">
                      <label for="text-9cb2" class="u-label">Email</label>
                      <input type="email" placeholder="Enter Email" id="text-9cb2" name="email" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                    </div>
                    <div class="u-form-group u-form-phone u-form-group-6">
                      <label for="text-6dd5" class="u-label">Telephone</label>
                      <input type="tel" placeholder="Enter telephone number" id="text-6dd5" name="telephone" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" pattern="[0-9]{10}" required  oninvalid="this.setCustomValidity('Phone number should be 10 numbers')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="u-form-group u-form-group-7">
                      <label for="text-c536" class="u-label">Date of Birth</label>
                      <input type="text" placeholder="YYYY-MM-DD" id="text-c536" name="date" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required oninvalid="this.setCustomValidity('Invalid date format')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="u-align-left u-form-group u-form-submit">
                      <input type="submit" value="Add Member" name="member" class="u-active-grey-80 u-border-none u-btn u-btn-submit u-button-style u-hover-grey-80 u-palette-1-base u-btn-1">
                    </div>
                     

                  </form>
                </div>
                <a href="View-Members.php" data-page-id="66989246" class="u-border-none u-btn u-button-style u-palette-1-base u-btn-2">View Members</a>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-valign-middle u-container-layout-2"><span class="u-icon u-icon-circle u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 24 24" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-53a8"></use></svg><svg class="u-svg-content" viewBox="0 0 24 24" id="svg-53a8"><path d="M9,14c1.381,0,2.631-0.56,3.536-1.465C13.44,11.631,14,10.381,14,9s-0.56-2.631-1.464-3.535C11.631,4.56,10.381,4,9,4  S6.369,4.56,5.464,5.465C4.56,6.369,4,7.619,4,9s0.56,2.631,1.464,3.535C6.369,13.44,7.619,14,9,14z"></path><path d="M9,21c3.518,0,6-1,6-2c0-2-2.354-4-6-4c-3.75,0-6,2-6,4C3,20,5.25,21,9,21z"></path><path d="M21,12h-2v-2c0-0.553-0.447-1-1-1s-1,0.447-1,1v2h-2c-0.553,0-1,0.447-1,1s0.447,1,1,1h2v2c0,0.553,0.447,1,1,1s1-0.447,1-1  v-2h2c0.553,0,1-0.447,1-1S21.553,12,21,12z"></path></svg></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-5" id="carousel_0eac">
      <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
            <div class="u-align-center u-container-style u-layout-cell u-palette-5-dark-3 u-size-30 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <h6 class="u-text u-text-default u-text-palette-1-base u-text-1">ADD HOUSE EQUIPMENT</h6>
                <div class="u-form u-form-1">
                  <form  method="POST" >
                    <div class="u-form-group u-form-group-1">
                      <label for="text-2f3f" class="u-label">Equipment Name</label>
                      <input type="text" placeholder="Enter Equipment Name" id="text-2f3f" name="ename" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                    </div>
                    <div class="u-form-group u-form-select u-form-group-2">
                      <label for="select-bb3e" class="u-label">Equipment Status</label>
                      <div class="u-form-select-wrapper">
                        <select id="select-bb3e" name="estatus" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                          <option value="Functional">Functional</option>
                          <option value="Faulty">Faulty</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
                    <div class="u-align-left u-form-group u-form-submit">
                      <input type="submit" name="equipment" value="Add Equipment" class="u-active-grey-80 u-border-none u-btn u-btn-submit u-button-style u-hover-grey-80 u-palette-1-base u-btn-1">
                    </div>

                  </form>
                </div>
                <a href="View-Equipment.php" data-page-id="234528444" class="u-border-none u-btn u-button-style u-palette-1-base u-btn-2">View Equipment</a>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-valign-middle u-container-layout-2"><span class="u-icon u-icon-circle u-text-palette-1-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 128 128" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-86e0"></use></svg><svg class="u-svg-content" viewBox="0 0 128 128" id="svg-86e0"><path d="M58,128H10a2,2,0,0,1-2-1.87l-4-64A2,2,0,0,1,6,60H62a2,2,0,0,1,2,2.13l-4,64A2,2,0,0,1,58,128Zm-46.12-4H56.12l3.75-60H8.13Z"></path><path d="M66,64H2a2,2,0,0,1,0-4H66a2,2,0,0,1,0,4Z"></path><path d="M60,83.59a20.35,20.35,0,0,1-9.64-2.18,16.54,16.54,0,0,0-8-1.82,16.48,16.48,0,0,0-8,1.82,20.47,20.47,0,0,1-9.64,2.18,20.47,20.47,0,0,1-9.64-2.18,16.54,16.54,0,0,0-8-1.82,2,2,0,1,1,0-4,20.47,20.47,0,0,1,9.64,2.18,16.36,16.36,0,0,0,8,1.82,16.42,16.42,0,0,0,8-1.82,20.47,20.47,0,0,1,9.64-2.18A20.47,20.47,0,0,1,52,77.77a16.42,16.42,0,0,0,8,1.82,2,2,0,0,1,0,4Z"></path><path d="M94,73H82a2,2,0,0,1-2-2V8A8,8,0,0,1,96,8V71A2,2,0,0,1,94,73ZM84,69h8V8a4,4,0,0,0-8,0Z"></path><path d="M79,93a2,2,0,0,1-2-2V71a2,2,0,0,1,2-2H97a2,2,0,0,1,2,2V82a2,2,0,0,1-4,0V73H81V91A2,2,0,0,1,79,93Z"></path><path d="M122.62,121.83h-.15c-.59,0-14.51-1.1-22.43-3.08-8.35-2.09-16.37-11-16.71-11.41a2,2,0,0,1,3-2.66c.08.09,7.54,8.4,14.69,10.19,7.59,1.89,21.62,3,21.76,3a2,2,0,0,1-.15,4Z"></path><path d="M114.26,107a2,2,0,0,1-1-.29c-14.63-9-35.19-10.49-35.4-10.5A2,2,0,0,1,76,94.1a2,2,0,0,1,2.14-1.85c.88.06,21.76,1.61,37.21,11.08a2,2,0,0,1-1,3.7Z"></path><path d="M120.47,114.94a2,2,0,0,1-1.66-.88c-.11-.17-11.39-16.74-22.89-20.88a89.71,89.71,0,0,0-13.81-3.3,2,2,0,1,1,.6-4,92.8,92.8,0,0,1,14.57,3.5C110,94,121.64,111.1,122.13,111.82a2,2,0,0,1-1.66,3.12Z"></path><path d="M108.75,128c-10,0-21.44-1.94-28.77-9.27a22.13,22.13,0,0,1,0-31.28h0a22.15,22.15,0,0,1,31.28,0c6.32,6.32,8.53,14.9,10.49,22.47.17.65.33,1.31.5,1.95l5,4a2,2,0,0,1,.75,1.5,4.25,4.25,0,0,1-2.61,3.84,19.43,19.43,0,0,0,1.22,2.18,2,2,0,0,1-1.32,3A94.08,94.08,0,0,1,108.75,128ZM82.81,90.26a18.12,18.12,0,0,0,0,25.62c9.87,9.87,28.89,8.61,39,7.07-.37-.74-.71-1.54-1-2.39a2,2,0,0,1,.17-1.8,2,2,0,0,1,1.55-.92,5,5,0,0,0,.72-.11l-4-3.17a2,2,0,0,1-.68-1l-.69-2.62c-1.91-7.42-3.89-15.09-9.44-20.64a18.12,18.12,0,0,0-25.62,0ZM124,117.31Z"></path><path d="M120.49,115h-.18a84.9,84.9,0,0,1-13.18-2.25c-5.33-1.57-7.83-3.86-8.09-4.12a2,2,0,1,1,2.77-2.88,17.24,17.24,0,0,0,6.45,3.16A83.39,83.39,0,0,0,120.67,111a2,2,0,0,1-.18,4Z"></path></svg></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <span style="height: 64px; width: 64px; margin-left: 0px; margin-right: auto; margin-top: 0px; background-image: none; right: 20px; bottom: 20px" class="u-back-to-top u-icon u-icon-circle u-opacity u-opacity-85 u-palette-1-base u-spacing-15" data-href="#">
        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 551.13 551.13"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1d98"></use></svg>
        <svg class="u-svg-content" enable-background="new 0 0 551.13 551.13" viewBox="0 0 551.13 551.13" xmlns="http://www.w3.org/2000/svg" id="svg-1d98"><path d="m275.565 189.451 223.897 223.897h51.668l-275.565-275.565-275.565 275.565h51.668z"></path></svg>
    </span>
  </body>
</html>