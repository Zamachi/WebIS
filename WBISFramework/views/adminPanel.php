
<?php
use app\core\Field;
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
                    <form action="newsProcess" class="news-form">
                        <label for="news-title" class="form-label" style="color:#a0b1c5;">Enter your title:</label></br>
                        <input type="text" class="news-title" style="width:80%;" placeholder="title"></br>
                        <label for="news-description" class="form-label" style="color:#a0b1c5;">Enter description:</label></br>
                        <textarea class="news-description" name="news-description" rows="10" style="width:80%; resize: none;" placeholder="description"></textarea></br>
                        <label for="news-title" class="form-label" style="color:#a0b1c5;">Upload cover image:</label></br>
                        <input type="file" class="news-upload" name="news-upload"></br>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>qweqwe</td>
                                    <td>qweqwe@gmauil.com</td>
                                    <td>qweqwe</td>
                                    <td>31/01/2005</td>
                                    <td>25/25/2005</td>
                                    <td>250</td>
                                    <td>0</td>
                                    <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>rtyrty</td>
                                    <td>rtyrty@gmauil.com</td>
                                    <td>rtyrty</td>
                                    <td>31/01/2000</td>
                                    <td>25/25/2000</td>
                                    <td>500</td>
                                    <td>0</td>
                                    <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
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