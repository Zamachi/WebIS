<?php 
    // var_dump($model);
    use app\core\Field;
?>

<section>

    <h1 class="h1-view"> <?php echo $_SESSION['user']->username?>'s Profile</h1>

					<div class="category-tab shop-details-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#acc-info" data-toggle="tab">Account Info</a></li>
								<li><a href="#options" data-toggle="tab">Options</a></li>
								<li><a href="#upload" data-toggle="tab">Upload</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active " id="acc-info">
                                <div class="col-sm-8"><?php echo "<img style='border: 1.5px solid rgb(0,255,255);' class=\"acc-img\" src='{$_SESSION['user']->avatar}' alt=\"?\">"; ?></div>
                                <div class="col-sm-4">
                                    <p class="text-account">User id: <?php echo $_SESSION['user']->user_id?></p>
                                    <p class="text-account">Username: <?php echo $_SESSION['user']->username?></p>
                                    <p class="text-account">Email: <?php echo $_SESSION['user']->mail?></p>
                                    <p class="text-account">Date of Birth: <?php echo $_SESSION['user']->datumRodjenja?></p>
                                    <p class="text-account">Country: <?php echo $_SESSION['user']->country?></p>
                                    <p class="text-account">Account Balance: <?php echo $_SESSION['user']->account_balance?> $</p>
                                </div>
							</div>
						
							<div class="tab-pane fade" id="options">
                                <form action="profileProcess" class="option-form">
                                    <div class="col-sm-3">
                                            <label for="option-mail" class="form-label">Change email:</label></br>
                                            <input type="text" class="option-mail" placeholder="email@gmail.com" size="30"></br>
                                    </div>
                                    <div class="col-sm-3">
                                            <label for="option-password" class="form-label">Change Password:</label></br>
                                            <input type="password" class="option-password" placeholder="password" size="30"></br>
                                    </div>
                                    <div class="col-sm-3">
                                            <?php echo Field::dateOfBirth() ?></br>
                                    </div>
                                    <div class="col-sm-3">
                                            <?php echo Field::inputCountry("country", "country") ?></br>
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="submit" id="button-option">Submit</button>
                                    </div>
                                </form>       
                            </div>

							<div class="tab-pane fade" id="upload">
                                <div class="col-sm-8">
                                    <form action="uploadProcess" class="upload-form">
                                        <label for="option-game" class="form-label" style="color:#a0b1c5;">Choose a game:</label></br>
                                        <select name="option-game" class="option-game" style="width:80%;"></select></br>
                                        <label for="option-code" class="form-label" style="color:#a0b1c5;">Enter your code:</label></br>
                                        <input type="text" class="option-code" placeholder="code" style="width:80%;"></br>
                                        <label for="option-price" class="form-label" style="color:#a0b1c5;">Set price:</label></br>
                                        <input type="number" class="option-price" placeholder="price" style="width:80%;"></br>
                                        <button type="submit" id="button-upload">Submit</button>
                                    </form> 
                                </div>   
							</div>
						</div>
					</div>

</section>                    