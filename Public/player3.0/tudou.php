<?php



		$C=(getHeader('http://www.tudou.com/v/'.$_GET['v'].'/&autoPlay=true'));
		$C=explode('&code=',$C);
		$C=$C[1];
		$C=explode('&',$C);
		$C='http://www.tudou.com/programs/view/'.$C[0].'/?resourceId=0_06_02_99';
		if(isset($_GET['callback']))
		echo $_GET['callback'].'('.$C.')';
		else
		echo $C;

	
	function getHeader($U){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $U);
		curl_setopt($ch, CURLOPT_NOBODY,0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER,1);
		$O=curl_exec($ch);
		//$H=curl_getinfo($ch);
		//print_r($H['http_code']);
		curl_close($ch);
		return $O;
	}
?>