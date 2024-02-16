<?php
include "header.php";



// Check if the user's email is stored in the session
if (isset($_SESSION['email_id'])) {
    $email_id = $_SESSION['email_id'];

    // Query to retrieve user ID based on email
    $user_query = "SELECT id FROM user_master WHERE email_id = '$email_id'";
    $user_result = mysqli_query($connection, $user_query);

    // Check if user exists
    if (mysqli_num_rows($user_result) > 0) {
        $user_row = mysqli_fetch_assoc($user_result);

        // Query to retrieve purchase requests associated with the user ID
        $query = "SELECT pm.*, pd.product_id, pd.qty, pd.product_amount
                  FROM purchase_request_master pm
                  INNER JOIN purchase_request_details pd ON pm.purchase_request_no = pd.purchase_request_no
                  WHERE pm.email_id = '$email_id'";
        $result = mysqli_query($connection, $query);

        // Check if there are purchase requests
        if (mysqli_num_rows($result) > 0) {
            // Display the list of orders
?>
            <div class="container">
                <h2>My Orders</h2>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Purchase Request No</th>
                            <th>Date</th>
                            <th>Total Products</th>
                            <th>Net Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['purchase_request_no']; ?></td>
                                <td><?php echo $row['dt']; ?></td>
                                <td><?php echo $row['no_of_products']; ?></td>
                                <td><?php echo $row['net_amount']; ?></td>
                                <td><?php echo $row['purchase_request_approved']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
<?php
        } else {
            echo "No orders found.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Email ID not found in session.";
}
?>
<?php
include "footer.php";
?>