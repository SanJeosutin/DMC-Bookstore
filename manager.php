<?php include "includes/header.inc" ?>

<body>
    <?php include "includes/menu.inc" ?>
    <section class="content">
        <h1>Manage order</h1>
        <p class="warning">You can managed the order here!</p>
                    <?php
                    /** MAKE A VAR FOR EACH TEXT INPUT**/
                        if(!isset($_POST["firstN"])&&!isset($_POST["lastN"])){
                            $query = "SELECT * FROM orders;";
                        }else{
                            $firstN = trim($_POST["firstN"]);
                            $lastN = trim($_POST["lastN"]);
                            $product = trim($_POST["productN"]);
                            $status = trim($_POST["status"]);
                            $cost = trim($_POST["totalCost"]);
                            /** QUERY USED TO SEARCH ITEMS INSIDE THE TABLE**/
                            $query = "SELECT * FROM orders WHERE user_firstName LIKE '%$firstN%' AND user_lastname LIKE '%$lastN%' AND user_cart LIKE'%$product%' AND order_cost LIKE'%$cost%' AND order_status LIKE '%$status%'";
                        }
                        require_once("settings.php");
                        $conn = mysqli_connect ($host,$user,$pass,$sql_db);
                        if ($conn) { // connected
 
                            $result = mysqli_query ($conn, $query);		
                            if ($result) {	//   query was successfully executed
                                
                                $record = mysqli_fetch_assoc ($result);
                                if ($record) {		//   record exist
                                    echo "
                                    <table class='orderTable'>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Suburb</th>
                                            <th>State</th>
                                            <th>Postcode</th>
                                            <th>Contact</th>
                                            <th>Delivery</th>
                                            <th>Cart</th>
                                            <th>Comments</th>
                                            <th>Order Cost</th>
                                            <th>Order Time</th>
                                            <th>Status</th>
                                        </tr>";
                                    while ($record) {
                                        echo"
                                        <tr>
                                            <td>{$record['order_id']}</td><td>{$record['user_firstName']}</td><td>{$record['user_lastName']}</td>
                                            <td>{$record['user_email']}</td><td>{$record['user_phone']}</td><td>{$record['user_Address']}</td>
                                            <td>{$record['user_suburb']}</td><td>{$record['user_state']}</td><td>{$record['user_postcode']}</td>
                                            <td>{$record['user_prefContact']}</td><td>{$record['user_deliveryMethod']}</td><td>{$record['user_cart']}</td>
                                            <td>{$record['additional_comments']}</td><td>{$record['order_cost']}</td><td>{$record['order_time']}</td>
                                        ";
                                        if(isset($_POST["Update"])){
                                            echo"<td><select name='product' id='deliveryMethod' required>
                                            <option value='pending'>PENDING</option>
                                            <option value='fulfilled'>FULFILLED</option>
                                            <option value='paid'>PAID</option>
                                            <option value='archived'>ARCHIVED</option>
                                            </select>
                                            <input type='submit' name='UpdateStatus".$record['order_id']."' value='Update'>
                                            ";
                                        }else{                              
                                            echo"
                                            <td>{$record['order_status']}</td>
                                            </tr>
                                            ";
                                        }

                                        if(isset($_POST["UpdateStatus".$record['order_id'].""])){
                                            
                                        }

                                        if($record['order_status'] == "PENDING"){
                                            echo "<input type='submit' name='delete".$record['order_id']."' value='Delete'>
                                            </td>
                                            ";
                                        }
                                        $record = mysqli_fetch_assoc($result);
                                    }
                                    
                                    echo"
                                    </table>
                                    ";
                                    mysqli_free_result ($result);
                                }else{
                                    echo "<p>No record found.</p>";
                                }
                            }else{
                                echo "<p>Order does not exist or operation failed.</p>";
                            }
                            mysqli_close($conn);
                        }else{
                            echo "<p>Unable to connect.</p>";
                        }
                    ?>
        <form action="manager.php" method="post">
            <fieldset>
                <legend>Search</legend>
                <nav class="alignElement">
                    <h2>Search Order</h2>
                    <p><label>First Name: <input type="text" name="firstN"></label></p>
                    <p><label>Last Name: <input type="text" name="lastN"></label></p>
                    <p><label>Product: <input type="text" name="productN"></label></p>
                    <p><label>Order Status: <input type="text" name="status"></label></p>
                    <p><label>Order Cost: <input type="text" name="totalCost"></label></p>

                    <input type="submit" value="Search">
                    <input type="submit" name="Update" value="Update">
                    <input type="submit" name="delete" value="delete">
                </nav>
            </fieldset>
        </form>
    </section>
    <?php include "includes/footer.inc" ?>
</body>

</html>