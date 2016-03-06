<?php 
	include "./partials/init.php";
	ob_start();
?>

<?php
	$errorstr = null;
	if (isset($_POST["register"]))
	{
		$validations = array(
			"username" => "anything",
			"password" => "anything",
			"f_name"   => "anything",
			"l_name"   => "anything",
			"language" => "anything",
			"biography"=> "anything",
			"testimonial"=>"anything"
		);
		$required = array(
			"username", "password", "f_name", "l_name", "language"
		);
		$validate = new FormValidator($validations, $required);
		if ($validate->validate($_POST))
		{
			$_POST = $validate->filter($_POST);
			$query = mysql_query(createQuery("insert into user(`username`, `password`, `f_name`, `l_name`, `language`, `biography`, `testimonial`)".
			" values('{1}', '{2}', '{3}', '{4}', '{5)', '{6}', '{7}')", $_POST["username"], $_POST["password"], $_POST["f_name"], $_POST["l_name"], $_POST["language"], $_POST["biography"], $_POST["testimonial"])) or die(mysql_error());
			
			if ($query){
				$_SESSION["login_message"] = "Successfully registed with username ".$_POST["username"].". Please login";
				header("location:login.php");
				die();
			}
			else{
				echo createQuery("insert into user(`username`, `password`, `f_name`, `l_name`, `language`, `biography`, `testimonial`)".
			" values('{1}', '{2}', '{3}', '{4}', '{5)', '{6}', '{7}')", $_POST["username"], $_POST["password"], $_POST["f_name"], $_POST["l_name"], $_POST["language"], $_POST["biography"], $_POST["testimonial"]);
			}
		}
		else{
			$errorstr = "Please fill mandatory fields.";
		}
	}
?>
<section class="page_mid"  >
	<div class="container" >
        <div class="page_pad">
			<form method="POST" action="">
        		<div class="row" >
                        <div class="col-md-12">
                            <div class="full_width_div">
								<h2 style="font-size: 20px;">Register to create a account.</h2>
								<input type='hidden' name="register" />
                            </div>
							<?php if ($errorstr!=null):?>
							<div>
								<h2 style="color : red;"><?php echo $errorstr;?></h2>
							</div>
							<?php endif;?>
                        </div>
                </div> 
				<div class="row">
					<div class="col-md-3">
						<div class="input_heading">Username</div>
						<input type='email' name="username" required="required" class="searchrent_inputtext2"/>
						<div class="input_heading">Password</div>
						<input type="password" name="password" required="required" class="searchrent_inputtext2"/>
						<div class="input_heading">Confirm Password</div>
						<input type="password" class="searchrent_inputtext2"/>
						<div class="input_heading">Testimonials</div>
						<textarea name="testimonial" class="searchrent_inputtext2" style="height : 100px;"></textarea>
					</div>
					<div class="col-md-3">
						<div class="input_heading">First Name</div>
						<input type='text' name="f_name" required="required" class="searchrent_inputtext2"/>
						<div class="input_heading">Last Name</div>
						<input type="text" name="l_name" required="required" class="searchrent_inputtext2"/>
						<div class="input_heading">Language</div>
						<input type="text" name="language" required="required" class="searchrent_inputtext2"/>
						<div class="input_heading">Biography</div>
						<textarea name="biography" class="searchrent_inputtext2" style="height: 100px;"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1 col-md-offset-0" style="margin-top:20px;">
						   <input type="submit" class="button_search" value="SUBMIT" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-0" style="margin-top: 20px;">
						<a href="login.php">Already have an account? Click here to login.</a>
					</div>
				</div>

			</form>
		</div>
	</div>
</section>



<?php 
	$content = ob_get_clean();
	include './partials/container.php';
?>