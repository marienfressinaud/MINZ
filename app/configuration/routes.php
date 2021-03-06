<?php
// mettre le paramètre use_url_rewriting à true pour profiter de l'url rewriting
return array (
	array (
		'route'         => '/login',
		'controller'    => 'index',
		'action'        => 'login'
	),
	array (
		'route'         => '/logout',
		'controller'    => 'index',
		'action'        => 'logout'
	),
	array (
		'route'         => '/([a-z]{2})-langue',
		'controller'    => 'index',
		'action'        => 'changeLanguage',
		'params'        => array ('l')
	),
	array (
		'route'         => '/(\d+)-logs',
		'controller'    => 'log',
		'action'        => 'index',
		'params'        => array ('page')
	),
	array (
		'route'         => '/vider-logs',
		'controller'    => 'log',
		'action'        => 'vider'
	),
	array (
		'route'         => '/retour-(\d)',
		'controller'    => 'index',
		'action'        => 'index',
		'params'        => array ('retour')
	),
);
