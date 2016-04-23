<?php

/**
 * @author David Grudl
 * @license BSD
 */
class AdminerRemoteColor
{
	private $color;

	function __construct($color)
	{
		$this->color = $color;
	}

	function head()
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) || !isset($_SERVER['REMOTE_ADDR']) ||
			!in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')))
		{
			echo '<style>
                #menu { border-left: 1em solid '.$this->color.'; min-height: 100%; }
                #menu h1 a { color: '.$this->color.' }
                #content { margin-left: 22em }
                #breadcrumb { left: 22em }
                </style>';
		}
	}

}
