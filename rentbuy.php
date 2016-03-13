<?php 
	include "./partials/init.php";
	ob_start();

?>


<form method="GET" action="results.php">
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
          	<div class="col-md-3">
            	<div class="rent_details_heading w_100" >
                  BEDROOMS
                </div>
                <select class="searchrent_select w_65" name="equals['bedroom']">
					<?php foreach (domains::$select_domains["bedroom"] as $key => $value) {?>
					<option value="<?php echo $key;?>"><?php echo $value;?></option>
					<?php }?>
                </select>
            </div>
            <div class="col-md-3"> 
            	<div class="rent_details_heading w_100">
                 MIN RENT
                </div>
                <select class="searchrent_select w_65" name="greaterthan['price']">
					<option value="None">Any</option>
					<option value="0">0 RS/month</option>
                    <option value="1000">1000 RS/month</option>
                    <option value="2000">2000 RS/month</option>
                    <option value="3000">3000 RS/month</option>
                </select>
            </div>
            <div class="col-md-3">
            	<div class="rent_details_heading w_100">
                  MAX RENT
                </div>
                <select class="searchrent_select w_65" name="lessthan['price']">
					<option value="None">Any</option>
					<option value="0">0 RS/month</option>
                    <option value="1000">1000 RS/month</option>
                    <option value="2000">2000 RS/month</option>
                    <option value="3000">3000 RS/month</option>
                </select>
            </div>
          </div>
          <div class="row">
          	<div class="col-md-12">
              <div class="linedivider"> &nbsp; </div>
            </div>
          </div>   

<?php 
	include 'partials/search.php';
	$content = ob_get_clean();
	include './partials/container.php';
?>