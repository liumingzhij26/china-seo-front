<?php
// 模型
class AddonarticleModel extends Model {
	
	protected $_validate = array(
			array('title','require','不能为空'), 
			array('content','require','内容不能为空'), 
	);
	
	
	
    
   
}
