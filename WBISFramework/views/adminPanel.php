
<?php
use app\core\Field;
?>

<?php

/*
echo "<pre>";
var_dump($model);
echo "</pre>";
*/
?>

<h1 class="h1-view">Admin Panel</h1>
<section>
    <div class="category-tab shop-details-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#news-cms" data-toggle="tab">News CMS</a></li>
                <li><a href="#user-cms" data-toggle="tab">User CMS</a></li>
                <li><a href="#code-cms" data-toggle="tab">Code CMS</a></li>
                <li><a href="#game-cms" data-toggle="tab">Game CMS</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active " id="news-cms">
                <div class="col-sm-8">
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
            </div>

            <div class="tab-pane fade" id="game-cms">
                <div class="col-sm-8">
                    
                </div>
            </div>

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
                                <?php foreach ($model as $item){ ?>
                                    <tr>
                                        <td><?php echo $item['user_id'] ?></td>
                                        <td><?php echo $item['username'] ?></td>
                                        <td><?php echo $item['mail'] ?></td>
                                        <td><?php echo $item['country'] ?></td>
                                        <td><?php echo $item['datumRodjenja'] ?></td>
                                        <td><?php echo $item['created_at'] ?></td>
                                        <td><?php echo $item['account_balance'] ?></td>
                                        <td><?php echo $item['is_active'] ?></td>
                                        <td><a href="makeAdmin?user_id=<?php echo $item['user_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <td><a href="makeSuperAdmin?user_id=<?php echo $item['user_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <td><a href="banUser?user_id=<?php echo $item['user_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>

            <div class="tab-pane fade" id="code-cms">
                <div class="col-sm-12">
                <div class="table-wrapper">
                        <table class="admin-table">
                            <thead>
                                <tr> 
                                    <th>Code</th>
                                    <th>Game</th>
                                    <th>User</th>
                                    <th>Price</th>
                                    <th>Is sold</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>SHDOIDHSOIHSIODHSIODH</td>
                                    <td>World of Warcraft</td>
                                    <td>qweqwe</td>
                                    <td>50</td>
                                    <td>0</td>
                                    <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                    <td>JCOIJSDIOJSIODJSODJIOD</td>
                                    <td>Elder Scrolls Online</td>
                                    <td>rtyrty</td>
                                    <td>15</td>
                                    <td>0</td>
                                    <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                   
                </div>
            </div>

            <div class="tab-pane active " id="game-cms">
                <div class="col-sm-8">
                </div>
            </div>

        </div>
    </div>
</section>