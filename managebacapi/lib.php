<?php
function getSession($username, $password, $domain) {
	$content = file_get_contents('https://' . $domain . '.managebac.com/login');
	$tokenalmost = explode('meta content="', explode('" name="csrf-token"', $content)[0]);
	$csrf_token = $tokenalmost[count($tokenalmost) - 1];
	$url = 'https://' . $domain . '.managebac.com/sessions';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
		'login' => $username,
		'password' => $password,
		'remember_me' => '0',
		'commit' => 'Sign-in',
		'utf' => '%E2%9C%93',
		'authenticity_token' => $csrf_token
	)));
	$result = curl_exec($ch);
	if(curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
		return 0;
	}
	
	return array(
      "session" => preg_split("/\\r\\n|\\r|\\n/", explode('.~.-', $result)[2])[0],
      "token" => $csrf_token
    );
}

function deleteDropboxFile($did, $fid, $session, $csrf, $domain) {
	$url = 'https://'.$domain.'.managebac.com/student/dropboxes/'.$did.'/destroy_asset?file_id='.$fid;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'X-CSRF-Token: '.$csrf,
	'Cookie: request_method=PATCH; _managebac_session='.$session
	));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($ch);
	return curl_getinfo($ch, CURLINFO_HTTP_CODE);
}
?>