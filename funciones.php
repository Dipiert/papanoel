<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
	  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

	  switch ($theType) {
		case "text":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;
		case "long":
		case "int":
		  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
		  break;
		case "double":
		  $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
		  break;
		case "date":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;
		case "defined":
		  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
		  break;
	  }
	  return $theValue;
}

function array_envia($array) {
		$tmp = serialize($array);
		$tmp = urlencode($tmp);
		return $tmp;
}

function array_recibe($url_array) {
		$tmp = stripslashes($url_array);
		$tmp = urldecode($tmp);
		$tmp = unserialize($tmp);
		return $tmp;
}

?>