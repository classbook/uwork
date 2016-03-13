<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Title</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!--[if gt IE 5.5]><link rel="stylesheet" type="text/css" href="ie6-and-up.css" /><![endif]-->
<!--[if gt IE 6]><link rel="stylesheet" type="text/css" href="ie7-and-up.css" /><![endif]-->
<!--[if gt IE 7]><link rel="stylesheet" type="text/css" href="ie8-and-up.css" /><![endif]-->
<!--[if gte IE 8]><link rel="stylesheet" type="text/css" href="ie8-and-up.css" /><![endif]-->
<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="ie8-and-down.css" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" href="all-ie-only.css" /><![endif]-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
<!--<link href="css/bootstrap-theme.css" type="text/css" rel="stylesheet" />-->
<link href="css/styles.css" type="text/css" rel="stylesheet" />
<link href="css/hover.css" rel="stylesheet" media="all">
<!-----jquery------------>
<script src="js/jquery.js"></script>
<style type="text/css">
	.date-input-buttons{
		display : none;
	}
</style>
</head>
<body>

<!---------------------------------------------------Header Menu and logo----------------------------------------------------------------->
<header class="page_head " >
	<div class="container" >
    	<div class="page_pad" >
        	<div class="row" >            	
            	<div class="col-lg-12 pull-right" >
                	<div class="top_head" >
                        <ul>
							<?php if (isset($_SESSION["user_logged"])):?>
                            <li><a href="#"><?php echo $_SESSION["user_name"];?></a></li>
                            <li><a href="logout.php" style="text-decoration:underline">LOGOUT</a></li>							<?php endif;if (!isset($_SESSION["user_logged"])):?>
							
							<li><a href="login.php">Login</a></li>
							<li><a href="register.php">Register</a></li>
							<?php endif;?>
                            <li>
                            	<form action="#" class="top_search_form">
                                	<input type="text" placeholder="Search" class="top_search_text" >
                                    <input type="button" value=">>" class="top_search_button" >
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>                
            </div>
    		
    	</div>
    </div>
</header>

<!---------------------------------------------------Header Main Menu----------------------------------------------------------------->
<section class="page_mid "  >
	<div class="container" >
        <div class="page_pad" >
        	<div class="row" >
            <div class="col-lg-3 " >
            <div class="triangle"></div>
                	<div class="logo" >
                    	<img src="img/logoa.png" >
                    </div>
                </div>
            	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
                    <nav class="navbar navbar-default" role="navigation">
                      <div class="container-fluid">                        
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          
                        </div>
                    
                        
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:25px">
                          <ul class="nav navbar-nav navbar-right" >
                          	<li><a href="index.php">Home</a></li>
                          	<li><a href="search.php">SEARCH</a></li>
                            <li><a href="shortterm.php">SHORT TERM</a></li>
                            <li><a href="sublet.php">SUBLET</a></li>
                            <li><a href="rentbuy.php">RENT/BUY</a></li>
                            <li><a href="list.php" class="active1">LIST YOUR APT</a></li>
                            <li><a href="about.php">ABOUT US</a></li>
                           
                          </ul>
                        </div>
                      </div>
                    </nav>                     
                </div>
            </div>
        </div>
    </div>
</section>
<div class="divider_bar hgt_5" ></div>
<!-------------------------------------------------Section contain---------------------------------------------------------->



<?php echo $content;?>




<!---------------------------------------------------Footem Menu bar----------------------------------------------------------------->

<section class="page_mid "  >
	<div class="container" >
        <div class="page_pad" >
        	<div class="row" >
            	<div class="col-lg-12" >
                	<div class="contain_foot_menu" >
                         <ul>
                            <li>$01, KP road, Near Bund garden, Pune. 440014</li> <li> | </li>
                            <li>(020)-225245</li>
                         </ul>
                         <ul>
                            <li><a href="#">Policy</a></li><li> | </li>
                            <li><a href="#">Terms and Condition</a></li><li> | </li>
                            <li><a href="#">Application</a></li><li> | </li>
                            <li><a href="#">Trade Mark</a></li><li> | </li>
                            <li><a href="#">Disclaimer </a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="page_foot " >
	<div class="container" >
        <div class="page_pad" >
        	<p class="text-center" >This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        </div>
    </div>
</footer>


<!-------------------------------------------------------------------------------------------------------------------->

<script src="js/bootstrap.js"></script>
<script src="js/modernizr.custom.min.js" type="text/javascript"></script>
<script src="js/mesonary.js" type="text/javascript"></script>
<script src="js/utility.js"></script>
<script type="text/javascript" src="js/minified/polyfiller.js"></script>
<script type="text/javascript">
	//configure forms-ext features
	webshim.activeLang("en-IN");

	webshim.setOptions("forms", {
		lazyCustomMessages: true,
		replaceValidationUI: true,
		customDatalist: "auto"
	});
	webshim.setOptions("forms-ext", {
		replaceUI: "true",
		types: "date",
		date: {
			startView: 2,
			openOnFocus: true,
			classes: "show-week",
			dateFormat : "dd-mm-yy"
		},
		number: {
			calculateWidth: false
		},
		range: {
			classes: "show-activevaluetooltip"
		}
	});
	webshim.polyfill("forms-ext");
</script>
<!-------------------------------------------------------------------------------------------------------------------->
</body>
</html>
