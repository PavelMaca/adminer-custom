<?php


class AdminerColors
{

	private $colors;

	public function __construct($colors)
	{
		$this->colors = $colors;
	}

	public function head()
	{
		if (isset($this->colors[$_GET['server']])) {
			$color = $this->colors[$_GET['server']];

		} elseif (isset($this->colors[$_GET['pgsql']])) {
			$color = $this->colors[$_GET['pgsql']];

		} elseif (isset($this->colors[$_SERVER['SERVER_NAME']])) {
			$color = $this->colors[$_SERVER['SERVER_NAME']];

		} else {
			return;
		}

		echo '<style>
			#menu { border-left: 1em solid ' . $color . '; min-height: 100%; }
			#menu h1 a { color: ' . $color . ' }
			#content { margin-left: 22em }
			#breadcrumb { left: 22em }
			</style>';
	}

}
