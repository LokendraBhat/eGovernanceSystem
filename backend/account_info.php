<?php
error_reporting(0);

require 'connection.php';
$_cit_id = $_GET['cit_id'];

$sql = "SELECT * FROM REGISTER_INFO WHERE CIT_ID = '$_cit_id' ";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['cit_id'];
    $full_name = $row['full_name'];
    $email = $row['email'];
}

$sql = "SELECT * FROM login_info WHERE CIT_ID = '$_cit_id' ";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $password = $row['password'];
}

$img_path = "";
$sql = "SELECT * FROM IMAGE_INFO";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    while (1) {
        if ($row['id'] == $_cit_id) {

            $img_path = $row['img_name'];
            break;
        }
        $row = mysqli_fetch_assoc($result);
    }
}

$sql = "SELECT * FROM account_info WHERE cit_id = '$_cit_id' ";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $arrival = $row['arrival_date'];
    $Amount = $row['Amount'];
    $withdrawl = $row['withdraw_date'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Include Bootstrap JavaScript with jQuery dependency -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <!-- for icons -->
    <script src="https://kit.fontawesome.com/34343bdd19.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Account Information</title>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-4">

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <img src="<?php echo $img_path ?>" class="rounded-circle img-fluid" style="width: 100px;" />
                            </div>
                            <h4 class="mb-2"><i class="fa fa-id-card-o"></i> <?php echo $_cit_id ?></h4>
                            <p class="text-muted mb-4"><?php echo $email ?></p>

                            <div class="d-flex justify-content-between text-center mt-5 mb-2">
                                <div>
                                    <p class="mb-2 h5">Last Updated</p>
                                    <p class="text-muted mb-0"><?php echo $arrival ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-2 h5"> <i class="fa fa-wallet"></i> <?php echo $Amount ?></p>
                                    <p class="text-muted mb-0">Remaining amounts</p>
                                </div>
                                <div>
                                    <p class="mb-2 h5">Last Withdrawl</p>
                                    <p class="text-muted mb-0"><?php echo $withdrawl ?></p>
                                </div>
                            </div>

                            <!-- Withdrawal button -->
                            <hr class="my-4">
                            <form>
                                <button type="button" class="btn btn-primary btn-rounded btn-lg" data-toggle="modal" data-target="#popmsg">
                                    Withdraw Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="userinfo.php?cit_id=<?php echo $_cit_id?>"><button type="button" class="btn btn-primary"  style="
            position: fixed;
            top: 20px;
            right: 20px;
            border-radius: 10%;
            cursor: pointer;
            z-index: 100;
        ">User</button></a>
    <section>
        <!-- Modal -->
        <div class="modal fade" id="popmsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <!-- Form -->
                <form class="modal-content" action="withdraw_msg.php?cit_id=<?php echo $_cit_id?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Withdraw</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container py-8">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-12">
                                    <div class="card rounded-3">
                                        <div class="card-body mx-1 my-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="d-flex flex-column mb-0">
                                                        <b><?php echo $full_name ?></b>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="pt-3">
                                                <div class="d-flex flex-row pb-3">
                                                    <div class="rounded border border-primary border-2 d-flex w-100 p-3 align-items-center" style="background-color: rgba(18, 101, 241, 0.07);">
                                                        <div class="d-flex flex-column">
                                                            <p class="mb-1 small text-primary">Total amount Remaining</p>
                                                            <h6 class="mb-0 text-primary">NPR <?php echo $Amount ?></h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row pb-3">
                                                    <div class="rounded border d-flex w-100 px-3 py-2 align-items-center">
                                                        <div class="d-flex flex-column py-1">
                                                            <p class="mb-1 small text-primary">Withdrawal Amount</p>
                                                            <div>
                                                                <label class="text-primary" for='rupee'>NPR.: </label>
                                                                <input type="text" class="form-control form-control-sm" id="rupee" name="w_amount" style="margin-left:5px;" />
                                                                <br>
                                                                <label class="text-primary" for='psw'>Password: </label>
                                                                <input type="password" class="form-control form-control-sm" id="psw" style="margin-left:5px;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="return verify()">Proceed</button>
                    </div>
                </form>
            </div>
        </div>


    </section>
    <script>
        function verify() {
            var amount = document.getElementById("rupee").value;
            var password = document.getElementById("psw").value;
            if (amount == "" || password == "") {
                alert("Please fill all the fields");
                return false;
            } else if (amount < 0) {
                alert("Amount cannot be negative");
                return false;
            } else if (amount > <?php echo $Amount ?>) {
                alert("You don't have enough balance");
                return false;
            } else if(amount < 100){
                alert("Minimum withdrawl amount is 100");
                return false;
            } else if(amount % 100 != 0){
                alert("Withdrawl amount should be multiple of 100");
                return false;
            } else if (password != "<?php echo $password ?>") {
                alert("Password is incorrect");
                return false;
            } else {
                return true;
            }
        }
    </script>

</body>

</html>