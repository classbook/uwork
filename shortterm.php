<?php 
	$_SHORTTERM = true;
	include "./partials/init.php";
	ob_start();

?>


<form method="GET" action="results.php">
	<input type='hidden' name="search" value='none'/>
	<input type="hidden" name="equals[for_sterm]" value="TRUE"/>
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
  		<input type="hidden" name="for_sterm" value="TRUE" />
          <div class="row" id="div1" >
          	<div class="col-md-3">
            	<div class="rent_details_heading w_100" >
                  CHECK IN
                </div>
                <input class="searchrent_select w_65" placeholder="Enter Check In Date" type="date" name="greaterthan['availability_from']" />
            </div>
            <div class="col-md-3"> 
            	<div class="rent_details_heading w_100">
                 CHECK OUT
                </div>
                <input class="searchrent_select w_65" placeholder="Enter Check Out Date" type="date" name="lessthan['availability_to']" />
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