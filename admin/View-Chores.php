<?php
session_start();

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
       if(isset($_POST['Delete'])){//Delete chore from database when delete button is clicked
    $id=$_POST['id'];
    $del=mysqli_query($db,"DELETE FROM `chores` WHERE `Chore_Id`='$id' ");//delete query
    if ($del) {
        header("location:View-Chores.php"); // redirects to form page
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
    <title>View Chores</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="View-Chores.css" media="screen">
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
    <meta property="og:title" content="View Chores">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <section class="u-align-center u-clearfix u-section-1" id="carousel_1898">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h3 class="u-text u-text-default u-text-1">VIEW CHORES</h3>
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity u-table-entity-1">
            <colgroup>
              <col width="33.1%">
              <col width="33.1%">
              <col width="33.8%">
            </colgroup>
            <thead class="u-custom-font u-font-courier-new u-palette-1-base u-table-header u-table-header-1">
              <tr style="height: 58px;">
                <th class="u-table-cell">Name</th>
                <th class="u-table-cell">Description</th>
                <th class="u-table-cell">Delete</th>
              </tr>
            </thead>
            <tbody class="u-table-body">
               <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
    
      //Display the house chores available
        $records = mysqli_query($db,"SELECT * FROM chores WHERE House_Id='$house'  "); // fetch data from database
        if($records){
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>
              <tr style="height: 54px;">
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Chore_Name']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><?php echo $data['Chore Description']; ?></td>
                <td class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                  <form method="POST" >
                    <input type="hidden" name="id"  value="<?php echo $data['Chore_Id'];  ?>">
      <input type="submit" value="Delete" name="Delete" class="u-btn u-btn-submit u-button-style" onclick="return confirm('Are you sure you want to delete this chore?')" >
    </form>
                </td>
              </tr>
            </tbody>
            <?php
}}


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