<?php
	class Obj_Test_Viewer extends Viewer
	{
		private static $smarty;
		public static function display_item($item)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->display('obj_test_display_item.tpl');
		}
		
		public static function display_list($rows)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("rows",$rows);
			$smarty->display('obj_test_display_list.tpl');
		}
		
		public static function display_default($msg)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("default_msg",$msg);
			$smarty->display('obj_test_display_default.tpl');
		}
		
		public static function display_error($message)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("error_msg",$message);
			$smarty->display('error.tpl');
		}
	}
?>
