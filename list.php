<?php 
	include "./partials/init.php";
	ob_start();
?>

<?php 

if (!is_logged())
{
	$_SESSION["REDIRECT_URL"]="list.php";
	$_SESSION["login_message"]="Please login to add the appartment details.";
	header("location:login.php");
	die();
}
if (isset($_POST)){
	$validations = array(
		
	);
	$required = array(
		"f_name", "day_phone", "address", 
	);
}

$neighborhoodcateg = array();
$query = mysql_query("select * from neighborhood_category");
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	array_push($neighborhoodcateg, $row);
}
$neighborhood = array();
$query = mysql_query("select * from neighborhood");
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	array_push($neighborhood, $row);
}

?>


<section class="page_mid"  >
	<div class="container" >
        <div class="page_pad">
        
        		<div class="row" >
                        <div class="col-md-12">
                            <div class="full_width_div">
                               <h2>List Your Apartment For Free Avi Realty</h2>
                            </div>
                        </div>
                </div>
				<form method="POST" action="">
					<div class="row">
						<div class="col-md-3">
							<div class="rent_details_heading ">
							   PROPERTY INFO
							</div>
							<div class="input_heading">ADDRESS</div>
							<input type="text" name="address" class="searchrent_inputtext2"/>
							<div class="input_heading">APARTMENT Name</div>
							<input type="text" name='name' required="required" class="searchrent_inputtext2"/>
							<div class="input_heading">I WOULD LIKE TO ADD MY PROPERTY FOR :</div>
							<div style="float: left">
								<label style="font-weight: normal; display: inline">
								   <input type="checkbox" name='for_rent'/>Rent &nbsp;
								</label>
								<label style="font-weight: normal; display: inline">
								   <input type="checkbox" name='for_sale'/>Sale &nbsp;
								</label>
								<label style="font-weight: normal; display: inline">
								   <input type="checkbox" name='for_sublet'/>Sublet &nbsp;
								</label>
								<label style="font-weight: normal; display: inline">
								   <input type="checkbox" name='for_sterm'/>Short Term 
								</label>
							</div>
							<div style="clear: both;"></div>
							 <div class="input_heading_50">START DATE </div><div class="input_heading_50"> END DATE</div>
							 <input type="date" required="required" class="searchrent_inputtext3 w_48" style="margin-right:10px;margin-top:5px"/>
							 <input type="date" required="required" class="searchrent_inputtext3 w_48" style="margin-top:5px"/>
							 <div class="input_heading">CONDITION OF PROPERTY</div>
								<select class="searchrent_select2 w_100">
											<option>New</option>
											<option>---</option>
											<option>---</option>
											<option>---</option>
										</select>
							  <div class="input_heading">NOTES : </div>
							   <textarea cols="4" rows="4" class="searchrent_inputtext2" style="height:100px;"></textarea>
						</div>
						<div class="col-md-3">
							<div class="rent_details_heading ">
							   PROPERTY INFO
							</div>

							<div class="input_heading">WALLS ALLOWED</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">PETS ALLOWED</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">BUILDING AGE</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">OWNERSHIP</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">DIPLOMATS</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">Select Neighborhood Category</div>
							<select class="searchrent_select2 w_100" id="neighborhoodcateg">
								<?php 
								foreach ($neighborhoodcateg as $key => $value) {?>
								<option value="<?php echo $value["id"];?>"><?php echo $value["name"];?></option>
								<?php } ?>
								<option value="other">Other</option>
							</select>
							<input type="text" id="neighborhoodcateg_other" required="required" class="searchrent_inputtext2" />

							<div class="input_heading">Select Neighborhood</div>
							<select class="searchrent_select2 w_100" id="neighborhood">
								<?php 
								foreach ($neighborhood as $key => $value) {?>
								<option data-filter="<?php echo $value["neighborhood_id"];?>" value="<?php echo $value["id"];?>"><?php echo $value["name"];?></option>
								<?php } ?>
								<option value="other">Other</option>
							</select>
							<input type="text" id="neighborhood_other" required="required" class="searchrent_inputtext2" />

						</div>
						<div class="col-md-4">
							<div class="rent_details_heading ">
							   UPLOADS PHOTOS
							</div>
							<div class="input_heading">
								<input type="file" required="required">
							<span style="font-size:10px;margin:5px 0px">JPEG, GIF, PNG, BMP Max Size 10mb</span></div>
							<div class="input_heading">
							<a href="#" class="uderline_link">+ ADD ANOTHER PHOTO</a><br>
							</div>
						</div>
					</div>  
					<div class="row" style="margin-top:45px">
						<div class="col-md-3">
							<div class="rent_details_heading ">
							   ADDITIONAL INFO
							</div>
							<div class="input_heading">BEDROOM</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">LAST NAME</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">NEIGHBOURHOOD</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">PART BATH</div>
							 <select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">FULL BATH</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
							<div class="input_heading">SERVICE LEVEL</div>
							<select class="searchrent_select2 w_100">
								<option>New</option>
								<option>---</option>
								<option>---</option>
								<option>---</option>
							</select>
						</div>
						<div class="col-md-3">
							<div class="rent_details_heading ">
							   APARTMENT FEATURES
							</div>
							<div class="searchrent_check">
								<input type="checkbox"/> &nbsp;Outdoor Spaces </br>
								<input type="checkbox"/>  &nbsp;Fitness pool</br>
								<input type="checkbox"/>  &nbsp;Doorman</br>
							</div>
						</div>
						<div class="col-md-3">
							<div class="rent_details_heading ">
							   APARTMENT FEATURES
							</div>
							<div class="searchrent_check">
								<input type="checkbox"/> &nbsp;Outdoor Spaces </br>
								<input type="checkbox"/>  &nbsp;Fitness pool</br>
								<input type="checkbox"/>  &nbsp;Doorman</br>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1 col-md-offset-0" style="margin-top:20px;">
							   <input type="submit" class="button_search" value="SUBMIT" />
						</div>
					</div>
				</form>
        </div>
    </div>
</section>

<script type="text/javascript">
	$(function(){
		function func(th, suffix){
			if ($(th).val()=="other"){
				$("#neighborhood"+suffix+"_other").show().removeAttr("disabled");
			}
			else{
				$("#neighborhood"+suffix+"_other").hide().attr("disabled", "disabled");
			}
		}
		func($("#neighborhoodcateg").change(function(){
			func(this, "categ");
			var filter = $(this).val();
			$("#neighborhood option").each(function(){
				var value = $(this).val();
				if (value!=filter && value!="other")
					$(this).attr("hidden", "hidden");
				else
					$(this).removeAttr("hidden");
			});
			$("#neighborhood").val($("#neighborhood option:not(:hidden)").eq(0).val());

			func("#neighborhood", "");
		}), "categ");
		func($("#neighborhood").change(function(){
			func(this, "");
		}), "");
	});
</script>
<?php 
	$content = ob_get_clean();
	include './partials/container.php';
?>