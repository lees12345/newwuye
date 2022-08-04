<?php

namespace app\wxadmint1\controller;

use think\Controller;

use think\Ucpaas;
use think\Db;

class Index extends Newbase
{

	public function index()
	{
		return $this->fetch();
	}
}