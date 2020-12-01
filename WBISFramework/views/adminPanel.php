<?php

use app\core\Application;
use app\core\Field;
?>

<?php


// echo "<pre>";
// var_dump(Application::$app->session->getAuth('user'));
// echo "</pre>";
// exit;
?>

<h1 class="h1-view">Admin Panel</h1>
<section>
    <div class="category-tab shop-details-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#news-cms" data-toggle="tab">News CMS</a></li>
                <?php if (Application::$app->session->getAuth('user')->role_name === 'SuperAdmin') { ?>
                    <li><a href="#user-cms" data-toggle="tab">User CMS</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active " id="news-cms">
                <div class="col-sm-10">
                    <div class="col-sm-12">
                        <h3 style="color: #a0b1c5;">Add News</h3>
                        <form action="makeNews" enctype="multipart/form-data" method="POST" class="news-form">
                            <label for="news-title" class="form-label" style="color:#a0b1c5;">Enter your title:</label></br>
                            <input type="text" name="news_title" class="news-title" style="width:80%;" required placeholder="title"></br>
                            <label for="news-description" class="form-label" style="color:#a0b1c5;">Enter description:</label></br>
                            <textarea class="news-description" required name="news_content" rows="10" style="width:80%; resize: none;" placeholder="description"></textarea></br>
                            <label for="news-title" class="form-label" style="color:#a0b1c5;">Upload cover image:</label></br>
                            <input type="file" required class="news-upload" name="news_image"></br>
                            <button type="submit" id="button-news">Submit</button>
                        </form>
                    </div>

                    <div class="col-sm-12">
                        <br /><br />
                        <h3 style="color: #a0b1c5;">Add Multiple News</h3>
                        <form action="makeNewsMassive" enctype="multipart/form-data" method="POST" class="news-form">
                            <label for="news-title" class="form-label" style="color:#a0b1c5;">Massively upload News via JSON file:</label></br>
                            <input type="file" required class="news-upload" name="newsJSON"></br>
                            <button type="submit" id="button-news">Submit</button>
                        </form>
                        <div class="invalid-fedback">
                            <?php
                            $greske = Application::$app->session->getFlash('jsonErrors') ?? false;
                            if ($greske) {
                                foreach ($greske as $key => $value) {
                                    foreach ($value as $key2 => $polje) {
                                        echo "Problem with news No. " . $key . "! This news is missing the: " . $key2 . ".\n";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (Application::$app->session->getAuth('user')->role_name === 'SuperAdmin') { ?>
                <div class="tab-pane fade" id="user-cms">
                    <div class="col-sm-12">
                        <div class="table-wrapper">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Date of Birth</th>
                                        <th>Created At</th>
                                        <th>Account Balance</th>
                                        <th>Is Active</th>
                                        <th>Grant/Revoke Admin</th>
                                        <th>Grant/Revoke Superadmin</th>
                                        <th>Deactivate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $item) { ?>
                                        <tr>
                                            <td><?php echo $item['user_id'] ?></td>
                                            <td><?php echo $item['username'] ?></td>
                                            <td><?php echo $item['mail'] ?></td>
                                            <td><?php echo $item['country'] ?></td>
                                            <td><?php echo $item['datumRodjenja'] ?></td>
                                            <td><?php echo $item['created_at'] ?></td>
                                            <td><?php echo $item['account_balance'] ?></td>
                                            <td><?php echo $item['is_active'] ?></td>
                                            <td>
                                                <?php if ($item['role_name'] === 'User') { ?>
                                                    <a class=".makeAdmin" href="makeAdmin?user_id="<?php echo $item['user_id']; ?>><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if (!($item['role_name'] === 'SuperAdmin' )) { ?>
                                                    <a class=".makeSuperAdmin" href="makeSuperAdmin?user_id=<?php echo $item['user_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($item['is_active'] === '1') { ?>
                                                    <a class=".banUser" href="banUser?user_id=<?php echo $item['user_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>