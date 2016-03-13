<?php 
	include "./partials/init.php";
	ob_start();
?>

<?php 

$errorstr = null;
$sucstr = null;
if (!is_logged())
{
	$_SESSION["REDIRECT_URL"]="list.php";
	$_SESSION["login_message"]="Please login to add the appartment details.";
	header("location:login.php");
	die();
}
if (isset($_POST["apartment"])){
	$validations = array(
		"name" => "anything",
		"address" => "anything",
		"day_phone" => "number",
		"eve_phone" => "number",
		"mob_phone" => "number",
		
		
		"for_rent" => "anything",
		"for_sale" => "anything",
		"for_sublet" => "anything",
		"for_sterm" => "anything",
		
		
		"availability_from" => "anything",
		"availability_to" => "anything",
		
		
		"property_condition" => "anything",
		"notes" => "anything",
		"neighborhood" => "anything",
		"neighborhoodcateg" => "anything",
				
		
		"Walls_allowed" => "anything",
		"pet_policy" => "anything",
		"building_age" => "number",
		"ownership" => "anything",
		"diplomats" => "anything",

		
		"bathroom" => "number",
		"partbath" => "number",
		"fullbath" => "number",
		"service_level" => "number",
		"access" => "number",
		
		"outdoor_spaces" => "anything",
		"fitness_pool" => "anything",
		"doorman" => "anything",
		"parking_garage" => "anything",
		"laundry" => "anything",
		"central_air" => "anything",
		
		"fireplace" => "anything",
		"hardwood_floors" => "anything",
		"multilevel" => "anything",
		"laundry_in_unit" => "anything",
		"high_ceilings" => "anything",
		"walk_in_closet" => "anything",

		"price" => "number",
		
	);
	$checkboxes = array(
	"outdoor_spaces", "fitness_pool", "doorman", "parking_garage", "laundry", "central_air", 
	
	"for_rent", "for_sale", "for_sublet", "for_sterm",
	
	"fireplace", "hardwood_floors", "multilevel", "laundry_in_unit", "high_ceilings", "walk_in_closet",
		
		
	);

	$required = array(
		"name", "mob_phone", "address", "availability_from", "availability_to", "price"
	);
	$validate = new FormValidator($validations, $required);
	if ($validate->validate($_POST))
	{
		$n_required = array(
			"day_phone", "eve_phone", "propertyCondition", "notes", "n_bedrooms", "buildingAge", "Walls", "bathroom", "partbath", "fullbath", "serviceLevel"
		);
		$mapping = array();
		
		foreach ($required as $value) {
			$mapping[$value] = $_POST[$value];
		}
		foreach ($n_required as $value) {
			if (isset($_POST[$value]))
				$mapping[$value] = $_POST[$value];
		}

		foreach ($checkboxes as $value) {
			if (isset($_POST[$value]))
				$mapping[$value] = $_POST["$value"];
		}
		
		$neighborhoodcateg = $_POST["neighborhoodcateg"];
		$neighborhood = $_POST["neighborhood"];
		
		if ($neighborhoodcateg == "other"){
			if (!isset($_POST["neighborhoodcateg_new"])){
				$errorstr="Error";
			}
			else{
				$neighborhoodcategnew = htmlentities(mysql_escape_string($_POST["neighborhoodcateg_new"]));
				$insert = mysql_query(
					"insert into neighborhood_category(`name`) values('$neighborhoodcategnew')"
				);
				$neighborhoodcateg = mysql_insert_id();
			}
		}
		if ($neighborhood=="other"){
			if (!isset($_POST["neighborhoodcateg"])){
				$errorstr="Error";
			}
			else{
				$neighborhoodnew = htmlentities(mysql_escape_string($_POST["neighborhood_new"]));
				
				$insert = mysql_query("insert into neighborhood(`neighborhood_id`, `name`) values('$neighborhoodcateg', '$neighborhoodnew')");
				$neighborhood = mysql_insert_id();
			}
		}
		if ($neighborhood==FALSE || $neighborhoodcateg==FALSE){
			$errorstr = "Error in input given";
		}
		
		$mapping["neighborhood"] = $neighborhood;
		$mapping["ownership"] = $_SESSION["_userid"];
		
		$table = "";
		$values = "";
		$neighborhood_start = true;
		foreach ($mapping as $key => $value) {
			if (!$neighborhood_start){
				$table .= ",";
				$values .=",";
			}
			$neighborhood_start=false;
			
			$value = htmlentities(mysql_escape_string($value));
			$table .= "`$key`";
			$values .= "'$value'";
		}
		
		mysql_query("insert into apartment($table) values($values)");
		$apartment_id = mysql_insert_id();
		
		$filenames = split(" ", $_POST["file_names"]);
		
		
		$count = 0;
		foreach ($filenames as $file) {
			$file = trim($file);
			$basepath = "partials/simple/upload_files/";
			
			if (!file_exists($basepath.$file) || !is_file($basepath.$file))
				continue;
			
			if (Image::isValidImage($basepath.$file)){
				$image = Image::createSquareThumbNail($basepath.$file, 130);
				$filename = "$apartment_id"."_$count.jpeg";
				Image::flushImage($image, "thumbs/$filename", "jpg");
				$count++;
			}
			unlink($basepath.$file);
		}
		mysql_query("update apartment set n_images=$count where id=$apartment_id");
		
		$sucstr = "Successfully added the apartment details. Continue by adding other.";
	}
	else{
		$errorstr = "Error in submitted data.";
	}
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
								<?php if ($sucstr!=null):?>
								<h3 style="color : green"><?php echo $sucstr;?></h3>
								<?php endif;?>
                               <h2>List Your Apartment For Free Avi Realty</h2>
                            </div>
                        </div>
                </div>
				<form method="POST" action="">
					<input type="hidden" name="apartment" value="true" />
					<div class="row">
						<div class="col-md-4">
							<div class="rent_details_heading ">
							   PROPERTY INFO
							</div>
							<div class="input_heading">APARTMENT Name</div>
							<input type="text" name='name' required="required" class="searchrent_inputtext2"/>
							<div class="input_heading">ADDRESS</div>
							<input type="text" name="address" required="required" class="searchrent_inputtext2"/>
							<div class="input_heading">I WOULD LIKE TO ADD MY PROPERTY FOR :</div>
							<div style="float: left">
								<label style="font-weight: normal; display: inline">
									<input type="checkbox" name='for_rent' value="TRUE"/>
									Rent &nbsp;
								</label>
								<label style="font-weight: normal; display: inline">
									<input type="checkbox" name='for_sale' value="TRUE"/>
									Sale &nbsp;
								</label>
								<label style="font-weight: normal; display: inline">
									<input type="checkbox" name='for_sublet' value="TRUE"/>
									Sublet &nbsp;
								</label>
								<label style="font-weight: normal; display: inline">
									<input type="checkbox" name='for_sterm' value="TRUE"/>
									Short Term 
								</label>
							</div>
							<div style="clear: both;"></div>
							 <div class="input_heading_50">START DATE </div><div class="input_heading_50"> END DATE</div>
							 <input type="date" name="availability_from" required="required" class="searchrent_inputtext3 w_48" style="margin-right:10px;margin-top:5px"/>
							 <input type="date" name="availability_to" required="required" class="searchrent_inputtext3 w_48" style="margin-top:5px"/>
							  <div class="input_heading">NOTES : </div>
							  <textarea cols="4" rows="4" name="notes" class="searchrent_inputtext2" style="height:100px;"></textarea>
						</div>
						<div class="col-md-4">
							<div class="rent_details_heading ">
							   PROPERTY INFO
							</div>
							<div class="input_heading">DAY PHONE</div>
							<input type="text" pattern="[0-9]+" name='day_phone' class="searchrent_inputtext2"/>
							<div class="input_heading">EVENING PHONE</div>
							<input type="text" pattern="[0-9]+"  name='eve_phone' class="searchrent_inputtext2"/>
							<div class="input_heading">MOBILE NUMBER</div>
							<input type="text" pattern="[0-9]+" name='mob_phone' required="required" class="searchrent_inputtext2"/>
							<div class="input_heading">PRICE</div>
							<input type="text" pattern="[0-9]+" name='price' required="required" class="searchrent_inputtext2"/>
							<div class="input_heading">Select Neighborhood Category</div>
							<select class="searchrent_select2 w_100" required="required" name="neighborhoodcateg" id="neighborhoodcateg">
								<?php 
								foreach ($neighborhoodcateg as $key => $value) {?>
								<option value="<?php echo $value["id"];?>"><?php echo $value["name"];?></option>
								<?php } ?>
								<option value="other">Other</option>
							</select>
							<input type="text" id="neighborhoodcateg_other" name="neighborhoodcateg_new" required="required" class="searchrent_inputtext2" />

							<div class="input_heading">Select Neighborhood</div>
							<select class="searchrent_select2 w_100" required="required" name="neighborhood" id="neighborhood">
								<?php 
								foreach ($neighborhood as $key => $value) {?>
								<option data-filter="<?php echo $value["neighborhood_id"];?>" value="<?php echo $value["id"];?>"><?php echo $value["name"];?></option>
								<?php } ?>
								<option value="other">Other</option>
							</select>
							<input type="text" id="neighborhood_other" name="neighborhood_new" required="required" class="searchrent_inputtext2" />
						</div>
						<div class="col-md-4">
							<div class="rent_details_heading ">
							   UPLOADS PHOTOS
							</div>
							<div class="input_heading" id="uploads">
								<div class="contents" id="upload_contents" style="margin-top: 10px;overflow-y: auto; max-height: 200px;">
									<div class="template_success" style="display:none;color : green;margin-bottom: 10px; width: 100%;">
										<i class="glyphicon glyphicon-ok"></i> Success : <span class="filename"></span>
									</div>
									<div class="template_failure" style="display:none;color : red;margin-bottom: 10px; width: 100%;">
										<i class="glyphicon glyphicon-ok"></i> Failure : <span class="filename"></span>
									</div>
								</div>
								<div class="btn btn-primary" id="upload_image">Upload Images</div>
							</div>
							<div style="clear: both;margin-bottom: 10px;"></div>
							<div style="font-size:10px;">
								JPEG, GIF, PNG, BMP Max Size 10mb
							</div>
						</div>
					</div>  
					<div class="row" style="margin-top:45px">
						<div class="col-md-3">
							<div class="rent_details_heading ">
							   ADDITIONAL INFO
							</div>
							<div class="input_heading">Bedrooms</div>
							<select class="searchrent_select2 w_100" name="bedroom">
							<?php foreach (domains::$select_domains["bedroom"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
							<div class="input_heading" name="partbath">Part Bath</div>
							<select class="searchrent_select2 w_100" name="partbath">
							<?php foreach (domains::$select_domains["partbath"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
							<div class="input_heading" name="fullbath">Full Bath</div>
							<select class="searchrent_select2 w_100" name="fullbath">
							<?php foreach (domains::$select_domains["fullbath"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
							<div class="input_heading" name="service_level">Service Level</div>
							<select class="searchrent_select2 w_100" name="service_level">
							<?php foreach (domains::$select_domains["service_level"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
							<div class="input_heading" name="access">Access</div>
							<select class="searchrent_select2 w_100" name="access">
							<?php foreach (domains::$select_domains["access"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
						</div>

						<div class="col-md-3" style="margin-top: 25px;">
							<div class="input_heading">Walls Allowed</div>
							<select class="searchrent_select2 w_100" name="walls_allowed">
							<?php foreach (domains::$select_domains["walls_allowed"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
							<div class="input_heading">Pet Policy</div>
							<select class="searchrent_select2 w_100" name="pet_policy">
							<?php foreach (domains::$select_domains["pet_policy"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
							<div class="input_heading">Building Age</div>
							<select class="searchrent_select2 w_100" name="building_age">
								<option value="1">New</option>
								<option value="2">---</option>
							</select>
							<div class="input_heading">Diplomats</div>
							<select class="searchrent_select2 w_100" name="diplomats">
							<?php foreach (domains::$select_domains["diplomats"] as $key => $value) {
								if ($key=="default")continue;?>
								<option value="<?php echo $key;?>"><?php echo $value;?></option>
							<?php }	?>
							</select>
							 <div class="input_heading">Condition Of Property</div>
								<select class="searchrent_select2 w_100">
									<option>New</option>
									<option>---</option>
									<option>---</option>
									<option>---</option>
								</select>

						</div>
						<div class="col-md-3" style="margin-top: 25px;">
							<div class="input_heading" style="font-weight: 900; margin-bottom: 0px;">
								Apartment Features
							</div>
							<div class="searchrent_check">
								<?php 
									foreach (domains::$checkboxes["apartment_features"] as $key=>$value){
								?>
								<label style="display: block; font-weight: normal">
									<input type="checkbox" value="TRUE" name="<?php echo $key;?>"/>
									&nbsp;<?php echo $value?>
								</label>
								<?php }?>
							</div>
						</div>
						<div class="col-md-3" style="margin-top: 25px;">
							<div class="input_heading" style="font-weight: 900; margin-bottom: 0px;">
								Building Features
							</div>
							<div class="searchrent_check">
								<?php 
									foreach (domains::$checkboxes["building_features"] as $key=>$value){
								?>
								<label style="display: block; font-weight: normal">
									<input type="checkbox" value="TRUE" name="<?php echo $key;?>"/>
									&nbsp;<?php echo $value;?>
								</label>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1 col-md-offset-0" style="margin-top:20px;">
							   <input type="submit" class="button_search" value="SUBMIT" />
						</div>
					</div>
					<div id="file_uploads">
						<input type="hidden" name="file_names" id="upload_file_names" />
					</div>
					<input type='text' id="image_success" autocomplete="false" value="" style="display: none;"/>
				</form>
        </div>
    </div>
</section>
<script type="text/javascript" src="js/SimpleAjaxUploader.min.js"></script>
<script type="text/javascript">
	$(function(){
		function func(th, suffix){
			if ($(th).val()=="other"){
				$("#neighborhood"+suffix+"_other").show().removeAttr("disabled").attr("required", "required");
			}
			else{
				$("#neighborhood"+suffix+"_other").hide().attr("disabled", "disabled").removeAttr("required");
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
		
		
		
		var count=2;
		$("#add_upload").click(function(){
			var input = $("#uploads .contents").eq(0).clone();
			$("input", input).attr("name", "image"+count++).val("").attr("required", "required");
			$("a", input).css("display", "inline");
			$("#uploads").append(input);
		});
		
		

  var btn = $("#upload_image")[0];
  var uploader = new ss.SimpleUpload({
        button: btn,
        url: 'partials/simple/file_upload.php',
        name: 'uploadfile',
        multipart: true,
        hoverClass: 'hover',
        focusClass: 'focus',
		multiple : true,
        responseType: 'json',
		allowedExtensions : ['jpg', 'jpeg', 'png', 'gif'],
        startXHR: function() {
        },
        onSubmit: function() {
            btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
        },
        onComplete: function( filename, response ) {
            btn.innerHTML = 'Choose Another File';
            
			if (response.success)
			{
				$("#image_success").val("required");
				var div = $("#upload_contents .template_success:eq(0)").clone().css("display", "block");
				$(".filename", div).html(response.msg);
				$("#upload_contents").append(div.css("display", "block"));
				div.css("display", "block");
				var value = $("#upload_file_names").val();
				$("#upload_file_names").val(value+" "+response.msg);
			}
        }
	});
	
	$("form").submit(function(){
		if ($("#image_success").val()==""){
			alert("Atleast one image should be uploaded");
			return false;
		}
		return true;
	})


	});
</script>
<?php 
	$content = ob_get_clean();
	include './partials/container.php';
?>