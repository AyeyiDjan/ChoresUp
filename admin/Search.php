<?php
session_start();
//Storing users information in session variable
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
      //Code to change the chore completion status
       if(isset($_POST['update'])){
        $id=$_POST['id'];
        
         if($_POST['complete']=="No"){
           $update1 = mysqli_query($db,"UPDATE  `resident_chores` SET `Task_Complete`='Yes' WHERE `Resident_Chore_Id`='$id' ");
           header("location:Search.php");
        exit;  
          
        } 
        if($_POST['complete']=="Yes"){
           $update1 = mysqli_query($db,"UPDATE  `resident_chores` SET `Task_Complete`='No' WHERE `Resident_Chore_Id`='$id' ");
           header("location:Search.php"); 
        exit;  
        } 

       }
       if(isset($_POST['Delete'])){//Delete resident from database when delete button is clicked
    $id=$_POST['id1'];
    $del=mysqli_query($db,"DELETE FROM `resident_chores` WHERE `Resident_Chore_ID`='$id' ");//delete query
    if ($del) {
        header("location:Search.php"); // redirects to form page
        exit;   

        }
    }

       ?> 

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Search</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Search.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Search">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <section class="u-align-center u-clearfix u-section-1" id="carousel_ebbd">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img  class="u-image u-image-default u-image-1" src="images/choresuplogo.png" alt="" data-image-width="2602" data-image-height="855" >
        <div class="u-expanded-width u-form u-form-1">
          <form  method="POST" >
            <div class="u-form-group u-form-select u-form-group-1">
              <label for="select-6571" class="u-form-control-hidden u-label"></label>
              <div class="u-form-select-wrapper">
                <select id="select-6571" name="searchres" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="required">
                  <option value="">Search Resident</option>
                   <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
        $records = mysqli_query($db,"SELECT * FROM `residents` WHERE `House_Id`='$house' AND House_head='No' "); // fetch data from database
        //Displaying members in the house in the dropdown box
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>  <option value="<?php echo $data['Resident_Id'];?>"><?php echo $data['Resident_Name'];?></option>
<?php
}


?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
              </div>
            </div>
            <div class="u-form-group u-form-submit">
              
              <input type="submit" value="Search" name="sres" class="u-btn u-btn-submit u-button-style">
            </div>
          </form>
        </div>
        <div class="u-expanded-width u-form u-form-2">
          <form  method="POST" >
            <div class="u-form-group u-form-select u-form-group-3">
              <label for="select-6571" class="u-form-control-hidden u-label"></label>
              <div class="u-form-select-wrapper">
                <select id="select-6571" name="searchchor" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="required">
                  <option value="">Search Chore</option>
                   <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
        $records = mysqli_query($db,"SELECT * FROM `chores` WHERE `House_Id`='$house' "); // fetch data from database
        //Displaying chores available for the house in a dropdown
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>  <option value="<?php echo $data['Chore_Id'];?>"><?php echo $data['Chore_Name'];?></option>
<?php
}


?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
              </div>
            </div>
            <div class="u-form-group u-form-submit">
              
              <input type="submit" value="Search" name="schore" class="u-btn u-btn-submit u-button-style">
            </div>
          </form>
        </div>
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity u-table-entity-1">
            <colgroup>
              <col width="14.3%">
              <col width="12.3%">
              <col width="12.3%">
              <col width="12.3%">
              <col width="15.3%">
              <col width="18.900000000000006%">
              <col width="14.500000000000005%">
            </colgroup>
            <thead class="u-custom-font u-font-courier-new u-palette-1-base u-table-header u-table-header-1">
              <tr style="height: 59px;">
                <th class="u-table-cell">Name</th>
                <th class="u-table-cell">Chore</th>
                <th class="u-table-cell">Equipment</th>
                <th class="u-table-cell">Date</th>
                <th class="u-table-cell">Completed</th>
                <th class="u-table-cell">Update</th>
                <th class="u-table-cell">Delete</th>
              </tr>
            </thead>
             <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
      if(isset($_POST['sres'])){
    //Sequence of tables that change when you search according to chores and members. If you have not filtered the table it shows all the chore allocations
      $res=$_POST['searchres'];
        $records = mysqli_query($db,"SELECT residents.Resident_Name, chores.Chore_Name, equipment.Equipment_Name, `Date`, `Task_Complete`, `Resident_Chore_ID` FROM `resident_chores`  INNER JOIN residents on resident_chores.Resident_Id = residents.Resident_Id  INNER JOIN chores on resident_chores.Chore_Id = chores.Chore_Id INNER JOIN equipment on resident_chores.Equipment_Id = equipment.Equipment_Id WHERE resident_chores.House_Id='$house' AND resident_chores.Resident_Id='$res' "); // fetch data from database
        if($records){
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>
            <tbody class="u-table-body">
              <tr style="height: 55px;">
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Resident_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Chore_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Equipment_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Date']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Task_Complete']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                  <form method="POST" >
      <input type="submit" value="Update Progress"  name="update" class="u-btn u-btn-submit u-button-style" onclick="return confirm('Are you sure you want to update completion status?')" >
      <input type="hidden" name="id"  value="<?php echo $data['Resident_Chore_ID'];  ?>">
      <input type="hidden" name="complete"  value="<?php echo $data['Task_Complete'];  ?>">
    </form>
                </td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                  <form method="POST" >
                    <input type="hidden" name="id1"  value="<?php echo $data['Resident_Chore_ID'];  ?>">
      <input type="submit" value="Delete" name="Delete" class="u-btn u-btn-submit u-button-style" onclick="return confirm('Are you sure you want to delete this allocation?')" >
    </form></td>
              </tr>
            </tbody>
            <?php
}}
}
elseif (isset($_POST['schore'])) {
  $cid=$_POST['searchchor'];
     
        $records = mysqli_query($db,"SELECT residents.Resident_Name, chores.Chore_Name, equipment.Equipment_Name, `Date`, `Task_Complete`, `Resident_Chore_ID` FROM `resident_chores`  INNER JOIN residents on resident_chores.Resident_Id = residents.Resident_Id  INNER JOIN chores on resident_chores.Chore_Id = chores.Chore_Id INNER JOIN equipment on resident_chores.Equipment_Id = equipment.Equipment_Id WHERE resident_chores.House_Id='$house' AND resident_chores.Chore_Id='$cid' "); // fetch data from database
        if($records){
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>
            <tbody class="u-table-body">
              <tr style="height: 55px;">
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Resident_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Chore_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Equipment_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Date']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Task_Complete']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                  <form method="POST" >
      <input type="submit" value="Update Progress"  name="update" class="u-btn u-btn-submit u-button-style" onclick="return confirm('Are you sure you want to update completion status?')" >
      <input type="hidden" name="id"  value="<?php echo $data['Resident_Chore_ID'];  ?>">
      <input type="hidden" name="complete"  value="<?php echo $data['Task_Complete'];  ?>">
    </form>
                </td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                  <form method="POST" >
                    <input type="hidden" name="id1"  value="<?php echo $data['Resident_Chore_ID'];  ?>">
      <input type="submit" value="Delete" name="Delete" class="u-btn u-btn-submit u-button-style" onclick="return confirm('Are you sure you want to delete this allocation?')" >
    </form></td>
              </tr>
            </tbody>
            <?php
}}
}
else{
        $records = mysqli_query($db,"SELECT residents.Resident_Name, chores.Chore_Name, equipment.Equipment_Name, `Date`, `Task_Complete`, `Resident_Chore_ID` FROM `resident_chores`  INNER JOIN residents on resident_chores.Resident_Id = residents.Resident_Id  INNER JOIN chores on resident_chores.Chore_Id = chores.Chore_Id INNER JOIN equipment on resident_chores.Equipment_Id = equipment.Equipment_Id WHERE resident_chores.House_Id='$house' "); // fetch data from database
        if($records){
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>
            <tbody class="u-table-body">
              <tr style="height: 55px;">
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Resident_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Chore_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Equipment_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Date']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Task_Complete']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                  <form method="POST" >
      <input type="submit" value="Update Progress"  name="update" class="u-btn u-btn-submit u-button-style" onclick="return confirm('Are you sure you want to update completion status?')" >
      <input type="hidden" name="id"  value="<?php echo $data['Resident_Chore_ID'];  ?>">
      <input type="hidden" name="complete"  value="<?php echo $data['Task_Complete'];  ?>">
    </form>
                </td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                  <form method="POST" >
                    <input type="hidden" name="id1"  value="<?php echo $data['Resident_Chore_ID'];  ?>">
      <input type="submit" value="Delete" name="Delete" class="u-btn u-btn-submit u-button-style" onclick="return confirm('Are you sure you want to delete this allocation?')" >
    </form></td>
              </tr>
            </tbody>
            <?php
}}
}


?>
          </table>
           <form method="POST" action="AdminDashboard.php">
      <input type="submit" value="Back to Dashboard" class="u-btn u-btn-submit u-button-style" >
    </form>
        </div>
      </div>
    </section>
   
    
    

  </body>
</html>
