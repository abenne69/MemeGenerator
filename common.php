<?php

function error($msg){
	?>
	<html>
	<head>
		<script language="JavaScript">
	
		alert("<?=$msg?>");
		history.back();
		
		</script>
	</head>
	</html>
	<?php
exit();
}
?>
