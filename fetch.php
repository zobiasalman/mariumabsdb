<?php  
 $connect = mysqli_connect("localhost", "root", "marium95", "mysql");  
 $output = '';  
 $sql = "SELECT * FROM SALESORDER13165 WHERE CID='".$_POST["CID"]."' ORDER BY ORDERNO";  
 $sql1 = "SELECT * FROM customers WHERE CID='".$_POST["CID"]."'";
 $sql2 = "SELECT ID FROM SALESPERSON13165";
 $sql3 = "SELECT CODE FROM PRODUCTS13165";
 $result = mysqli_query($connect, $sql);  
 $result1 = mysqli_query($connect, $sql1);
 $result2 = mysqli_query($connect, $sql2);
 $row = mysqli_fetch_array($result1);
 $output .= '  
<table border="1" align="center" table width="1200">
<tr style="background-color:DodgerBlue; padding: 20px;"> <th>ID</th> <th>ShopName</th> <th>CustomerName</th> <th>ContactNo</th> <th>Address</th> <th>Area</th> <th>GeographicalCoordinates</th></tr>
	 
	<tr style="background-color: white; padding: 20px;">
	     <td>'.$row["CID"].'</td>
	     <td>'.$row["SName"].'</td>
	     <td>'.$row["CName"].'</td>
	     <td>'.$row["CNo"].'</td>
	     <td>'.$row["Address"].'</td>
	     <td>'.$row["Area"].'</td>
	     <td>'.$row["GeometricCoordinates"].'</td>
	</tr>
	</table>
<h3>Sale Orders</h3>
      <div class="table-responsive">  
           <table  class="table table-bordered"" align="center" table width="1200">  
                <tr style="background-color:DodgerBlue;">  
                     <th width="10%" style="padding: 20px;">Order No.</th>  
                     <th width="40%" style="padding: 20px;">Customer ID</th>  
                     <th width="40%" style="padding: 20px;">Date</th> 
                     <th width="40%" style="padding: 20px;">Salesperson ID</th>
                     <th width="40%" style="padding: 20px;">Product Code</th>
                     <th width="40%" style="padding: 20px;">Quantity</th>
                     <th width="40%" style="padding: 20px;">Rate</th>
                     <th width="40%" style="padding: 20px;">Amount</th> 
                     <th width="10%" style="padding: 20px;">Action</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
	   $result3 = mysqli_query($connect, $sql3);
		//pcode and spid
	   $result2 = mysqli_query($connect, $sql2);
           $output .= '  
           <tr style="background-color: white; padding: 20px;">  
                     <td class="ORDERNO" data-id1="'.$row["ORDERNO"].'" contenteditable>'.$row["ORDERNO"].'</td>  
                     <td>'.$row["CID"].'</td> 
                     <td class="DATE" data-id3="'.$row["ORDERNO"].'" contenteditable>'.$row["DATE"].'</td>
                     <td>';
		     $output .= '<select class="ID form-control" data-id4="'.$row["ORDERNO"].'">';
			$output .= '<option value="">None</option>';
    			while ($row1 = mysqli_fetch_array($result2)) { 
$output .= '<option value="'.$row1["ID"].'"'.($row["ID"]==$row1["ID"]?'selected="selected"':"").'>'.$row1["ID"].'</option>';
             									}
$output .= '</select>
			</td>
                     	<td>';
		     	$output .= '<select class="CODE form-control" data-id5="'.$row["ORDERNO"].'">';
			$output .= '<option value="">None</option>';
    			while ($row2 = mysqli_fetch_array($result3)) { 

$output .= '<option value="'.$row2["CODE"].'"'.($row["CODE"]==$row2["CODE"]?'selected="selected"':"").'>'.$row2["CODE"].'</option>';
                  	                 
			}
    			$output .= '</select>
		     </td>
                     <td class="QUANTITY" data-id6="'.$row["ORDERNO"].'" contenteditable>'.$row["QUANTITY"].'</td>
                     <td class="RATE" data-id7="'.$row["ORDERNO"].'" contenteditable>'.$row["RATE"].'</td>
                     <td>'.$row["AMOUNT"].'</td> 
<td><button type="button" name="delete_btn" data-id9="'.$row["ORDERNO"].'" class="btn btn-xs btn-danger btn_delete">Delete</button></td>
        </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="ORDERNO" contenteditable></td>  
                <td id="CID">'.$_POST["CID"].'</td>  
                <td id="Date" contenteditable></td>  
                <td>';
		$output .= '<select id="ID" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($connect, $sql2);
    		while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["ID"].'">'.$row1["ID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td>';
		$output .= '<select id="CODE" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($connect, $sql3);
    		while ($row2 = mysqli_fetch_array($result3)) { 
                  $output .= '<option value="'.$row2["CODE"].'">'.$row2["CODE"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="QUANTITY" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
$output .= '
		<tr>  
                <td id="ORDERNO" contenteditable></td>  
                <td id="CID">'.$_POST["CID"].'</td>  
                <td id="DATE" contenteditable></td>  
                <td>';
		$output .= '<select id="ID" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($connect, $sql2);
    		while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["ID"].'">'.$row1["ID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td>';
		$output .= '<select id="CODE" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($connect, $sql3);
    		while ($row2 = mysqli_fetch_array($result3)) { 
                  $output .= '<option value="'.$row2["CODE"].'">'.$row2["CODE"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="QUANTITY" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>		
<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
