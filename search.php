<?php 
	include "./partials/init.php";
	ob_start();

?>


<form method="POST" action="results.php">
	<input type='hidden' name="search" value='none'/>
<section class="page_mid"  >
	<div class="container" >
        <div class="page_pad">

          <div class="row">
          	<div class="col-md-6">
            	<div class="full_width_div" id="clickdiv">
            	   <div class="arrow_up" id="arrow"></div> <h2>&nbsp; &nbsp;ESSENTIALS</h2>
                </div>
            </div>
          </div>
          <div class="row" id="div1" >
          	<div class="col-md-4">
            	<div class="rent_details_heading w_100" >
                  BEDROOMS
                </div>
                <select class="searchrent_select w_65" name="equals['bedroom']">
					<option value="$$impossible">Any</option>
                	<option>Studio</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>
            </div>
            <div class="col-md-4"> 
            	<div class="rent_details_heading w_100">
                 MIN RENT
                </div>
                <select class="searchrent_select w_65" name="greaterthan['price']">
					<option value="$$impossible">Any</option>
					<option value="0">0/month</option>
                    <option value="1000">1000/month</option>
                    <option value="2000">2000/month</option>
                    <option value="3000">3000/month</option>
                </select>
            </div>
            <div class="col-md-4">
            	<div class="rent_details_heading w_100">
                  MAX RENT
                </div>
                <select class="searchrent_select w_65" name="lessthan['price']">
					<option value="$$impossible">Any</option>
					<option value="0">0/month</option>
                    <option value="1000">1000/month</option>
                    <option value="2000">2000/month</option>
                    <option value="3000">3000/month</option>
                </select>
            </div>
          </div>
          <div class="row">
          	<div class="col-md-12">
              <div class="linedivider"> &nbsp; </div>
            </div>
          </div>   
            
          <div class="row" id="clickdiv2">
          	<div class="col-md-12">
            	<div class="full_width_div">
            	   <div class="arrow_up" id="arrow2"></div> <h2>&nbsp; &nbsp;NAIGHBOURHOODS</h2>
                </div>
            </div>
          </div>
<?php
	$count = mysql_query("select count(*) from neighborhood_category");
	$count = mysql_fetch_array($count);
	$neighborhoodcategs = mysql_query("select * from neighborhood_category");
	$n_neighborhoodcateg = $count[0];
	
	$n_parsed = 0;
	for ($i=0; $i<($n_neighborhoodcateg/3); $i++) {
?>
          <div class="row" id=div2>
			  <?php
			  for ($j=0; $j<3; $j++){
				  if ($n_parsed++ == $n_neighborhoodcateg)
					  break;
				  $neighborhoodcateg = mysql_fetch_array($neighborhoodcategs, MYSQL_ASSOC);
			  ?>
          	<div class="col-md-4">
            	<div class="rent_details_heading w_100">
                  <?php echo $neighborhoodcateg["name"];?>
                </div>
				<div class="searchrent_check">
					<ul>
						<li>
							<a href="#" class="check_all">Check All</a>&nbsp;&nbsp;&nbsp;
							<a href="#" class="uncheck_all">Uncheck All</a>
						</li>
						<?php 
						$neighbours = mysql_query("select * from neighborhood where neighborhood_id=".$neighborhoodcateg["id"]);
						$ncount = mysql_query("select count(*) from neighborhood where neighborhood_id=".$neighborhoodcateg["id"]);
						$ncount = mysql_fetch_array($ncount)[0];
						for ($k=0; $k<  round($ncount/2); $k++){
							$neighborhood = mysql_fetch_array($neighbours, MYSQL_ASSOC);
						?>
						<li>
							<label style="font-weight: normal;display: block">
								<input type="checkbox" name="neighbor[]" value="<?php echo $neighborhood["id"];?>"/> 
								&nbsp;<?php echo $neighborhood["name"];?>
							</label>
						</li>
						<?php }
						for ($k=  round($ncount/2); $k<$ncount; $k++){
							$neighborhood = mysql_fetch_array($neighbours, MYSQL_ASSOC);
						?>
						<li>
							<label style="font-weight: normal;display: block">
								<input type="checkbox" name="neighbor[]" value="<?php echo $neighborhood["id"];?>"/> 
								&nbsp;<?php echo $neighborhood["name"];?>
							</label>
						</li>
						<?php }?>
					</ul>
                </div>
            </div>
			  <?php }?>
          </div>
<?php }?>

			
			
			
			
          <div class="row">
          	<div class="col-md-12">
              <div class="linedivider"> &nbsp; </div>
            </div>
          </div>  
          
                   
		<div class="row" >
          	<div class="col-md-12">
            	<div class="full_width_div">
            	   <div class="arrow_up" id="arrow3"></div> <h2>&nbsp; &nbsp;AMENITIES</h2>
                </div>
            </div>
		</div>
		<div class="row">
          	<div class="col-md-4">
            	<div class="rent_details_heading w_100">
                 Apartment Features
                </div>
				<div style="clear: both; margin-bottom: 20px;"></div>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="boolean['outdoor_spaces']"/> Outdoor Spaces
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="boolean['fitness_pool']"/> WiFi
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="boolean['doorman']"/> Swimming Pool
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="boolean['wifi']"/> Doorman
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="boolean['pets_allowed']"/> Pets Allowed
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="boolean['swimming_pool']"/> Fitness Pool
				</label>
            </div>
            <div class="col-md-4">
				<div class="rent_details_heading w_100 hidden-xs">
                  Building Features
                </div>
				
				<div class="input_heading">BATH ROOM</div>
                <select class="searchrent_select2 w_100" name="equals['bathroom']">
					<option value="$$impossible">Any</option>
                    <option value="$$impossible">---</option>
                </select>               
				<div class="input_heading">PART BATH</div>
                <select class="searchrent_select2 w_100" name="equals['partbath']">
					<option value="$$impossible">Any</option>
                    <option value="$$impossible">---</option>
                </select>               
				<div class="input_heading">FULL BATH</div>
                <select class="searchrent_select2 w_100" name="equals['fullbath']">
					<option value="$$impossible">Any</option>
                    <option value="$$impossible">---</option>
                </select>               
				<div class="input_heading">SERVICE LEVEL</div>
                <select class="searchrent_select2 w_100" name="equals['serviceLevel']">
					<option value="$$impossible">Any</option>
                    <option value="$$impossible">---</option>
                </select>               
            </div>
		</div>   
          <div class="row">
            <div class="col-md-2 col-md-offset-10">
               <div class="button_div" style="margin-top:20px !important; ">           
                     <input type="submit" class="button_search " value="search&nbsp;>>" />
                </div>
               </div>
          </div>
          <div class="row">
          	<div class="col-md-12">
              <div class="linedivider"> &nbsp; </div>
            </div>
          </div> 	
        </div>
    </div>
</section>
</form>

<script type="text/javascript">
	$(document).ready(function(){
		$(".searchrent_check").each(function(i){
			var th = this;
			$(".check_all", th).click(function(e){
				$("input[type='checkbox']", th).prop("checked", true);
				e.preventDefault();
				$(this).css("font-weight", "900");
				$(".uncheck_all", th).css("font-weight", "normal");
			})
			
			$(".uncheck_all", th).click(function(e){
				$("input[type='checkbox']", th).prop("checked", false);
				e.preventDefault();
				$(this).css("font-weight", "900");
				$(".check_all", th).css("font-weight", "normal");
			})
		});
	});
</script>

<?php 
	$content = ob_get_clean();
	include './partials/container.php';
?>