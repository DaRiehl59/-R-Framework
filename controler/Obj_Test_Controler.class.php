<?php
	class Obj_Test_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case 'test':
					self::display_test();
					break;
				case Router::get_default_action():
					self::display_default();
					break;
				default:
					Obj_Test_Viewer::display_error("Unknown action name `".$action."`.");
			}
		}
		
		private static function display_test()
		{
			$parameters = Router::get_parameters();
			if(count($parameters) == 1)
			{
				$id = $parameters[0];
				$object = new Obj_Test($id);
				$item = array(
					'id' => $object->get_id(),
					'nom' => $object->get_nom()
				);
				Obj_Test_Viewer::display_item($item);
			}
			elseif(count($parameters) == 0)
			{
				$rows = Obj_Test::get_list();
				if(! empty($rows))
				{
					Obj_Test_Viewer::display_list($rows);
				}
				else
				{
					Viewer::error("No values.");
				}
			}
		}
		
		private static function display_default()
		{
			Obj_Test_Viewer::display_default("Welcome in the ".get_class()." default method.");
		}
	}
?>