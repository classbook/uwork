<?php 
	include "./partials/init.php";
	ob_start();
$r1 = mysql_query("select * from sitsolut_avi.aboutus where id=1");
$row=mysql_fetch_array($r1, MYSQL_ASSOC);

?>

<section class="page_mid"  >
    <div class="container" >
        <div class="page_pad" >
            <div class="row" >

                <div class="col-md-12" style="text-align: center; margin-top: 50px;">
					<div style="font-size: 26px;margin-bottom : 15px;text-decoration: underline;">ABOUT US</div>
					<?php echo $row["content"];?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="divider_bar hgt_5" style="margin-bottom: 0px;margin-top : 50px;" ></div>


<?php 
	$content = ob_get_clean();
	include './partials/container.php';
?>