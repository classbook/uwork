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
          	<div class="col-md-3">
            	<div class="rent_details_heading w_40" >
                  BEDROOMS
                </div>
                <select class="searchrent_select">
                	<option>Studio</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>
            </div>
            <div class="col-md-3"> 
            	<div class="rent_details_heading w_40">
                 MIN RENT
                </div>
                <select class="searchrent_select">
                	<option>$ 0/month</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>
            </div>
            <div class="col-md-2">
            	<div class="rent_details_heading w_65">
                  MAX RENT
                </div>
                <select class="searchrent_select">
                	<option>$ 0/month</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>
            </div>
            <div class="col-md-2">
            	<div class="rent_details_heading w_65">
                 PET POLICY
                </div>
                <select class="searchrent_select">
                	<option>Pets Allowed</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>                
            </div>
            <div class="col-md-2">
               <div class="button_div">           
                 <input type="button" class="button_search " value="search&nbsp;>>" />
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
          <div class="row" id=div2>
          	<div class="col-md-4">
            	<div class="rent_details_heading w_40">
                  MANHATTAN
                </div>
                 <div class="searchrent_check">
                  <ul>
                    <li> <a href="#">Check All</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Uncheck All</a></li>
                  	<li>
                       <input type="checkbox"/> &nbsp;Battery Park </br>
                       <input type="checkbox"/>  &nbsp;Carnegie Hill</br>
                       <input type="checkbox"/>  &nbsp;Central Herlen</br>
                       <input type="checkbox"/>  &nbsp;Chelsea</br>
                       <input type="checkbox"/>  &nbsp;Chinatown / Little Italy</br>
                       <input type="checkbox"/>  &nbsp;Downtown Above 12TH</br>
                       <input type="checkbox"/>  &nbsp;Downtown Below 14TH</br>
                       <input type="checkbox"/>  &nbsp;East Harlen</br>
                       <input type="checkbox"/>  &nbsp;East Village</br>
                       <input type="checkbox"/>  &nbsp;Financial District</br>
                       <input type="checkbox"/>  &nbsp;Grammercy</br>
                       <input type="checkbox"/>  &nbsp;Greenwich Village</br>
                       <input type="checkbox"/>  &nbsp;Hamiton Heights</br>
                       <input type="checkbox"/>  &nbsp;Harlen</br>
                       <input type="checkbox"/>  &nbsp;Kips Bay</br>
                       <input type="checkbox"/>  &nbsp;Lower East Side</br>
                     </li>
                     <li>
                     	 <input type="checkbox"/> &nbsp;Manhatten Valley</br>
                         <input type="checkbox"/> &nbsp;Manhattenville</br>
                         <input type="checkbox"/> &nbsp;Midtown East</br>
                         <input type="checkbox"/> &nbsp;Midtown West</br>
                         <input type="checkbox"/> &nbsp:Murray Hill</br>
                         <input type="checkbox"/> &nbsp;Roosevelt Island</br>
                         <input type="checkbox"/> &nbsp;SOHO</br>
                         <input type="checkbox"/> &nbsp;Tribeca</br>
                         <input type="checkbox"/> &nbsp;Turtle Bay</br>
                         <input type="checkbox"/> &nbsp;Union Square</br>
                         <input type="checkbox"/> &nbsp;Upper East Side</br>
                          <input type="checkbox"/> &nbsp;Upper Manhattan</br>
                         <input type="checkbox"/> &nbsp;Upper West Side</br>
                         <input type="checkbox"/> &nbsp;Washington Heights/Inwood</br>
                         <input type="checkbox"/> &nbsp;West Harlen</br>
                         <input type="checkbox"/> &nbsp;West Village</br>
                         <input type="checkbox"/> &nbsp;Yorkville</br>
                     </li>
                   </ul>
                </div>
            </div>
             <div class="col-md-4"> 
            	<div class="rent_details_heading w_40">
                 BROOKLYN
                </div>
              <div class="searchrent_check">
                <ul>
                	 <li> <a href="#">Check All</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Uncheck All</a></li>
                  	<li>
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>
                    </li>
                    <li>
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>
                    </li>
                 </ul>
                </div>
            </div>
             <div class="col-md-4">
            	<div class="rent_details_heading w_65">
                  QUEENS
                </div>
                 <div class="searchrent_check">
                <ul>
                    <li> <a href="#">Check All</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Uncheck All</a></li>
                  	<li>
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>
                    </li>
                    <li>
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>
                    </li>
                 </ul>
                </div>
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
          
                   
          <div class="row" >
          	<div class="col-md-12">
            	<div class="full_width_div">
            	   <div class="arrow_up" id="arrow3"></div> <h2>&nbsp; &nbsp;AMENITIES</h2>
                </div>
            </div>
          </div>
          <div class="row">
          	<div class="col-md-2">
            	<div class="rent_details_heading w_60">
                 BATHROOM
                </div>
                <div class="input_heading">Full</div>
                <select class="searchrent_select2 w_80">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>               
            </div>
            <div class="col-md-2"> 
             <div class="rent_details_heading w_60 hidden-xs" style="background:none;">
                  &nbsp;
                </div>  
                <div class="input_heading">Partial</div>         	
                <select class="searchrent_select2 w_80">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>               
            </div>
            <div class="col-md-2"> 
            	<div class="rent_details_heading w_40">
                 Access
                </div>
                <div class="input_heading hidden-xs">&nbsp;</div>
                <select class="searchrent_select2 w_80">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>
            </div>
            <div class="col-md-2">
            	<div class="rent_details_heading w_65">
                 Service
                </div>
                <div class="input_heading hidden-xs">&nbsp;</div>
                <select class="searchrent_select2 w_80">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>
            </div>
            <div class="col-md-2">
            	<div class="rent_details_heading w_65">
                 Walls
                </div>
                <div class="input_heading hidden-xs">&nbsp;</div>
                <select class="searchrent_select2 w_80">
                	<option>Any</option>
                    <option>---</option>
                    <option>---</option>
                    <option>---</option>
                </select>                
            </div>         
            <div class="col-md-2">
                   <div class="rent_details_heading w_65">
                     Diplomats
                    </div>
                    <div class="input_heading hidden-xs">&nbsp;</div>
                    <select class="searchrent_select2 w_80">
                        <option>Any</option>
                        <option>---</option>
                        <option>---</option>
                        <option>---</option>
                    </select>                
                </div>            
          </div>
           <div class="row" style="margin-top:20px">
          	   <div class="col-md-2">
            	<div class="rent_details_heading w_60">
                  BUILDING
                </div>
                <div class="searchrent_check">                
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                </div>
               </div>
               <div class="col-md-2">
            	<div class="rent_details_heading w_60">
                  OWNERSHIP
                </div>
                <div class="searchrent_check">                
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                </div>
               </div>
               <div class="col-md-4">
            	<div class="rent_details_heading w_40">
                  BUILDING FEATURES
                </div>
                <div class="searchrent_check">                
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                </div>
               </div>
               <div class="col-md-2">
            	<div class="rent_details_heading w_100">
                  APARTMENT FEATURES
                </div>
                <div class="searchrent_check">                
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                    	<input type="checkbox"/> &nbsp;Manhatten Valley</br>
                        <input type="checkbox"/> &nbsp;Manhatten Valley</br>                  
                </div>
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