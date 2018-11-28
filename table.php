<html>
<head>  
           <title>Sales Order</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>   
<body style="background-color:lavender">
       
<style>

/* Add a black background color to the top navigation */
.nav {
    background-color: #333;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.nav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.nav a:hover {
    background-color: #ddd;
    color: black;
}

/* Add a color to the active/current link */
.nav a.active {
    background-color: #4CAF50;
    color: white;
}

</style>

     
<div class="nav">
  <a href='home.php'><b>HOME</b></a>
  <a href='database.php'><b>Customer</b></a>
  <a  href='salesperson.php'><b>SalesPerson</b></a>
  <a href='users.php'><b>User</b></a>
  <a href='products.php'><b>Product</b></a>
  <a class="active" href='table.php'><b>SalesOrder</b></a>

  <a  href='logout.php'><b>LOGOUT</b></a>


</div>
           <div class="container">  
                <div class="table-responsive"> 

<h3>Select CUSTOMER: </h3>

<?php
$host = "localhost";
$db_name = "mysql";
$username = "root";
$password = "Abcd#1234";
$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	$stmt = $con->prepare("select CID from customers");
	$stmt->execute();
    	echo "<select id='CID' class='form-control'>";
	echo '<option value="">None</option>';
    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                  echo '<option value="'.$row["CID"].'">'.$row["CID"].'</option>';                
	}
    	echo "</select>";
	?>
	</br>
<div id="live_data"></div>  
		</div>                 
           </div>  
      </body>  
 
 <script>  
 	$(document).ready(function(){  
	var CID= $('#CID').val();
	window.alert("aaaa");
	$('#CID').change(function(){
		alert("aaaa");
	CID = $('#CID').val();	
      	 fetch_data();
	});
	
	function fetch_data()
      {  
	  var CID= $('#CID').val();
	  alert("aa");
           $.ajax({  
                url:"ret.php",  
                method:"POST",  
		data:{CID:CID},
		dataType:"text",
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
	   var ORDERNO = $('#ORDERNO').text(); 
           var CID = CID;  
           var DATE = $('#DATE').text();  
           var ID = $('#ID').val();  
           var CODE = $('#CODE').val();
           var QUANTITY1 = $('#QUANTITY').text();  
           var RATE1 = $('#RATE').text(); 
	var QUANTITY= parseInt(QUANTITY1);
	var RATE= parseInt(RATE1); 
           var AMOUNT = QUANTITY*RATE;  
           if(ORDERNO == '')  
           {  
                alert("Enter OrderNo");  
                return false;  
           }   
	   if(DATE == '')  
           {  
                alert("Enter date");  
                return false;  
           }  
           if(QUANTITY == '')  
           {  
                alert("Enter Quanity");  
                return false;  
           }    
                $.ajax({  
                url:"create.php",  
                method:"POST",  
                data:{ORDERNO:ORDERNO, CID:CID,DATE:DATE,ID:ID, CODE:CODE, QUANTITY:QUANTITY, RATE:RATE,AMOUNT:AMOUNT},  
                dataType:"text",  
                success:function(data)  
                {  
                    // alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                    // alert(data);  
			fetch_data();
                }  
           });  
      }  

      $(document).on('blur', '.ORDERNO', function(){  
           var id = $(this).data("id1");  
           var ORDERNO = $(this).text();  
           edit_data(id, ORDERNO, "ORDERNO");  
      });  
      $(document).on('blur', '.DATE', function(){  
           var id= $(this).data("id3");  
           var DATE = $(this).text();  
           edit_data(id,DATE, "DATE");  
      });  
      $(document).on('blur', '.ID', function(){  
           var id = $(this).data("id4");  
           var ID = $(this).text();  
           edit_data(id,ID, "ID");  
      });  
      $(document).on('blur', '.CODE', function(){  
           var id = $(this).data("id5");  
           var CODE = $(this).text();  
           edit_data(id,CODE, "CODE");  
      });  
      $(document).on('blur', '.QUANTITY', function(){  
           var id = $(this).data("id6");  
           var QUANTITY= $(this).text();  
           edit_data(id,QUANTITY, "QUANTITY");  
      });  
      $(document).on('blur', '.RATE', function(){  
           var id = $(this).data("id7");  
           var RATE = $(this).text();  
           edit_data(id,RATE, "RATE");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id9");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                    url:"delete.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data)
					{  
						fetch_data();  
                    }  
                });  
           }  
      });  
 });  
 </script>
 </html>
