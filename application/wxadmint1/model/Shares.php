<?php

namespace app\wxadmint1\model;

use think\Db;
use think\Model;
use app\wxadmint1\service\Shares as ShareServices;

class Shares extends Base
{
	public static function ModelTypeID($re,$type_id)
	{
		// halt($modelId);
		// halt($re);
		// halt($type_id);

		// $modelld = $modelld;

		

		

			
	$result = ShareServices::SendAll4($re,$type_id);
			

		return $result;
	}
}