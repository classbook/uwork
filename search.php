<?php 
	include "./partials/init.php";
	ob_start();
?>



<section class="page_mid"  >
	<div class="container" >
        <div class="page_pad">
        
          <div class="row">
          	<div class="col-md-12">
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
                <select class="searchrent_select w_65">
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
                <select class="searchrent_select w_65">
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
                <select class="searchrent_select w_65">
					<option value="0">0/month</option>
                    <option value="1000">1000/month</option>
                    <option value="2000">2000/month</option>
                    <option value="3000">3000/month</option>
                </select>
            </div>
          </div>
		<div class="row">
            <div class="col-md-2 col-md-offset-10">
               <div class="button_div" style="margin-top:20px !important; ">           
                     <input class="button_search " value="search&nbsp;>>" type="button">
                </div>
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
	
	for ($i=0; $i<($n_neighborhoodcateg/3); $i++) {
		$neighborhoodcateg;
?>
          <div class="row" id=div2>
          	<div class="col-md-4">
            	<div class="rent_details_heading w_100">
                  <?php ?>
                </div>
				<div class="searchrent_check">
					<ul>
						<li>
							<a href="#">Check All</a><a href="#">Uncheck All</a>
						</li>
						<li>
							<label style="font-weight: normal;display: block"><input type="checkbox"/> 
								&nbsp;Battery Park
							</label>
						</li>
						<li>
							<input type="checkbox"/> &nbsp;Manhatten Valley</br>
						</li>
					</ul>
                </div>
            </div>
          </div>
<?php }?>
			

			

          <div class="row">
            <div class="col-md-2 col-md-offset-10">
               <div class="button_div" style="margin-top:20px !important; ">           
                     <input type="button" class="button_search " value="search&nbsp;>>" />
                </div>
               </div>
          </div>
			
			
			
			
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
					<input type="checkbox" name="outdoor_spaces"/> Outdoor Spaces
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="outdoor_spaces"/> WiFi
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="outdoor_spaces"/> Swimming Pool
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="outdoor_spaces"/> Doorman
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="outdoor_spaces"/> Pets Allowed
				</label>
				<label style="display: block; font-weight: normal">
					<input type="checkbox" name="outdoor_spaces"/> Fitness Pool
				</label>
            </div>
            <div class="col-md-4">
				<div class="rent_details_heading w_100 hidden-xs">
                  Building Features
                </div>
				
				<div class="input_heading">BATH ROOM</div>
                <select class="searchrent_select2 w_100">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>               
				<div class="input_heading">PART BATH</div>
                <select class="searchrent_select2 w_100">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>               
				<div class="input_heading">FULL BATH</div>
                <select class="searchrent_select2 w_100">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>               
				<div class="input_heading">SERVICE LEVEL</div>
                <select class="searchrent_select2 w_100">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>               
            </div>
		</div>   
          <div class="row">
            <div class="col-md-2 col-md-offset-10">
               <div class="button_div" style="margin-top:20px !important; ">           
                     <input type="button" class="button_search " value="search&nbsp;>>" />
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



<?php 
	$content = ob_get_clean();
	include './partials/container.php';
?>