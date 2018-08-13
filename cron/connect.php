<?php
$db = new mysqli('localhost','vatsimwa','','vatsimwa_hq');
if($db->connect_errno)
{
	die('Sorry , We are having some problems');
}