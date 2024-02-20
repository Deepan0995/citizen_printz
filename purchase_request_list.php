<?php
include "header.php";

// Fetch purchase requests from the database
$query = "SELECT * FROM purchase_request_master";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Database query failed."); // Handle database query failure
}
?>

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
            <h2 class="mb-0">Purchase Requests</h2>
        </div>
        <div class="col-auto">
            <div class="form-group">
                <label for="filterSelect">Filter:</label>
                <select class="form-control" id="filterSelect">
                    <option value="all">All</option>
                    <option value="approved">Approved</option>
                    <option value="unapproved">Unapproved</option>
                </select>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="purchaseTable">
            <thead class="thead-dark">
                <tr>
                    <th>Purchase Request No</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Net Amount</th>
                    <th>No. of Products</th>
                    <th>Delivery Name</th>
                    <th>Delivery Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['purchase_request_no'] . "</td>";
                        echo "<td>" . $row['dt'] . "</td>";
                        echo "<td>" . $row['customer_name'] . "</td>";
                        echo "<td>" . $row['email_id'] . "</td>";
                        echo "<td>" . $row['net_amount'] . "</td>";
                        echo "<td>" . $row['no_of_products'] . "</td>";

                        echo "<td>" . $row['delivery_name'] . "</td>";
                        echo "<td>" . $row['delivery_address'] . "</td>";
                        echo "<td><a href='view_purchase.php?id=" . $row['purchase_request_no'] . "' class='btn btn-success btn-sm'>Approve </a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "footer.php";
?>

<script>
    document.getElementById("filterSelect").addEventListener("change", function() {
        filterTable();
    });

    function filterTable() {
        let filterValue = document.getElementById("filterSelect").value;
        let rows = document.querySelectorAll("#purchaseTable tbody tr");

        rows.forEach(row => {
            let visible = false;
            let status = row.querySelector("td:nth-child(9)").textContent.toLowerCase();

            if (filterValue === "all" || filterValue === status) {
                visible = true;
            }

            row.style.display = visible ? "" : "none";
        });
    }
</script>
