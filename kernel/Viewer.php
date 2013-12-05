<?php
	class Viewer
	{
		var $smarty;
		
		public static function init_viewer()
		{
			global $PARAM;
			$smarty = new Smarty;
			//$smarty->force_compile = true;
			$smarty->template_dir = $PARAM['directories']['view'].'/'.'templates';
			$smarty->compile_dir = $PARAM['directories']['view'].'/'.'templates_c';
			$smarty->config_dir = $PARAM['directories']['view'].'/'.'configs';
			
			// $smarty->debugging = true;
			// $smarty->caching = true;
			// $smarty->cache_lifetime = 120;
			$smarty->caching = false;
			$smarty->cache_lifetime = 0;
			
			$smarty->assign("head_title", $PARAM['html']['title']);
			$smarty->assign("head_charset", $PARAM['html']['charset']);
			
			foreach($PARAM['html']['meta'] as $name => $content)
			{
				$metas[] = array('name' => $name, 'content' => $content);
			}
			$smarty->assign("head_metas", $metas);
			// $smarty->assign("Name","Fred Irving Johnathan Bradley Peppergill",true);
			
			$folder = $PARAM['directories']['style'];
			$files = get_files($folder);
			$styles = array();
			foreach ($files as $file)
			{
				if(strtolower(substr($file,strlen($file)-4,4)) == ".css")
				{
					$styles[] = './'.$folder.'/'.$file;
				}
			}
			$smarty->assign("head_styles", $styles);
			
			$folder = $PARAM['directories']['scripts'];
			$files = get_files($folder);
			$scripts = array();
			foreach ($files as $file)
			{
				if(strtolower(substr($file,strlen($file)-3,3)) == ".js")
				{
					$scripts[] = './'.$folder.'/'.$file;
				}
			}
			$smarty->assign("head_scripts", $scripts);
			
			$smarty->assign("head_favicon", is_file('favicon.ico'));
			
			return $smarty;
		}
		
		public static function error($msg)
		{
			$smarty = self::init_viewer();
			
			$smarty->assign("error_msg",$msg);
			$smarty->display('error.tpl');
		}
	}
?>
