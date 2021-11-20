<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Redistest extends BaseController
{
	public function index()
	{
	
		d($foo = cache('foo'));
		d($foo = cache('berita'));

		echo 'Saving to the cache!<br />';
		$foo = 'foobarbasasz!';
	
		// Save into the cache for 5 minutes
		$test = cache()->save('foo', $foo);
		dd($test);
	}
}
