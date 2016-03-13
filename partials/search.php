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
	for ($i=0; $i<($n_neighborhoodcateg/4); $i++) {
?>
          <div class="row" id=div2>
			  <?php
			  for ($j=0; $j<4; $j++){
				  if ($n_parsed++ == $n_neighborhoodcateg)
					  break;
				  $neighborhoodcateg = mysql_fetch_array($neighborhoodcategs, MYSQL_ASSOC);
			  ?>
          	<div class="col-md-3">
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
            <div class="col-md-3">
				<div class="rent_details_heading w_100 hidden-xs">
                  Building Features
                </div>
				
				<div class="input_heading">BED ROOM</div>
                <select class="searchrent_select2 w_100" name='equals[bedroom]'>
					<?php foreach (domains::$select_domains["bedroom"] as $key => $value) {?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }	?>
                </select>               
				<div class="input_heading">PART BATH</div>
                <select class="searchrent_select2 w_100" name='equals[partbath]'>
					<?php foreach (domains::$select_domains["partbath"] as $key => $value) {?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }	?>
                </select>               
				<div class="input_heading">FULL BATH</div>
                <select class="searchrent_select2 w_100" name="equals[fullbath]">
					<?php foreach (domains::$select_domains["fullbath"] as $key => $value) {?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }	?>
                </select>               
				<div class="input_heading">SERVICE LEVEL</div>
                <select class="searchrent_select2 w_100" name="equals[service_level]">
					<?php foreach (domains::$select_domains["service_level"] as $key => $value) {?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }	?>
                </select>
            </div>
			<div class="col-md-3">
            	<div class="rent_details_heading w_100">
                 Apartment Features
                </div>
				<div style="clear: both;"></div>

				<div class="input_heading">Access</div>
                <select class="searchrent_select2 w_100" name="equals[access]">
					<?php foreach (domains::$select_domains["access"] as $key => $value) {?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }	?>
                </select>               
				<div class="input_heading">Pet Policy</div>
                <select class="searchrent_select2 w_100" name="equals[pet_policy]">
					<?php foreach (domains::$select_domains["pet_policy"] as $key => $value) {?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }	?>
                </select>               
				<div class="input_heading">Walls Allowed</div>
                <select class="searchrent_select2 w_100" name="equals[walls_allowed]">
					<?php foreach (domains::$select_domains["pet_policy"] as $key => $value) {?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }	?>
                </select>               

			</div>
          	<div class="col-md-3">
            	<div class="rent_details_heading w_100">
                 Apartment Features
                </div>
				<div style="clear: both;"></div>
				<div class="searchrent_check">
				<?php 
					foreach (domains::$checkboxes["apartment_features"] as $key=>$value){
				?>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" value="TRUE" name="equals[<?php echo $key;?>]"/>
					&nbsp;<?php echo $value?>
				</label>
				<?php }?>
				</div>
            </div>
          	<div class="col-md-3">
            	<div class="rent_details_heading w_100">
                 Building Features
                </div>
				<div style="clear: both;"></div>
				<div class="searchrent_check">
				<?php 
					foreach (domains::$checkboxes["building_features"] as $key=>$value){
				?>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" value="TRUE" name="equals[<?php echo $key;?>]"/>
					&nbsp;<?php echo $value?>
				</label>
				<?php }?>
				</div>
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
			})
			
			$(".uncheck_all", th).click(function(e){
				$("input[type='checkbox']", th).prop("checked", false);
				e.preventDefault();
			})
		});
	});
</script>
