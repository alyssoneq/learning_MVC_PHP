<?php 
// This page is loaded on the bootstrap.php file 
// It is a helper file to load URLs related functions 

// Simple page redirect 
	function redirect($page){
		header('location: ' . URLROOT . '/' . $page);
	}