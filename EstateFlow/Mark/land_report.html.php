<!-- Estate Flow - Land Report Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Land Reports</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\menu.css">
	<link rel="stylesheet" href="add_land.css">
	<link rel="stylesheet" href="report.css">
</head>
<body>
	
	<?php include 'db.inc.php';
	?>
	
    <!-- Fixed Top Bar displaying the page title -->
    <div class="topBar">EstateFlow</div>
   
    <!-- Sidebar Navigation Menu -->
    <div class="sidebar" id="mySidebar">
        <!-- Logo Section inside Sidebar -->
        <div class="logo">
            <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"></a>
        </div>
        <!-- Navigation Links -->
        <a class ="button" href="..\construction/residential_report.html">Residential Property Report</a>
        <a class ="button selected" href="land_report.html.php">Land Property Report</a>
        <a class ="button" href="..\construction/office_report.html">Office Property Report</a>
        <a class ="button" href="..\Darius/bid_report.html">Bid Report</a>
        <a class ="button" href="..\construction/client_report.html">Client Report</a>
        <a class ="button" href="..\construction/individual_report.html">Individual Client Report</a>
        <a class ="button" href="..\construction/sales_report.html">Sales Report</a>
        <a class ="button">Exit</a>
    </div>
    
	<form action = "land_report.html.php" method = "post" name = "reportForm">
		<input type = "hidden" name = "choice">
	</form>
	
    <!-- Main Content Area -->
    <div class="content">

		
		<div class = "report">
		<div class = "myButton">
			<h1>Land Reports</h1>
			<input type = "button" id = "priceButton" value = "Order by Price" onclick = "priceOrder()" title="Click here to see the Land table in Ascending Price order">
			<input type = "button" id = "acreButton" value = "Order by Acreage" onclick = "acreOrder()" title="Click here to see the Land table in Ascending Acreage order">
			<input type = "button" id = "clientButton" value = "Owner Information" onclick = "clientInformation()" title="Click here to see the information on a Client who owns a selected Land Property">
	
		</div>
		<br><br>
		
		<script>
			
			function acreOrder(){
				document.reportForm.choice.value = "Acre";
				document.reportForm.submit();
			}
			
			function priceOrder(){
				document.reportForm.choice.value = "Price";
				document.reportForm.submit();
			}
		</script>
		
		<?php
			$choice = "Price";

			if(ISSET($_POST['choice'])){
				$choice = $_POST['choice'];
			}

			if($choice == "Price"){

		?>
		
				<script>
					
					document.getElementById("acreButton").disabled = false;
					document.getElementById("priceButton").disabled = true;
				</script>
					
				<?php
						$sql = "SELECT * FROM Land INNER JOIN Property ON Land.property_id = Property.property_id WHERE Land.delete_flag = 0 AND Property.status != 0 ORDER BY asking_price ASC";
						produceReport($con, $sql);
			}
			if($choice == "Acre"){
				?>
		
				<script>
					document.getElementById("acreButton").disabled = true;
					document.getElementById("priceButton").disabled = false;
				</script>
		
				<?php
						$sql = "SELECT * FROM Land INNER JOIN Property ON Land.property_id = Property.property_id WHERE Land.delete_flag = 0 AND Property.status != 0 ORDER BY acres ASC";
						produceReport($con, $sql);
				
			};

			function produceReport($con, $sql){
				$result = mysqli_query($con, $sql);

				echo "<table>
				<tr><th> </th>
				 <th>Property Number</th>
				 <th>Address</th>
				 <th>No. of Acres</th>
				 <th>Quotas</th>
				 <th>Residence Details</th>
				 <th>Status</th>
				 <th>Highest Bid</th>
				 <th>Asking Price</th></tr>";
				while($row = mysqli_fetch_array($result)){
					
					if($row['status'] == 1){
						$status = "Sale Agreed";
					}
					else if($row['status'] == 2){
						$status = "Sale Complete";	
					}
					//Echo out a radio button for each property, that when selected will be used to display client info
					 echo"<td><input type='radio' name='property' onclick='selectProperty(" . $row['property_id'] . ")'></td>
					 <td>" . $row['property_id'] . "</td> 
				  <td>" . $row['address'] . "</td>
				   <td>" . $row['acres'] . "</td>
					<td>" . $row['quotas'] . "</td>
					<td>" . $row['residence_details'] . "</td>
					<td>" . $status . "</td>
					<td>" . $row['highest_bid'] . "</td>
					<td>" . $row['asking_price'] . "</td>
	 </tr>";
				}
echo "</table>";

			}
mysqli_close($con);
?>
    </div>
	</div>
	
</body>
</html>