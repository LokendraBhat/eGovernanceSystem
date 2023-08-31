<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userinfo</title>

    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Include Bootstrap JavaScript with jQuery dependency -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="userinfo.css">
</head>

<body>
    <?php
    require 'connection.php';
    $_cit_id = $_GET['cit_id'];

    $sql = "SELECT * FROM REGISTER_INFO WHERE CIT_ID = '$_cit_id' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['cit_id'];
        $full_name = $row['full_name'];
        $phone = $row['phone_no'];
        $email = $row['email'];
        $date_birth = $row['DOB'];
        $gender = $row['gender'];
        //calculating age
        $d_of_birth = new DateTime($date_birth);
        $now = new DateTime();
        $age = $now->diff($d_of_birth);
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
    mysqli_close($conn);

    ?>

    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-10 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="<?php echo $img_path ?>" alt="Loading" class="img-fluid my-5" style="width: 120px; border-radius:10px;" />
                                <h5><?php echo $full_name ?></h5>
                                <p><?php echo $email ?></p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Cirizenship ID</h6>
                                            <p class="text-muted"><?php echo $_cit_id ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted"><?php echo $phone ?></p>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-6 mb-3">
                                            <h6>Date of Birth</h6>
                                            <p class="text-muted"><?php echo $date_birth ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted"><?php echo $gender ?></p>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6 mb-3">
                                            <h6>Age</h6>
                                            <p class="text-muted"><?php echo $age->y . " Years " . $age->m . " Months " . $age->d . " Days" ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <form action="account.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $_cit_id ?>">
                                                <button class="btn btn-primary profile-button" type="submit">View Account</button>
                                            </form>
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
    </section>
</body>

</html>