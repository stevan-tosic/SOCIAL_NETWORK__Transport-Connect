<?php
return array(
	'driver' => 'smtp',
	'host' => 'host22.dwhost.net',
	'port' => 465,
	'from' => array('address' => 'noreply@hire-me.in.rs', 'name' => 'Auth'),
	'encryption' => 'ssl',
	'username' => 'noreply@hire-me.in.rs',
	'password' => 'armAgedon1',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
);
