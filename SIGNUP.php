<?php
    ob_start();
    include "dbconnect.php"; // Using database connection file here
    ob_end_clean();
    $error1="";
    $error2="";
    if(isset($_POST['signuphead'])){//WHen submit button is clicked, data is added to database   
        $name = $_POST['name'];
        $hname = $_POST['hname'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $pass1 = $_POST['password'];
        $pass2 = $_POST['confirm_password'];
        //Check if passwords match
        if ($pass1==$pass2) {
          //Query for adding house heads into residents table
        $insert = mysqli_query($db,"INSERT INTO `house`(`House_Name`,`House_Password`) VALUES ('$hname', md5('$pass1')) ");
        $insert = mysqli_query($db,"INSERT INTO `residents`(`Resident_Name`,`House_Id`,`Age`,`Resident_Status`,`House_Head`,`Gender`,`Email`,`Telephone`,`Date_of_Birth`) VALUES ('$name',(SELECT `House_Id` FROM `house` WHERE `House_Name`= '$hname'), '$age','Active','Yes','$gender','$email','$phone','$dob') ");
        if ($insert) {
          header("Location: login.php");
                exit();
        }
        }
        
        
        else{
          $error1="Passwords dont match!";
        }
       
        }

        
?>
<?php
if(isset($_POST['signupmem'])){//WHen submit button is clicked, data is added to database   
        $name = $_POST['name1'];
        $hname = $_POST['hname1'];
        $phone = $_POST['phone1'];
        $age = $_POST['age1'];
        $email = $_POST['email1'];
        $dob = $_POST['dob1'];
        $gender = $_POST['gender1'];
        //Query for adding house members into residents table
        $insert = mysqli_query($db,"INSERT INTO `residents`(`Resident_Name`,`House_Id`,`Age`,`Resident_Status`,`House_Head`,`Gender`,`Email`,`Telephone`,`Date_of_Birth`) VALUES ('$name','$hname', '$age','Active','No','$gender','$email','$phone','$dob') ");
        //If insertion is successful, redirect to login page
        if ($insert) {
          header("Location: login.php");
          exit();
        }
        else{
          $error2="Unsuccessful Signup";
        }
       

        }
        mysqli_close($db); // Close connection

 ?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en-GH">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="SIGNUP.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "ChoresUp",
		"logo": "images/choresuplogo.png",
		"sameAs": [
				"https://instagram.com/ayeyi_djan",
				"www.linkedin.com/in/nana-banyin-ayeyi-djan",
				"mailto:banyin.djan@ashesi.edu.gh?subject=ChoresUp",
				"https://twitter.com/Ayeyi_Djan",
				"tel:0546311192",
				"https://www.facebook.com/ayeyi.djan/"
		]
}</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="theme-color" content="#478ac9">
    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SIGNUP">
    <meta name="twitter:description" content="ChoresUp">
    <meta property="og:title" content="SIGNUP">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-overlap u-overlap-contrast u-overlap-transparent"><header class="u-clearfix u-header u-header" id="sec-0978"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="Home.html" data-page-id="38184723" class="u-image u-logo u-image-1" data-image-width="2602" data-image-height="855" title="Home">
          <img src="images/choresuplogo.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-5-base u-text-hover-palette-5-base" href="Home.html" style="padding: 10px 0px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-5-base u-text-hover-palette-5-base" href="Contact.html" style="padding: 10px 0px;">Contact</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-5-base u-text-hover-palette-5-base" href="LOGIN.html" style="padding: 10px 0px;">Login</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html" style="padding: 10px 0px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html" style="padding: 10px 0px;">Contact</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="LOGIN.html" style="padding: 10px 0px;">Login</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="carousel_1de3" data-image-width="1280" data-image-height="888">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-group u-opacity u-opacity-55 u-radius-50 u-shape-round u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h2 class="u-align-center u-custom-font u-font-montserrat u-text u-text-1">SELECT YOUR ROLE</h2>
            <div class="u-list u-list-1">
              <div class="u-repeater u-repeater-1">
                <div class="u-container-style u-custom-item u-list-item u-opacity u-opacity-65 u-palette-1-base u-radius-40 u-repeater-item u-shape-round u-list-item-1">
                  <div class="u-container-layout u-similar-container u-container-layout-2"><span class="u-icon u-icon-circle u-palette-2-light-1 u-spacing-20 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 32 32" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-35f7"></use></svg><svg class="u-svg-content" viewBox="0 0 32 32" id="svg-35f7"><g><polyline fill="currentColor" points="   649,137.999 675,137.999 675,155.999 661,155.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></polyline><polyline fill="currentColor" points="   653,155.999 649,155.999 649,141.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></polyline><polyline fill="currentColor" points="   661,156 653,162 653,156  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></polyline>
</g><path d="M21.947,16.332C23.219,14.915,24,13.049,24,11c0-4.411-3.589-8-8-8s-8,3.589-8,8s3.589,8,8,8  c1.555,0,3.003-0.453,4.233-1.224c4.35,1.639,7.345,5.62,7.726,10.224H4.042c0.259-3.099,1.713-5.989,4.078-8.051  c0.417-0.363,0.46-0.994,0.097-1.411c-0.362-0.416-0.994-0.46-1.411-0.097C3.751,21.103,2,24.951,2,29c0,0.553,0.448,1,1,1h26  c0.553,0,1-0.447,1-1C30,23.514,26.82,18.615,21.947,16.332z M10,11c0-3.309,2.691-6,6-6s6,2.691,6,6s-2.691,6-6,6S10,14.309,10,11z  "></path></svg>
            
          
          </span>
                    <h3 class="u-align-center u-text u-text-default u-text-2">House Head</h3>
                    <p class="u-align-center u-text u-text-default u-text-3">CLICK IF YOU WANT TO SIGNUP AS A HOUSE HEAD</p>
                    <form method="POST">
                     <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="SIGNUP" name="signuph" class="u-border-none u-btn u-btn-submit u-button-style u-palette-2-base u-btn-1">
                </div>
              </form>
                  </div>

                </div>
                <div class="u-align-center u-container-style u-custom-item u-list-item u-opacity u-opacity-65 u-palette-1-base u-radius-40 u-repeater-item u-shape-round u-list-item-2">
                  <div class="u-container-layout u-similar-container u-container-layout-3"><span class="u-icon u-icon-circle u-palette-2-light-1 u-spacing-20 u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 32 32" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9d17"></use></svg><svg class="u-svg-content" viewBox="0 0 32 32" id="svg-9d17"><g><polyline fill="currentColor" points="   649,137.999 675,137.999 675,155.999 661,155.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></polyline><polyline fill="currentColor" points="   653,155.999 649,155.999 649,141.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></polyline><polyline fill="currentColor" points="   661,156 653,162 653,156  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></polyline>
</g><path d="M21.947,16.332C23.219,14.915,24,13.049,24,11c0-4.411-3.589-8-8-8s-8,3.589-8,8s3.589,8,8,8  c1.555,0,3.003-0.453,4.233-1.224c4.35,1.639,7.345,5.62,7.726,10.224H4.042c0.259-3.099,1.713-5.989,4.078-8.051  c0.417-0.363,0.46-0.994,0.097-1.411c-0.362-0.416-0.994-0.46-1.411-0.097C3.751,21.103,2,24.951,2,29c0,0.553,0.448,1,1,1h26  c0.553,0,1-0.447,1-1C30,23.514,26.82,18.615,21.947,16.332z M10,11c0-3.309,2.691-6,6-6s6,2.691,6,6s-2.691,6-6,6S10,14.309,10,11z  "></path></svg>
            
            
          </span>
                    <h3 class="u-align-center u-text u-text-default u-text-4">House Member</h3>
                    <p class="u-align-center u-text u-text-default u-text-5">CLICK IF YOU WANT TO SIGNUP AS A HOUSE MEMBER</p>
                    <form method="POST">
                     <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="SIGNUP" name="signup" class="u-border-none u-btn u-btn-submit u-button-style u-palette-2-base u-btn-1">
                </div>
              </form>
                  </div>
                </div>
              </div>
            </div>
         

            <div class="u-form u-form-1">
               <?php 
           ob_start();
    include "dbconnect.php"; // Using database connection file here
    ob_end_clean();

    if(isset($_POST['signup'])){//WHen this signup button is clicked, display signup form for members  
          ?>
              <form method="POST" >
                <div class="u-form-email u-form-group u-form-partition-factor-2">
                  <label for="email-f18c" class="u-label u-label-1">Name</label>
                  <input type="input" id="email-f18c" name="name1" class="u-input u-input-rectangle u-white u-input-1" required="" placeholder="Enter your Name">
                </div>
                <div class="u-form-select-wrapper">
                  <label for="select-a4ee" class="u-label u-label-1">House Name</label>
                    <select id="select-a4ee" name="hname1" class="u-input u-input-rectangle u-white" required="required">
 <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
      $records = mysqli_query($db,"SELECT * FROM `house`"); // fetch data from database
        //Show houses currently in the database
      while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>
                      <option value="<?php echo $data['House_Id'];?>"><?php echo $data['House_Name'];?></option>
<?php
                                                  }

mysqli_close($db); // Close connection
?>

                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                  </div>
                <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-3">
                  <label for="phone-cbff" class="u-label u-label-3" wfd-invisible="true">Phone</label>
                  <input type="tel" placeholder="Enter your phone number" id="phone-cbff" name="phone1" class="u-input u-input-rectangle u-white u-input-3" required="" pattern="\+?\d{0,2}[\s\(\-]?([0-9]{3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})">
                </div>
                <div class="u-form-group u-form-partition-factor-2 u-form-group-4">
                  <label for="date-33f9" class="u-label u-label-4">Age</label>
                  <input type="text" placeholder="Enter your Age" id="date-33f9" name="age1" class="u-input u-input-rectangle u-white u-input-4" required="required" pattern="^[0-9]*$" required  oninvalid="this.setCustomValidity('Age should be a number')" oninput="this.setCustomValidity('')">
                </div>
                <div class="u-form-email u-form-group u-form-group-5">
                  <label for="message-1015" class="u-label u-label-5">Email</label>
                  <input placeholder="Enter your Email" rows="4" cols="50" id="message-1015" name="email1" class="u-input u-input-rectangle u-white u-input-5" required="required" type="email">
                </div>
                <div class="u-form-date u-form-group u-form-group-6">
                  <label for="phone-d3b7" class="u-label u-label-6">Date of Birth</label>
                  <input type="text" placeholder="YYYY-MM-DD" id="phone-d3b7" name="dob1" class="u-input u-input-rectangle u-white u-input-6"  pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required oninvalid="this.setCustomValidity('Invalid date format')" oninput="this.setCustomValidity('')">
                </div>
                <div class="u-form-group u-form-select u-form-group-7">
                  <label for="select-a4ee" class="u-label">Gender</label>
                  <div class="u-form-select-wrapper">
                    <select id="select-a4ee" name="gender1" class="u-input u-input-rectangle u-white" required="required">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                  </div>
                </div>
               <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="SIGNUP" name="signupmem" class="u-border-none u-btn u-btn-submit u-button-style u-palette-2-base u-btn-1">
                </div>
              </form>

<?php 
}
     
?>
      <?php 
           ob_start();
    include "dbconnect.php"; // Using database connection file here
    ob_end_clean();
    if(isset($_POST['signuph'])){//WHen this signup button is clicked, display signup form for house heads  
          ?>
              <form method="POST" >
                <div class="u-form-email u-form-group u-form-partition-factor-2">
                  <label for="email-f18c" class="u-label u-label-1">Name</label>
                  <input type="input" id="email-f18c" name="name" class="u-input u-input-rectangle u-white u-input-1" required="" placeholder="Enter your Name">
                </div>
                <div class="u-form-group u-form-name u-form-partition-factor-2">
                  <label for="name-f18c" class="u-label u-label-2">House Name</label>
                  <input type="text" placeholder="Enter your House Name" id="name-f18c" name="hname" class="u-input u-input-rectangle u-white u-input-2" required="">
                </div>
                <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-3">
                  <label for="phone-cbff" class="u-label u-label-3" wfd-invisible="true">Phone</label>
                  <input type="tel" placeholder="Enter your phone number" id="phone-cbff" name="phone" class="u-input u-input-rectangle u-white u-input-3" pattern="[0-9]{10}" required  oninvalid="this.setCustomValidity('Phone number should be 10 numbers')" oninput="this.setCustomValidity('')" >
                </div>
                <div class="u-form-group u-form-partition-factor-2 u-form-group-4">
                  <label for="date-33f9" class="u-label u-label-4">Age</label>
                  <input type="text" placeholder="Enter your Age" id="date-33f9" name="age" class="u-input u-input-rectangle u-white u-input-4" pattern="^[0-9]*$" required  oninvalid="this.setCustomValidity('Age should be a number')" oninput="this.setCustomValidity('')">
                </div>
                <div class="u-form-email u-form-group u-form-group-5">
                  <label for="message-1015" class="u-label u-label-5">Email</label>
                  <input placeholder="Enter your Email" rows="4" cols="50" id="message-1015" name="email" class="u-input u-input-rectangle u-white u-input-5" required="required" type="email">
                </div>
                <div class="u-form-date u-form-group u-form-group-6">
                  <label for="phone-d3b7" class="u-label u-label-6">Date of Birth</label>
                   <input type="text" placeholder="YYYY-MM-DD" id="phone-d3b7" name="dob" class="u-input u-input-rectangle u-white u-input-6"  pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required oninvalid="this.setCustomValidity('Invalid date format')" oninput="this.setCustomValidity('')">
                </div>
                <div class="u-form-group u-form-select u-form-group-7">
                  <label for="select-a4ee" class="u-label">Gender</label>
                  <div class="u-form-select-wrapper">
                    <select id="select-a4ee" name="gender" class="u-input u-input-rectangle u-white" required="required">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                  </div>
                </div>
                <div class="u-form-group u-form-name u-form-partition-factor-2">
                  <label for="password" class="u-label u-label-2">Set Password</label>
                  <input type="password" placeholder="Enter your Password" id="password" name="password" class="u-input u-input-rectangle u-white u-input-2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required oninvalid="this.setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')" oninput="this.setCustomValidity('')" ><br>
                  <span id='message'></span>
                  <input type="password" placeholder="Re-Enter Password" id="confirm_password" name="confirm_password" class="u-input u-input-rectangle u-white u-input-2" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required oninvalid="this.setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')" oninput="this.setCustomValidity('')" > 
                
                </div>
               <div class="u-align-center u-form-group u-form-submit">
                  <input type="submit" value="SIGNUP" name="signuphead" class="u-border-none u-btn u-btn-submit u-button-style u-palette-2-base u-btn-1">
                </div>
<?php 
//Display the errors
echo $error1;
echo $error2
?>
              </form>
<?php
}
mysqli_close($db); // Close connection
?>
            </div>
            <p class="u-align-center u-small-text u-text u-text-variant u-text-6">Already have an account?&nbsp;</p>
            <p class="u-align-center u-small-text u-text u-text-variant u-text-7">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-2" href="login.php" data-page-id="1158729241">Login.</a>
            </p>
          </div>
        </div>
      </div>
    </section>
   
   
    
    
    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-white" id="sec-5c66"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="Home.html" data-page-id="38184723" class="u-image u-logo u-image-1" data-image-width="2602" data-image-height="855" title="Home">
          <img src="images/choresuplogo.png" class="u-logo-image u-logo-image-1">
        </a>
        <p class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-1">Web Technologies Individual Project<br>Nana Banyin Ayeyi Djan - 98312023 Class of 2023
        </p>
        <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/ayeyi_djan"><span class="u-icon u-social-icon u-social-instagram u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7d25"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7d25"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
          </a>
          <a class="u-social-url" title="linkedin" target="_blank" href="www.linkedin.com/in/nana-banyin-ayeyi-djan"><span class="u-icon u-social-icon u-social-linkedin u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-dd09"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-dd09"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path></svg></span>
          </a>
          <a class="u-social-url" target="_blank" title="Email" href="mailto:banyin.djan@ashesi.edu.gh?subject=ChoresUp"><span class="u-icon u-social-email u-social-icon u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-13a7"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-13a7"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path id="path3864" fill="#FFFFFF" d="M27.2,28h57.6c4,0,7.2,3.2,7.2,7.2l0,0v42.7c0,3.9-3.2,7.2-7.2,7.2l0,0H27.2
	c-4,0-7.2-3.2-7.2-7.2V35.2C20,31.1,23.2,28,27.2,28 M56,52.9l28.8-17.8H27.2L56,52.9 M27.2,77.7h57.6V43.5L56,61.3L27.2,43.5V77.7z
	"></path></svg></span>
          </a>
          <a class="u-social-url" target="_blank" title="Twitter" href="https://twitter.com/Ayeyi_Djan"><span class="u-icon u-social-icon u-social-twitter u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4391"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-4391"><circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
            c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
            c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
            c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
            c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>
          </a>
          <a class="u-social-url" target="_blank" title="Phone" href="tel:0546311192"><span class="u-icon u-social-icon u-social-phone u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7704"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7704"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M82.7,66c-3.9,0-7.7-0.6-11.3-1.8c-1.8-0.6-4,0-5,1.1l-7.1,5.4c-8.3-4.4-13.4-9.5-17.7-17.7l5.2-7
	c1.4-1.4,1.8-3.3,1.3-5.2c-1.2-3.6-1.8-7.5-1.8-11.3c0-2.8-2.3-5.1-5.1-5.1H29.5c-2.8,0-5.1,2.3-5.1,5.1c0,32.2,26.2,58.4,58.4,58.4
	c2.8,0,5.1-2.3,5.1-5.1V71.1C87.8,68.3,85.6,66,82.7,66z"></path></svg></span>
          </a>
          <a class="u-social-url" target="_blank" title="Facebook" href="https://www.facebook.com/ayeyi.djan/"><span class="u-icon u-social-facebook u-social-icon u-icon-6"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-fd62"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-fd62"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
          </a>
        </div>
      </div></footer>
  </body>
</html>
<!-- Source: https://stackoverflow.com/questions/21727317/how-to-check-confirm-password-field-in-form-without-reloading-page/21727518 -->
<!-- Jquery code used to check if passwords match-->
<script >
  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Passwords Match').css('color', 'green');
  } else 
    $('#message').html('Passwords do not match').css('color', 'red');
});
</script>
