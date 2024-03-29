<?php

use app\core\Field;
use app\core\Application;

$errors = Application::$app->session->getFlash('profileErrors');

if ($errors !== false) {
    $model->greske = $errors;
}

//var_dump($_SESSION);
?>

<section>

    <h1 class="h1-view"> <?php echo $_SESSION['user']->username ?>'s Profile</h1>

    <div class="category-tab shop-details-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#acc-info" data-toggle="tab">Account Info</a></li>
                <li><a href="#options" data-toggle="tab">Options</a></li>
                <li><a href="#upload" data-toggle="tab">Upload</a></li>
                <li><a href="#purchase-history" data-toggle="tab">Purchase History</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active " id="acc-info">
                <div class="col-sm-8"><?php echo "<img style='border: 1.5px solid rgb(0,255,255);' class=\"acc-img\" src='{$_SESSION['user']->avatar}' alt=\"?\">"; ?></div>
                <div class="col-sm-4">
                    <p class="text-account">User id: <?php echo $_SESSION['user']->user_id ?></p>
                    <p class="text-account">Username: <?php echo $_SESSION['user']->username ?></p>
                    <p class="text-account">Email: <?php echo $_SESSION['user']->mail ?></p>
                    <p class="text-account">Date of Birth: <?php echo $_SESSION['user']->datumRodjenja ?></p>
                    <p class="text-account">Country: <?php echo $_SESSION['user']->country ?></p>
                    <p class="text-account">Account Balance: <?php echo $_SESSION['user']->account_balance ?> $</p>
                </div>
            </div>

            <div class="tab-pane fade" id="options">
                <form action="profileUpdateProcess" enctype="multipart/form-data" method="POST" class="option-form">
                    <div class="col-sm-5">
                        <label for=" option-mail" class="form-label">Change email:</label></br>
                        <input type="text" name='mail' class="option-mail" placeholder="email@gmail.com" size="30"></br>
                    </div>
                    <div class="col-sm-5">
                        <label for="option-password" class="form-label">Change Password:</label></br>
                        <input type="password" name='password' class="option-password" placeholder="password" size="30"></br>

                    </div>
                    <div class="col-sm-8">
                        <label for="news-title" class="form-label" style="color:#a0b1c5;">Upload cover image:</label></br>
                        <input type="file" name="fileToUpload" class="news-upload"></br>
                    </div>
                    <div class="col-sm-8">
                        <button type="submit" id="button-option">Submit</button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade" id="upload">
                <div class="col-sm-8">
                    <form action="uploadCodeProcess" method="POST" class="upload-form">
                        <?php echo Field::inputGame(); ?>
                        <label for="option-code" class="form-label" style="color:#a0b1c5;">Enter your code:</label></br>
                        <input type="text" name="code" class="option-code" placeholder="code" style="width:80%;">
                        <div class="invalid-feedback"><?php echo Application::$app->session->getFlash('profileErrors')['code'][0] ?? ''; ?></div>
                        <label for="option-price" class="form-label" style="color:#a0b1c5;">Set price:</label></br>
                        <input type="number" name="price" class="option-price" placeholder="price" style="width:80%;"></br>
                        <button type="submit" id="button-upload">Submit</button>
                    </form>
                </div>
            </div>

            <div class="tab-pane fade" id="purchase-history">
                <div class="col-sm-12">
                    <div class="table-wrapper">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Checkout id:</th>
                                    <th>Code id:</th>
                                    <th>Date sold:</th>
                                    <th>Code:</th>
                                    <th>Price:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($checkouts as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $value['checkout_id'];?></td>
                                        <td><?php echo $value['code_id'];?></td>
                                        <td><?php echo $value['date_sold'];?></td>
                                        <td><?php echo $value['code'];?></td>
                                        <td><?php echo $value['price'];?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php

$error = Application::$app->session->getFlash('profileErrors')['code'][0] ?? false;
// var_dump($error);
if ($error !== false) {
    echo "
        <script>
            $(document).ready(function (){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });


                Toast.fire({
                    icon: 'error',
                    title: '$error'
                })
            });
        </script>
        ";
}
