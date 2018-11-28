<!DOCTYPE html>
<html>
<?php  
 $connect = mysqli_connect('localhost', 'root', 'Abcd#1234', 'mysql');  
 $CID = '';
 if (isset($_POST['save'])) {
	 $CID = $_POST['CID'];
 }
 $sql = "SELECT * FROM SALESORDER13165 WHERE CID='$CID' ORDER BY ORDERNO";  
 $sql1 = "SELECT * FROM customers WHERE CID='$CID'";
 $sql2 = "SELECT ID FROM SALESPERSON13165";
 $sql3 = "SELECT CODE FROM PRODUCTS13165";
 $result = mysqli_query($connect, $sql);  
 $result1 = mysqli_query($connect, $sql1);
 $result2 = mysqli_query($connect, $sql2);
 $row = mysqli_fetch_array($result1);
  $output = '
	<h3>Invoice Heading</h3>
	<table>
	 <tr>
	 <th style="background-color: #lavenderblush; padding: 20px;">CID</th>
	 <th style="background-color: #lavenderblush; padding: 20px;">SName</th>
	 <th style="background-color: #lavenderblush; padding: 20px;">CName</th>
	 <th style="background-color: #lavenderblush; padding: 20px;">CNo</th>
	 <th style="background-color: #lavenderblush; padding: 20px;">Address</th>
	 <th style="background-color: #lavenderblush; padding: 20px;">Area</th>
	 <th style="background-color: #lavenderblush; padding: 20px;">GC</th>
	 </tr>
	<tr>
		 
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["CID"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["SName"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["CName"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["CNo"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["Address"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["Area"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["Coordinates"].'</td>
	</tr>
	</table>
<h3>Invoice Lines</h3>
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
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
	   $result2 = mysqli_query($connect, $sql2);
           $output .= '  
                <tr>  
                     <td class="ORDERNO" data-id1="$ORDERNO" contenteditable>"$ORDERNO"</td>  
                     <td>"$CID"</td> 
                     <td class="$DATE" data-id3="$ORDERNO" contenteditable>"$DATE"</td>
                     <td>';
		     $output .= '<select class="ID form-control" data-id4="$ORDERNO">';
			$output .= '<option value="">None</option>';
    			while ($row1 = mysqli_fetch_array($result2)) { 
                  	$output .= '<option value="'.$row1["ID"].'"'.($row["ID"]==$row1["ID"]?'selected="selected"':"").'>'.$row1["ID"].'</option>';                
			}
    			$output .= '</select>
			</td>
                     	<td>';
		     	$output .= '<select class="CODE form-control" data-id5="'.$row["$ORDERNO"].'">';
			$output .= '<option value="">None</option>';
    			while ($row2 = mysqli_fetch_array($result3)) { 
                  	$output .= '<option value="'.$row2["CODE"].'"'.($row["CODE"]==$row2["CODE"]?'selected="selected"':"").'>'.$row2["CODE"].'</option>';                
			}
    			$output .= '</select>
		     </td>
                     <td class="QUANTITY" data-id6="$ORDERNO" contenteditable>"$QUANTITY"</td>
                     <td class="RATE" data-id7="$ORDERNO" contenteditable>"$RATE"</td>
                     <td>"$CID"</td> 
                     <td><button type="button" name="delete_btn" data-id9="'.$row["ORDERNO"].'" class="btn btn-xs btn-danger btn_delete">Delete</button></td>  
                </tr>  
           ';  
      }  
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
      ';  
 }  
 else  
 {  
      $output .= '
		<tr>  
                <td id="ORDERNO" contenteditable></td>  
                <td id="$CID"</td>  
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
</html>
