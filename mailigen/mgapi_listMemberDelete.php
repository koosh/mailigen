<?php
/**
 * This Example shows how to listMemberDelete using the MGAPI.php class and do some basic error checking.
 */
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$email_address = $my_email;

$retval = $api->listMemberDelete($id, $email_address);

header("Content-Type: text/plain");
if ($api->errorCode) {
	echo "Unable to load listMemberDelete()!\n";
	echo "\tCode=" . $api->errorCode . "\n";
	echo "\tMsg=" . $api->errorMessage . "\n";
} else {
	echo "Returned: " . $retval . "\n";
}
