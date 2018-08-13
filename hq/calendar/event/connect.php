<?php
$db = new mysqli('localhost','vatsimwa','ml+~Karw[4%h','vatsimwa_cad_events');
if($db->connect_errno)
{
	die('Sorry , We are having some problems');
}