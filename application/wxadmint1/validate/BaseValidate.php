<?php
namespace app\wxadmint1\validate;

use think\Validate;




class BaseValidate extends Validate
{
	public function gocheck($data)
	{
		
		$params = $data;
		if(!empty($params['count'])){
			$params['count'] = intval($params['count']);
		}
		
		$result = $this->check($params);
		if(!$result){
			$e = $this->error;
			return $e;		
		}else{
			return true;
		}
	}

}