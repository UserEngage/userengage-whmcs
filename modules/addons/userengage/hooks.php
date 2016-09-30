<?php

if (!defined("WHMCS"))
	die("This file cannot be accessed directly");



function userengage_ClientAreaFooterOutput($vars) {
	$sql = "SELECT value FROM `tbladdonmodules` WHERE setting = 'apikey' AND module = 'userengage';";
	$sql = mysql_query($sql);
	if(mysql_num_rows($sql) > 0)
	{
		$data = mysql_fetch_assoc($sql);
		$apikey = $data["value"];
	} else {
		$apikey = '';
	}


	$ue .= "<script type=\"text/javascript\">";
	$params = array();
	if (isset($vars['clientsdetails']))
	{
		$params[] = ['key' => 'name', 'value' => $vars['clientsdetails']['firstname'] . ' ' . $vars['clientsdetails']['lastname'] ];
		$keys = array(
			'email' => 'email'
		);

		foreach ($keys as $key => $value)
		{
			if (isset($vars['clientsdetails'][$key]))
			{
				$params[] = array(
					'key' => $value,
					'value' => html_entity_decode($vars['clientsdetails'][$key])
				);
			}
		}

		if (sizeof($params) > 0)
		{
			$ue .= "
  window.civchat = {
	apiKey: '{$apikey}',
    ";
			$paramsArray = array();
			foreach ($params as $param)
			{
				$paramsArray[] = $param['key'].": ". str_replace(chr(34), "'", json_encode($param["value"]));
			}
			$ue .= implode(",\n    ", $paramsArray);
			$ue .= "\n  };
";
		}else{
		$ue .= "
window.civchat = {
  apiKey: '{$apikey}'
}";
		}
	}






	$ue .= "</script>
<script type=\"text/javascript\">
(function() {
  var ue = document.createElement('script'); ue.type = 'text/javascript'; ue.async = false;
  ue.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.userengage.io/widget.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ue, s);
})();
</script>";

return $ue;

}

add_hook("ClientAreaFooterOutput",1,"userengage_ClientAreaFooterOutput");

?>
