<?php

function alternateemail_general_settings(array &$config_vars): void
{
	global $txt;

	loadLanguage('AlternateEmail');

	// Find the last password setting.
	foreach ($config_vars as $id => $val)
		if (is_array($val) && $val[0] == 'webmaster_email')
			break;

	$varsA = array_slice($config_vars, 0, $id + 1);
	$varsB = array_slice($config_vars, $id + 1);

	$new_vars = array(
		array('mail_from', $txt['mail_from'], 'db', 'text', null),
	);

	$config_vars = array_merge($varsA, $new_vars, $varsB);
}