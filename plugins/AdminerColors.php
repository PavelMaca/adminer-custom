<?php


class AdminerColors
{

	private $colors;

	private $production;

	public function __construct($colors, $production)
	{
		$this->colors = $colors;
		$this->production = $production;
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
			$color = $this->production;
		}

		echo '<style>
			#menu { border-left: 1em solid ' . $color . '; min-height: 100%; }
			#menu h1 a { color: ' . $color . ' }
			#content { margin-left: 22em }
			#breadcrumb { left: 22em }
			</style>';
	}

}
