<?php
session_start();
//Get session variables stores when login is successful
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
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en-GH">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Members View</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Members-View.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i">
    
    
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
    <meta name="theme-color" content="#478ac9">
    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Members View">
    <meta name="twitter:description" content="ChoresUp">
    <meta property="og:title" content="Members View">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
     
    
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="carousel_4d88" data-image-width="1280" data-image-height="831">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-small-text u-text u-text-variant "><?php
        ob_start();
       include "dbconnect.php"; // Using database connection file here
        ob_end_clean();
        //Show users name
        $insert = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email') ");
        while($data = mysqli_fetch_array($insert)){
          echo "Welcome ".$data['Resident_Name']."<br>";
        }
       
?>
        </h2>
         <h2 class="u-small-text u-text u-text-variant ">
         </h2>
        <a href="logout.php" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1" onclick="return confirm('Are you sure you want to logout?')">LOGOUT</a>
        <h2 class="u-custom-font u-font-source-sans-pro u-text u-text-2">YOUR AVAILABLE HOUSE CHORES</h2>
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="25%">
              <col width="25%">
              <col width="25%">
              <col width="25%">
            </colgroup>
            <thead class="u-palette-5-dark-3 u-table-header u-table-header-1">
              
              <tr style="height: 70px;">
                <th class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-table-cell u-table-cell-1">Chore</th>
                <th class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-table-cell u-table-cell-2">Equipment</th>
                <th class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-table-cell u-table-cell-3">date assigned</th>
                <th class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-table-cell u-table-cell-4">Task Completed?</th>
              </tr>
            </thead>
            <tbody class="u-black u-table-body u-table-body-1">
              <?php
              ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
      //Table to show users chores
        $res="";
        $records1 = mysqli_query($db,"SELECT * FROM residents WHERE Email='$email'  "); // fetch data from database
        if($records1){
        while($data = mysqli_fetch_array($records1)){//While loop to print out data in a table form
        $res=  $data['Resident_Id'];  
}}
        $records = mysqli_query($db,"SELECT  chores.Chore_Name, equipment.Equipment_Name, `Date`, `Task_Complete` FROM `resident_chores`    INNER JOIN chores on resident_chores.Chore_Id = chores.Chore_Id INNER JOIN equipment on resident_chores.Equipment_Id = equipment.Equipment_Id WHERE resident_chores.Resident_Id='$res'  "); // fetch data from database
        if($records){
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>
              <tr style="height: 66px;">
                <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-5"><?php echo $data['Chore_Name'];  ?></td>
                <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-6"><?php echo $data['Equipment_Name'];  ?></td>
                <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-7"><?php echo $data['Date'];  ?></td>
                <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-8"><?php echo $data['Task_Complete'];  ?></td>
              </tr>
            </tbody>
           <?php
         
}}
?>

          </table>
          
        </div>
        <form method="POST">
        <input type="submit" name="status" value="Check availability status" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-2">
      
      <?php
      //Allow users to view their current availability status
       if(isset($_POST['status'])){
        $info1="";
        $info2="";
          $insert1 = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email' AND `Resident_Status`='Active') ");
        $insert2 = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email' AND `Resident_Status`='Away') ");
        if(mysqli_num_rows($insert1)==1){
          $info1= "You are currently Active";
        }
         if(mysqli_num_rows($insert2)==1){
          $info2= "You are currently Inactive";
        }
        echo $info1;
        echo $info2;
      
        ?>
         <input type="submit" name="statusc" value="<?php 
         //Users can switch their availability status
         $insert1 = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email' AND `Resident_Status`='Active') ");
        $insert2 = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email' AND `Resident_Status`='Away') ");
         if(mysqli_num_rows($insert1)==1){
          echo "Set Account to Away";
        } 
        if(mysqli_num_rows($insert2)==1){
          echo "Set Account as Active";
        }

        ?>" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-2" onclick="return confirm('Are you sure you want to change your availability status?')">
       <?php
       
     }
       ?>
       <?php
       if(isset($_POST['statusc'])){
        $insert1 = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email' AND `Resident_Status`='Active') ");
        $insert2 = mysqli_query($db,"SELECT * from `residents` WHERE (`Email`='$email' AND `Resident_Status`='Away') ");
         if(mysqli_num_rows($insert1)==1){
           $update1 = mysqli_query($db,"UPDATE  `residents` SET `Resident_Status`='Away' WHERE `Resident_Status`='Active' AND `Email`='$email' ");
          
        } 
        if(mysqli_num_rows($insert2)==1){
          $update2 = mysqli_query($db,"UPDATE  `residents` SET `Resident_Status`='Active' WHERE `Resident_Status`='Away' AND `Email`='$email' ");
          
        }

       }

       ?>
        </form>
      </div>
    </section>
   
    
    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-white" id="sec-5c66"><div class="u-clearfix u-sheet u-sheet-1">
        <a data-page-id="38184723" class="u-image u-logo u-image-1" data-image-width="2602" data-image-height="855" title="Home">
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