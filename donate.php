<!DOCTYPE html>
<html>
    <head>
        <?php include_once("includes/head.php")?>
    </head>

    <body>
        <div class="container-fluid">
            <?php include_once("includes/header.php")?>
            <div class="row ">
                <div class="col-md-3 container-fluid">
                <?php include_once("includes/sideBar.php")?>
                </div>
                <div class="col-md-9 container-fluid">
                    <h1>Donate Now</h1>
                    </hr>
                    <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
                        <input type="hidden" name="merchant_id" value="1217443">    <!-- Replace your Merchant ID -->
                        <input type="hidden" name="return_url" value="<?=PATH?>/return.php">
                        <input type="hidden" name="cancel_url" value="<?=PATH?>/cancel.php">
                        <input type="hidden" name="notify_url" value="<?=PATH?>/notify.php">  
                        <br><br>Item Details<br>
                        <input type="text" name="order_id" value="02154879">
                        <input type="text" name="items" value="Donation for LibraryManagementSystem"><br>
                        <input type="text" name="currency" value="USD">
                        <input type="text" name="amount" value="100">  
                        <br><br>Customer Details<br>
                        <input type="text" name="first_name" value="Saman">
                        <input type="text" name="last_name" value="Perera"><br>
                        <input type="text" name="email" value="samanp@gmail.com">
                        <input type="text" name="phone" value="0771234567"><br>
                        <input type="text" name="address" value="No.1, Galle Road">
                        <input type="text" name="city" value="Colombo">
                        <input type="hidden" name="country" value="Sri Lanka"><br><br> 
                        <input type="submit" value="Buy Now">   
                    </form> 
                </div>
            </div>
            <?php include_once("includes/footer.php")?>
        </div>
    </body>
</html>