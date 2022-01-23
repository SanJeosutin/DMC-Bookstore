<?php include "includes/header.inc" ?>
<body>
  <?php include "includes/menu.inc" ?>
  <script src="scripts/part2.js"></script>
    <section class="content">
        <h1>Order Completed</h1>
        <!--|  http://mercury.swin.edu.au/it000000/formtest.php  |-->
        <p class="warning">Thank you for ordering with us.</p>
        <form id= "enqForm">
            <fieldset>
                <legend>Reciept!</legend>
                <nav class="alignElement">
                    <?php
                        if (!isset($_GET["output"])) {// not from process_order.php, redirection
                            header("location:enquire.php");
                            exit();
                        }
                        else { // from process_order.php, display receipt
                            echo $_GET["output"];
                        }
                    ?>
                </nav>
            </fieldset>
        </form>
    </section>
    <?php include "includes/footer.inc" ?>
</body>

</html>