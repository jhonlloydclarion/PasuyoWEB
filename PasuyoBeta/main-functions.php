<?php  
function ConnectionDB($database_name){
    $servername = "localhost";
    $user = "pasuyos1_jhonlloydc";
    $password = "Jhon12!@Jhon12!@";

    // $user = "root";
    // $password = "";
    $database = $database_name;

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
function RunQerry($sql_statement,$database){
    $conn = ConnectionDB($database);
    $sql = $sql_statement;
    $results = mysqli_query($conn,$sql);

    return $results;
}
function CheckIfExistInCart($database,$prod_id){
  
    $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id.";";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);

    if ($resultchecks > 0){

     
        return True;
    }
    else{
     
        return False;
    }
}
function FindAccount($database,$username,$password){

    

    $sql_statement = "SELECT * FROM customer WHERE cust_username='".$username."' and cust_password='".$password."';";

    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);

    if($resultchecks>0){
        $roww = mysqli_fetch_array($results);

        return ($roww['cust_id']);
    }
    else{
        return False;
    }
}
function DisplayProducts($database,$Category){

    echo " <div class='products-holder'>";

    $sql_statement = "SELECT * FROM product WHERE prod_category='".$Category."' ORDER BY prod_name ASC";
    $results = RunQerry($sql_statement,$database);


    $resultchecks = mysqli_num_rows($results);
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            $prod_image = "img/". $roww["prod_img"];
            $prod_name = $roww["prod_name"];
            $prod_price = $roww["prod_price"];
            $prod_id = $roww["prod_id"]; // Temporary

            echo "
                    <div class='product-box'>
                        <input type='hidden' name='prod_id' value=".$prod_id.">
                        <div class='img-container'>
                            <img src='".$prod_image."'>
                        </div>
                        <label class='prod-lbl'>".$prod_name."</label>
                        <label class='price-lbl'>P ".number_format($prod_price)."</label>
                        <div class='btn-container'>
                            <input id='".$prod_id."'' class='btn-submit' type='submit' ' value='Add to cart' name='addcart' onclick='Post(this.id);'>
                        </div>
                    </div>
            ";
        }
    }
    echo "</div>";
}
function CheckoutDisplay($database,$cust_id){
    $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$cust_id.";";
    $results = RunQerry($sql_statement,$database);


    $resultchecks = mysqli_num_rows($results);

    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            $prod_image = "img/". $roww["prod_img"];
            $prod_name = $roww["prod_name"];
            $prod_price = $roww["prod_price"];
            $prod_qty = $roww['prod_qty'];
            $prod_id = $roww["prod_id"]; // Temporary
            $total = $roww['total'];

            echo "
                    <div class='m-box'>
                        <div class='pic-box'>
                            <img class='picture' src='".$prod_image."'>
                        </div>
                        <div class='sub-box'>
                            <div class='top-box'>
                                <label class='title'>
                                ".$prod_name."
                                </label>
                            </div>
                            <div class='bot-box'>
                                <div class='p-box'>
                                    <label id='price-".$prod_id."' >P ".number_format($total)."</label>
                                </div>
                                <div class='a-box'>
                                    <input id='".$prod_id."' class='btn-qty' type='submit' value='-' onclick='AddQty(this.id,this.value)'>
                                    <label id='display-".$prod_id."' class='lbl'>".$prod_qty."</label>
                                    
                                    <input id='".$prod_id."' class='btn-qty' type='submit' value='+' onclick='AddQty(this.id,this.value)'>
                                </div>
                                
                            </div>
                            <form class='remove-box' method='post' action='checkout.php'>
                                <input type='hidden' name='get_id' value='".$prod_id."'></input>
                                <input class='remove-btn' name='remove' type='submit' value='Delete'>
                            </form>         
                        </div>  
                    </div>";
        }
    }
}
function AddCart($database,$prod_id){


    //---------- Fetch Data ---------------//
    $sql_statement = "SELECT * FROM product WHERE prod_id=".$prod_id."";
    $results = RunQerry($sql_statement,$database);


    //---------- Get the 1 result Data ---------------//
    // $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);


    // Check if the product exist in the generalcart
    $prod_exist = CheckIfExistInCart($database,$prod_id);


    if ($prod_exist == True){

        $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id.";";
        $results = RunQerry($sql_statement,$database);

        $resultchecks = mysqli_num_rows($results);
        $new_roww = mysqli_fetch_array($results);

        $new_qty = $new_roww['prod_qty'] + 1;

        // UPDATE QTY
        $sql_statement = "UPDATE generalcart SET prod_qty=".$new_qty." WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id.";";
        $results = RunQerry($sql_statement,$database);

    }else{


        $sql_statement = "INSERT INTO generalcart (user_id, prod_id, prod_name, prod_price, prod_img, prod_category, prod_qty) VALUES (".$_SESSION['cust_id'].", ".$roww['prod_id'].", '".$roww['prod_name']."',".$roww['prod_price'].", '".$roww['prod_img']."','".$roww['prod_category']."',1);";

        $results = RunQerry($sql_statement,$database);


    }

    $updated_total = UpdateTotal($database,$prod_id);
}
function UpdateTotal($database,$prod_id){
    $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id.";";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);
    $new_roww = mysqli_fetch_array($results);

    $new_total = $new_roww['prod_price'] * $new_roww['prod_qty'];

    // UPDATE QTY
    $sql_statement = "UPDATE generalcart SET total=".$new_total." WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id.";";
    $results = RunQerry($sql_statement,$database);

    return $new_total;
}
function DecreaseQty($database,$prod_id){
    $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id.";";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);
    $new_roww = mysqli_fetch_array($results);

    $new_qty = $new_roww['prod_qty'] - 1;

    // UPDATE QTY
    $sql_statement = "UPDATE generalcart SET prod_qty=".$new_qty." WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id.";";
    $results = RunQerry($sql_statement,$database);

    return $new_qty;
}
function CartCounter($database){
    $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);

    $roww = mysqli_fetch_array($results);
    return $resultchecks;
}
function QtyCounter($database,$prod_id){

    $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id']." and prod_id=".$prod_id."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    // echo $resultchecks;
    return $roww['prod_qty'];
}
function DisplayCheckOutTotal($database){

    $sql_statement = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
    $total = 0;
    $resultchecks = mysqli_num_rows($results);
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){
            $total = $total + $roww['total'];
        }
    }
    return $total;
}
function DeleteItemInCart($database,$prod_id){
    $sql_statement = "DELETE FROM generalcart WHERE user_id=".$_SESSION['cust_id']." AND prod_id=".$prod_id.";";
    $results = RunQerry($sql_statement,$database);
}
function Set_Order_Status($database,$status){
    //-------------------------------------------------//
       
        $sql_statement = "UPDATE customer SET order_status='".$status."' WHERE cust_id=".$_SESSION['cust_id']."";
        $results = RunQerry($sql_statement,$database);
}
function ProcessOrders($database){
    // Check if the order_id is exist
    $sql_statement_5 = "SELECT * FROM onprocess WHERE cust_id=".$_SESSION['cust_id']."";
    $results_5 = RunQerry($sql_statement_5,$database);

    $resultchecks_5 = mysqli_num_rows($results_5);
    $roww_5 = mysqli_fetch_array($results_5);

    if($resultchecks_5 == 0){

        //generate unique order variable
        
        $order_id = rand(10000, 99999);
        $prod_avail = "Available";
        //insert the data into table onprocess
        //*prod_availability

        $sql_statement_3 = "SELECT * FROM generalcart WHERE user_id=".$_SESSION['cust_id'].";";
        $results_3 = RunQerry($sql_statement_3,$database);

        $resultchecks_3 = mysqli_num_rows($results_3);

        $currentDateTime = date('Y-m-d H:i:s');
        if ($resultchecks_3>0){
            while ($roww = mysqli_fetch_array($results_3)){

                $sql_statement_onprocess = "INSERT INTO onprocess (order_id,cust_id,prod_id,prod_name,prod_price,prod_img,prod_qty,total,prod_availability, order_date) VALUES ( ".$order_id.", ".$_SESSION['cust_id'].", ".$roww['prod_id'].", '".$roww['prod_name']."', ".$roww['prod_price'].", '".$roww['prod_img']."', ".$roww['prod_qty'].", ".$roww['total'].", '".$prod_avail."','".$currentDateTime."')"; $results = RunQerry($sql_statement_onprocess,$database);
            }
        }
    }
    // else{
    //     $sql_statement = "UPDATE onprocess SET prod_qty=20 WHERE cust_id=".$_SESSION['cust_id']." and prod_id=123456793;";
    //     $results_3 = RunQerry($sql_statement_3,$database);

    // }
    return $order_id;
}  
function DisplayItemsInReceipt($database){

   
    $sql_statement = "SELECT * FROM onprocess WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);

    $total = 0;
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            if($roww['prod_availability'] == "Available"){
                $total = $total + $roww['total'];
            }

            
            echo "
                <div class='".$roww['prod_availability']."'>
                    <label class='prod_name'>".$roww['prod_name']."</label>
                    <label class='prod_price'>P ".$roww['prod_price']."</label>
                    <label class='prod_qty'>".$roww['prod_qty']."</label>
                    <label class='total'>P ".$roww['total']."</label>
                </div>
            ";

        }
    }
    return $total;
}
function DisplayOrderNum($database){
    $sql_statement = "SELECT * FROM onprocess WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['order_id'];
}
function CustomerOrderStatus($database,$cust_id){
    $sql_statement = "SELECT * FROM customer WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['order_status'];
}
function DisplayDateOrdered($database){
    $sql_statement = "SELECT * FROM onprocess WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['order_date'];
}
function DeleteOnProcess($database){
    
    $sql_statement = "DELETE FROM onprocess WHERE cust_id = ".$_SESSION['cust_id'].";";
    $results = RunQerry($sql_statement,$database);
}
function FindRiderInDB($database,$username,$password){
    $sql_statement = "SELECT * FROM rider WHERE rider_username='".$username."' and rider_password='".$password."';";

    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    if($resultchecks>0){
        $roww = mysqli_fetch_array($results);
        return $roww['rider_id'];
    }
    else{
        return False;
    }
}
function ReturnTotalOnProcess($database,$cust_id){
    $sql_statement = "SELECT * FROM onprocess WHERE cust_id=".$cust_id.";";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $total = 0;
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            // $cust_id = $roww['cust_id'];
            // $cur_total = OnProcessComputeTOTALReturnByCustID($database,$cust_id);
            // return $cur_total;
            $total = $total + $roww['total'];
        
        }
    }
    return $total; 
}
function DisplayCustomerStatusActive($database,$rider_city){
    // $status = "Active";
    $sql_statement = "SELECT * FROM customer WHERE order_status='Active' AND cust_city LIKE '".$rider_city."%'";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            $total = ReturnTotalOnProcess($database,$roww['cust_id']);
            echo "
                <form class='box-holder' method='post'>
                <input type='hidden' name='getid' value='".$roww['cust_id']."'></input>
                    <label class='lbl-name'><strong>Name:</strong> ".$roww['cust_name']."</label>
                    <label class='lbl-address'><strong>Address:</strong> ".$roww['cust_address']."</label>
                    <div class='amount-details'>
                        <label class='lbl-amount'><strong>Amount:</strong> ".number_format($total)."</label>
                        <label class='lbl-shipping'><strong>Shipping:</strong> 50</label>
                    </div>
                    
                    <div class='action-box'>
                        <input class='btn-accept' type='submit' name='accepted' value='Accept'>
                        <input class='btn-view-orders' type='submit' name='vieworder' value='View Orders'>
                    </div>
                    <input class='btn-locate' type='submit' name='' value='Locate'>
                </form>
            ";
        }
    }

    return $resultchecks;
}
function GetRiderCity($database){
    $sql_statement = "SELECT * FROM rider WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    return $roww['rider_city'];

}
function SetRiderViewingStatus($database,$cust_id){
    $sql_statement = "UPDATE rider SET rider_status='Viewing' WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE rider SET viewing_id=".$cust_id." WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
}
function OrderPreviewRequestedBYRider($database,$cust_id){

    $sql_statement = "SELECT * FROM onprocess WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);

    $total = 0;
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            if($roww['prod_availability'] == "Available"){
                $total = $total + $roww['total'];
            }

            
            echo "
                <div class='".$roww['prod_availability']."'>

                    <label class='prod_name'>".$roww['prod_name']."</label>
                    <label class='prod_price'>P ".$roww['prod_price']."</label>
                    <label class='prod_qty'>".$roww['prod_qty']."</label>
                    <label class='total'>P ".$roww['total']."</label>
                    </form>
                </div>
            ";

        }
    }
    return $total;
}
function ReturnAViewingIDFromTableRider($database){
    $sql_statement = "SELECT * FROM rider WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    return $roww['viewing_id'];
}
function ReturnACustomerIDFromTableRider($database){
    $sql_statement = "SELECT * FROM rider WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    return $roww['cust_id'];
}
function SetRiderStatustoBOOKED($database,$cust_id){
    $sql_statement = "UPDATE rider SET rider_status='Booked' WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE rider SET cust_id=".$cust_id." WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
}
function DisplayItemsReceiptWhereACCEPTED($database,$cust_id){

    $sql_statement = "SELECT * FROM onprocess WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);

    $resultchecks = mysqli_num_rows($results);

    $total = 0;
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            if($roww['prod_availability'] == "Available"){
                $total = $total + $roww['total'];
            }

            
            echo "
                <div class='".$roww['prod_availability']."'>
                    <form method='post' action='Accepted.php'>
                        <input type='hidden' name='get_prod_id' value='".$roww['prod_id']."'>
                        <input type='hidden' name='get_cust_id' value='".$roww['cust_id']."'>
                            
                        <div class='checkbox'>
                            <input class='prod_na' type='submit' name='prod_na' value='*'></input>
                            <input class='prod_a' type='submit' name='prod_a' value='x'></input>
                        </div>
                        <label class='prod_name'>".$roww['prod_name']."</label>
                        <label class='prod_price'>P ".$roww['prod_price']."</label>
                        <label class='prod_qty'>".$roww['prod_qty']."</label>
                        <label class='total'>P ".$roww['total']."</label>
                        
                    </form>
                </div>
            ";

        }
    }
    return $total;
}
function ReturnARiderStatus($database){
    $sql_statement = "SELECT * FROM rider WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    return $roww['rider_status'];
}
function SetProductNotAvailableFromTableOnProcess($database,$prod_id){
    $sql_statement = "UPDATE onprocess SET prod_availability='Not-Available' WHERE prod_id=".$prod_id." AND cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
}
function SetProductAvailableFromTableOnProcess($database,$prod_id){
    $sql_statement = "UPDATE onprocess SET prod_availability='Available' WHERE prod_id=".$prod_id." AND cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
}
function ReturnCustomerName($database){
    $sql_statement = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['cust_name'];
}
function ReturnCustomerAddress($database){
    $sql_statement = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['cust_address'];
}
function ReturnCustomerMobileNumber($database){
    $sql_statement = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['cust_mobile'];
}
function SetCustomerOrderStatusTOReceiving($database,$cust_id){
    $sql_statement = "UPDATE customer SET order_status='Receiving' WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);
}
function VerifySerialCode($database,$input_serial_code,$cust_id){
    $sql_statement = "SELECT * FROM onprocess WHERE cust_id=".$_SESSION['cust_id']." LIMIT 1";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    if($roww['order_id'] == $input_serial_code){
        SetCustomerOrderStatusTOReceiving($database,$cust_id);
        return "Success";
    }
    else{
        return "Invalid Code";
    }
}
function SetCustomerStatusToInactive($database){
    $sql_statement = "UPDATE customer SET order_status='Inactive' WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
}
function SetCustomerStatusToACTIVE($database){
    $sql_statement = "UPDATE customer SET order_status='Active' WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
}
function RefreshStatusOfTheRider($database){
    $sql_statement = "UPDATE rider SET rider_status='' WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE rider SET viewing_id='' WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE rider SET cust_id='' WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
}
function DeleteOrdersOfCustomerInTableOnProcess($database,$cust_id){
    $sql_statement = "DELETE FROM onprocess WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);
}
function SetCustomerOrderStatusProcessing($database,$cust_id){
    $sql_statement = "UPDATE customer SET order_status='Processing' WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);

}
function DeleteCartItemsWhenReceived($database){
    $sql_statement = "DELETE FROM generalcart WHERE user_id=".$_POST['cust_id']."";
    $results = RunQerry($sql_statement,$database);
}
function ReturnLocationLink($database){
    $sql_statement = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['loc_link'];
}
function ReturnIfThereISAssignedRider($database){
    $sql_statement = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    if($roww['assigned_delivery'] == NULL or $roww['assigned_delivery'] == ""){
        return "Available";
    }
    else{
        return "Not Available";
    }
}
function ReturnNameOftheRider($database){
    $sql_statement = "SELECT * FROM rider WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    return $roww['rider_name'];
}
function SetRiderAssignedInTableCustomer($database,$rider_name,$cust_id){
    $sql_statement = "UPDATE customer SET assigned_delivery='".$rider_name."' WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);
}
function SetCustomerAssignedRiderToNull($database,$cust_id){
    $sql_statement = "UPDATE customer SET assigned_delivery=NULL WHERE cust_id=".$cust_id."";
    $results = RunQerry($sql_statement,$database);
}
function CheckIfAlreadyAcceptedByOtherRider($database,$check_id){
    $sql_statement = "SELECT * FROM rider WHERE cust_id=".$check_id."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);

    if($resultchecks > 0){
        return "Exist";
    }
    else{
        return "Not Exist";
    }
}
function Customer_CheckIfActivatedAccount($database){
    $sql_statement = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    if($roww['reg_status'] == NULL or $roww['reg_status'] == "Not Activated"){
        return False;
    }
    else{
        return True;
    }
}
function Rider_CheckIfActivatedAccount($database){
    $sql_statement = "SELECT * FROM rider WHERE rider_id=".$_SESSION['rider_id']."";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    if($roww['reg_status'] == NULL or $roww['reg_status'] == "Not Activated"){
        return False;
    }
    else{
        return True;
    }
}
function DisplayCustomersINCustomerApplication($database){
    $sql_statement = "SELECT * FROM customer";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            echo "
                <tr>
                    <form method='post'>
                        <td>
                            <input type='hidden' name='custid' value='".$roww['cust_id']."'></input>
                            <input type='text' name='name' value='".$roww['cust_name']."'>
                        </td>
                        <td>".$roww['reg_status']."</td>
                        <td><input type='text' name='city' value='".$roww['cust_city']."'></td>
                        <td><input type='text' name='number' value='".$roww['cust_mobile']."'></td>
                        <td>
                            <input type='submit' name='activate' value='Activate'>
                            <input type='submit' name='deactivate' value='Deactivate'>
                            <input type='submit' name='update' value='Update'>
                        </td>
                    </form>
                </tr>
            ";

        }
    }
}
function DisplayRidersINCustomerApplication($database){
    $sql_statement = "SELECT * FROM rider";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

            echo "
                <tr>
                    <form method='post'>
                        <td>
                            <input type='hidden' name='custid' value='".$roww['rider_id']."'></input>
                            <input type='text' name='name' value='".$roww['rider_name']."'>
                        </td>
                        <td>".$roww['reg_status']."</td>
                        <td><input type='text' name='city' value='".$roww['rider_city']."'></td>
                        <td><input type='text' name='number' value='".$roww['rider_mobile']."'></td>
                        <td>
                            <input type='submit' name='activate' value='Activate'>
                            <input type='submit' name='deactivate' value='Deactivate'>
                            <input type='submit' name='update' value='Update'>
                        </td>
                    </form>
                </tr>
            ";

        }
    }
}
function ActivateCustomer($database,$id){
    $sql_statement = "UPDATE customer SET reg_status='Activated' WHERE cust_id=".$id."";
    $results = RunQerry($sql_statement,$database);
}

function ActivateRider($database,$id){
    $sql_statement = "UPDATE rider SET reg_status='Activated' WHERE rider_id=".$id."";
    $results = RunQerry($sql_statement,$database);
}
function DeactivateCustomer($database,$id){
    $sql_statement = "UPDATE customer SET reg_status='Not Activated' WHERE cust_id=".$id."";
    $results = RunQerry($sql_statement,$database);
}
function DeactivateRider($database,$id){
    $sql_statement = "UPDATE rider SET reg_status='Not Activated' WHERE rider_id=".$id."";
    $results = RunQerry($sql_statement,$database);
}
function UpdateCustomerInfo($database,$id,$name,$city,$contact){
    $sql_statement = "UPDATE customer SET cust_name='".$name."' WHERE cust_id=".$id."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE customer SET cust_city='".$city."' WHERE cust_id=".$id."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE customer SET cust_mobile='".$contact."' WHERE cust_id=".$id."";
    $results = RunQerry($sql_statement,$database);
}
function UpdateRiderInfo($database,$id,$name,$city,$contact){
    $sql_statement = "UPDATE rider SET rider_name='".$name."' WHERE rider_id=".$id."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE rider SET rider_city='".$city."' WHERE rider_id=".$id."";
    $results = RunQerry($sql_statement,$database);

    $sql_statement = "UPDATE rider SET rider_mobile='".$contact."' WHERE rider_id=".$id."";
    $results = RunQerry($sql_statement,$database);
}





function FindAccountAdmin($database,$username,$password){
    $sql_statement = "SELECT * FROM admins WHERE admin_username='".$username."' and admin_password='".$password."';";
    $results = RunQerry($sql_statement,$database);
    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    if($resultchecks>0){
        

        if(($roww['active_status']) == "active"){
            return True;
        }
        else{
            return False;   
        }
    }
    else{
        return False;
    }

}
function EchoDisplay($database,$id){
    return "1st :".$database." 2nd: ".$id;
}   
?>
