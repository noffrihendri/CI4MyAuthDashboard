<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Libraries\Treeviewdata;
use App\Models\Menu;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['auth','my'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();

		session();
	}


	public function themeadmin()
	{
		$menus = new Menu();


		// $request = \Config\Services::request();
		// user();
		 //dd(get_role());


		$resutListModul = $menus->getmodule(user()->id)->getResult();
		//dd($resutListModul);
		$arrLstTemp = array();
		foreach ($resutListModul as $objModule) {

			if (!isset($arrLstTemp[$objModule->parent])) {
				$arrLstTemp[$objModule->parent] = array();
			}

			array_push($arrLstTemp[$objModule->parent], $objModule);
		}

		$treeviewdata = new Treeviewdata();
		$lastmodule = $treeviewdata->ArrangeModuleTreeData(0, $arrLstTemp);
		$data = array(
			'username' => user()->username,
			'email' => user()->email,
			'role' => ''
		);

		$data['lstModule'] = $lastmodule;
	//	dd($data);
		return view('navbar', $data);
	}
}
