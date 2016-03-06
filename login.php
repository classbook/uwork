<?php 
	include "./partials/init.php";
	ob_start();
?>

<?php
	$errorstr = null;
	if (isset($_POST["login"]))
	{
		$validations = array(
			"username" => "anything",
			"password" => "anything"
		);
		$required = array(
			"username", "password"
		);
		$validate = new FormValidator($validations, $required);
		if ($validate->validate($_POST))
		{
			$_POST = $validate->filter($_POST);
			$query = mysql_query(createQuery("select * from user where username='{1}' and password='{2}'", $_POST["username"], $_POST["password"]));
			
			if ($query){
				$row = mysql_fetch_array($query, MYSQL_ASSOC);
				if ($row){
					$_SESSION["_userid"] = $row["id"];
					$_SESSION["user_name"] = $row["f_name"]." ".$row["l_name"];
					$_SESSION["user_logged"] = true;
					if (isset($_SESSION["REDIRECT_URL"])){
						header("location:".$_SESSION["REDIRECT_URL"]);
						unset($_SESSION["REDIRECT_URL"]);
					}
					else{
						header("location:list.php");
					}
					die();
				}
				else{
					$errorstr = "Invalid credentials found. Please try again.";
				}
			}
			else{
				$errorstr = "Invalid credentials provided. Please try again.".createQuery("select * from user where username='{1}' and password='{2}'", $_POST["username"], $_POST["password"]);
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
                               <h2 style="font-size: 20px;">Login</h2>
							   <input type='hidden' name="login" />
							   <?php if ($errorstr!=null):?>
								<?php endif;?>
                            </div>
							<?php if ($errorstr!=null):?>
							<div>
								<h2 style="color : red;"><?php echo $errorstr;?></h2>
							</div>
							<?php endif;if (isset($_SESSION["login_message"])):?>
							<div style="color : green;">
								<?php echo $_SESSION["login_message"];unset($_SESSION["login_message"]);?>
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
					</div>
				</div>
				<div class="row">
					<div class="col-md-1 col-md-offset-0" style="margin-top:20px;">
						<input type="submit" class="button_search" value="SUBMIT" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-0" style="margin-top: 20px;">
						<a href="register.php">Don't have an account? Click here to register.</a>
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