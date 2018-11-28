<html>  
      <head>  
           <title>SalesOrder</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      
	  <body background bgcolor="LavenderBlush">
           <div class="container">  
                <div class="table-responsive">
		     <div class="page-header">  
                     <h1 align="center">Salesorder Table</h1><br />
		     </div>  
	<h3>Select Customer ID:</h3>
	<?php
	$host = "localhost";
	$db_name = "mysql";
	$username = "root";
	$password = "Abcd#1234";
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	$stmt = $con->prepare("select CID from customers");
	$stmt->execute();
    	echo "<select CID='CID' class='form-control'>";
	echo '<option value="">None</option>';
    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                  echo '<option value="'.$row["CID"].'">'.$row["CID"].'</option>';                
	}
    	echo "</select>";
	?>
	<br />
                     <div id="live_data"></div>            
                </div>  
           </div>  
      </body>  
</html>  
<script>  
 $(document).ready(function(){  
	var CID = $('#CID').val();
      $("#CID").change(function(){
       CID = $('#CID').val();
	fetch_data();
      });
      function fetch_data()  
      {  
           $.ajax({  
                url:"retrieveorder.php",  
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
           var CID= $('#CID').text();   .
	   var DATE = $('#DATE').text();
	   var ID = $('#ID').val();
	   var PRODUCT = $('#PRODUCT').val();
	   var QUANTITY1 = $('#QUANTITY').text(); 
	   var RATE1 = $('#RATE').text();
	   var QUANTITY = parseInt(QUANTITY1);
	   var RATE = parseInt(RATE1);
	   var AMOUNT = QUANTITY*RATE;
           if(ORDERNO == '')  
           {  
                alert("Enter ORDER NUMBER");  
                return false;  
           }    
           if(DATE == '')  
           {  
                alert("Enter DATE");  
                return false;  
           }   
           if(QUANTITY == '')  
           {  
                alert("Enter QUANTITY");  
                return false;  
           }  
           $.ajax({  
                url:"createorder.php",  
                method:"POST",  
                data:{ORDERNO:ORDERNO, CID:CID DATE:DATE, ID:ID, PRODUCT:PRODUCT, QUANTITY:QUANTITY, RATE:RATE, AMOUNT:AMOUNT},  
                dataType:"text",  
                success:function(data)  
                {  
                     //alert(data); 
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"editorder.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
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
           var id = $(this).data("id3");  
           var DATE = $(this).text();  
           edit_data(id, DATE, "DATE");  
      });  
      $(document).on('blur', '.ID', function(){  
           var id = $(this).data("id4");  
           var ID = $(this).val();  
           edit_data(id, ID, "ID");  
      });
      $(document).on('blur', '.PRODUCT', function(){  
           var id = $(this).data("id5");  
           var PRODUCT = $(this).val();  
           edit_data(id, PRODUCT, "PRODUCT");  
      });  
      $(document).on('blur', '.QUANTITY', function(){  
           var id = $(this).data("id6");  
           var QUANTITY = $(this).text();  
           edit_data(id, QUANTITY, "QUANTITY");  
      });
      $(document).on('blur', '.RATE', function(){  
           var id = $(this).data("id7");  
           var RATE = $(this).text();  
           edit_data(id, RATE, "RATE");  
      });   
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id9");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"deleteorder.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          //alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
</script>
