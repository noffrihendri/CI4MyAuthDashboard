<?php

namespace App\Controllers;

use App\Libraries\Treeviewdata;
use App\Models\Comment;


class Home extends BaseController
{
	public function index()
	{

		//dd("halo");
		return view('home/home');
	}


	public function livecomment()
	{

		//dd("halo");
		return view('home/livecoment');
	}


	public function createcomment(){

		$comment_id = $this->request->getPost('comment_id');
		$name = $this->request->getPost('comment_name');
		$content = $this->request->getPost('comment_content');

		$comment = new Comment();

		$arrdata =  [
			'parent_comment_id' => $comment_id,
			'comment' => $content,
			'comment_seeder_name' => $name,
			'topik '=>''
		];
		$comment->insert($arrdata);
		$arrresult = [
			'valid' => true,
			'message' => 'add success'
		];
		echo json_encode($arrresult);
	}

	public function listcomment(){
		$comment = new Comment();

		$parent = $comment->orderby('comment_id', 'ASC')
						->get()
						->getResult();

		$arrLstTemp = array();

		foreach ($parent as $objModule) {

			if (!isset($arrLstTemp[$objModule->parent_comment_id])) {
				$arrLstTemp[$objModule->parent_comment_id] = array();
			}

			array_push($arrLstTemp[$objModule->parent_comment_id], $objModule);
		}

		
		
		$treeviewdata = new Treeviewdata();
		$lastmodule = $treeviewdata->ArrangeModuleTreeDataComment(0, $arrLstTemp);

		$arrdata = [
			'valid' => true,
			'data' => $lastmodule
		];
		echo json_encode($arrdata);
	}
}
