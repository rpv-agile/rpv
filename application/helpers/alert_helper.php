<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('errorAlert')) {
	function errorAlert($message = '')
	{
		return '<div class="alert alert-danger mx-auto my-2 alert-dismissible fade show" role="alert">' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		   <span aria-hidden="true">&times;</span>
		 </button>
	   </div>';
	}
}


if (!function_exists('successAlert')) {
	function successAlert($message = '')
	{
		return '<div class="alert alert-success mx-auto my-2 alert-dismissible fade show" role="alert">' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		   <span aria-hidden="true">&times;</span>
		 </button>
	   </div>';
	}
}
if (!function_exists('primaryAlert')) {
	function primaryAlert($message = '')
	{
		return '<div class="alert alert-primary mx-auto my-2 alert-dismissible fade show" role="alert">' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		   <span aria-hidden="true">&times;</span>
		 </button>
	   </div>';
	}
}

if (!function_exists('secondaryAlert')) {
	function secondaryAlert($message = '')
	{
		return '<div class="alert alert-secondary mx-auto my-2 alert-dismissible fade show" role="alert">' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		   <span aria-hidden="true">&times;</span>
		 </button>
	   </div>';
	}
}


if (!function_exists('warningAlert')) {
	function warningAlert($message = '')
	{
		return '<div class="alert alert-warning mx-auto my-2 alert-dismissible fade show" role="alert">' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		   <span aria-hidden="true">&times;</span>
		 </button>
	   </div>';
	}
}

if (!function_exists('lightAlert')) {
	function lightAlert($message = '')
	{
		return '<div class="alert alert-light mx-auto my-2 alert-dismissible fade show" role="alert">' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		   <span aria-hidden="true">&times;</span>
		 </button>
	   </div>';
	}
}


if (!function_exists('darkAlert')) {
	function darkAlert($message = '')
	{
		return '<div class="alert alert-dark mx-auto my-2 alert-dismissible fade show" role="alert">' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		   <span aria-hidden="true">&times;</span>
		 </button>
	   </div>';
	}
}
