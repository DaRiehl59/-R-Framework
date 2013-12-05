<?php
	class Welcome_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case '':
					/*empty action that wait to be defined.*/
					break;
				case Router::get_default_action():
					self::display_default();
					break;
				default:
					Welcome_Viewer::display_error("Unknown action name `".$action."`.");
			}
		}
		
		
		private static function display_default()
		{
			$title="[R] Framework 1.2";
			$subtitle = "Welcome";
			$message = "Welcome in your first page.";
			Welcome_Viewer::display_default($title,$subtitle,$message);
		}
	}
?>