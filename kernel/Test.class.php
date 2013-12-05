<?php
	class Test
	{
		public static function Database()
		{
			$msgs = array();

			Database::connect();

			$msgs[] = Database::get_driver()." server [".Database::get_host()."] is ".(Database::is_connected()?"connected.":"disconnected.");

			if(Database::database_exists())
			{
				$msgs[] = Database::get_name()." exists.";
				
				if(!Database::create_database())
				{
					$msgs[] = Database::get_name()." cannot be created.";
				}
				
				if(Database::select_database())
				{
					$msgs[] = Database::get_name()." is selected.";
				}
				else
				{
					$msgs[] = Database::get_name()." cannot be selected.";
				}
			}
			else
			{
				$msgs[] = Database::get_name()." doesn't exist.";
				
				if(!Database::select_database())
				{
					$msgs[] = Database::get_name()." cannot be selected.";
					
					if(Database::create_database())
					{
						$msgs[] = Database::get_name()." has been created.";
					}
				}
			}
			
			Database::disconnect();
			$msgs[] = Database::get_driver()." server [".Database::get_host()."] is ".(Database::is_connected()?"connected.":"disconnected.");
			
			
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
	}
		
		public static function database_deploy()
		{
			Database::deploy();
			$msgs[] = "Database deployed.";
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}

		public static function database_select()
		{
			$res = Database::select(
				array
				(
					'fields' => array('o.nom'),
					'functions' => array(
						array(
							'function' => 'count',
							'field' => 'o2.id_obj_test',
							'alias' => 'nb'
						)
					)
				),
				array(
					'table'=>'obj_test',
					'alias'=>'o',
					'join'=>array(
						array(
							'table'=>'obj_test2',
							'alias'=>'o2',
							'table1'=>array('name'=>'o2','key'=>'id_obj_test'),
							'table2'=>array('name'=>'o','key'=>'id')
						),
					)),
				array
				(
					array
					(
						'field'=>'o2.nom',
						'operator' => 'between',
						'values' => array('a','z')
					),
					array
					(
						'field'=>'o.id',
						'operator' => 'between',
						'fields' => array('o2.min','o2.max')
					),
					array
					(
						'field'=>'o.nom',
						'operator' => 'in',
						'values' => array('test 1','test 2'),
						'fields' => array('o2.nom')
					)
				),
				array('o.nom'),
				array
				(
					array
					(
						'function'=>'count',
						'field'=>'o2.id_obj_test',
						'operator' => '<=',
						'values' => array('2')
					)
				),
				array(array('field'=>'o.nom')),
				array('offset'=>0,'rows'=>10)
			);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
	
		public static function database_create_table()
		{
			$table = "Obj_Test3";
			$fields = array(
				array('name' => 'id', 'type' => 'int', 'constraint' => 'NOT NULL', 'options' => 'AUTO_INCREMENT'),
				array('name' => 'nom', 'type' => 'varchar', 'size' => 20),
				array('name' => 'id_obj_test2', 'type' => 'int')
			);
			$primary_key = array('id');
			$foreign_key = array(
				array('Foreign Key' => array('id_obj_test2'), 'table' => 'obj_test2', 'Primary Key' => array('id'))
			);

			$res = Database::create_table($table,$fields,$primary_key,$foreign_key);

			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
			}
		
		public static function database_add_constraint()
		{
			$table = "Obj_Test3";
			$fields = array(
				array('name' => 'id', 'type' => 'int', 'constraint' => 'NOT NULL', 'options' => 'AUTO_INCREMENT'),
				array('name' => 'nom', 'type' => 'varchar', 'size' => 20),
				array('name' => 'id_obj_test2', 'type' => 'int')
			);
			$primary_key = array('id');
			$foreign_key = array(
				array('Foreign Key' => array('id_obj_test2'), 'table' => 'obj_test2', 'Primary Key' => array('id'))
			);
			
			$res = Database::add_constraint($table,$foreign_key);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function database_insert_into()
		{
			$table = "Obj_Test3";
			$fields = array('nom','id_obj_test2');
			$values = array(
				array('test test 1',2),
				array('test test 2',5),
				array('test test 3',1)
			);
			
			$res = Database::insert_into($table,$fields,$values);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function database_update()
		{
			$table = "Obj_Test3";
			$set[] = array('field' => 'nom', 'value' => 'test test test 1');
			$set[] = array('field' => 'id_obj_test2', 'value' => 1);
			$where[] = array('field' => 'nom','operator' => '=','values' => array('test test 1'));
			
			$res = Database::update($table,$set,$where);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function database_delete_from()
		{
			$table = "Obj_Test3";
			$where[] = array('field' => 'nom','operator' => '=','values' => array('test test 2'));
			
			$res = Database::delete_from($table,$where);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function obj_test_mapper_select()
		{
			$res = Obj_Test_Mapper::select(
				array
				(
					'fields' => array('nom'),
					'functions' => array(
						array(
							'function' => 'count',
							'field' => 'id',
							'alias' => 'object_number'
						)
					)
				),
				array
				(
					array
					(
						'field'=>'id',
						'operator' => 'between',
						'values' => array(1,2)
					),
					array
					(
						'field'=>'nom',
						'operator' => 'in',
						'values' => array('test 1','test 2'),
					)
				),
				array('nom'),
				array
				(
					array
					(
						'function'=>'count',
						'field'=>'id',
						'operator' => '<=',
						'values' => array('2')
					)
				),
				array(array('field'=>'nom')),
				array('offset'=>0,'rows'=>10)
			);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		
		// public static function obj_test_mapper_select()
		// {
			// $res = Obj_Test_Mapper::select(
				// array(),
				// array(
					// array(
						// 'field'=>'nom',
						// 'operator' => '=',
						// 'values' => array('test 1')
					// )
				// )
			// );
			
			// $msgs[] = print_r($res,true);
			// $smarty = Viewer::init_viewer();
			// $smarty->assign("msgs",$msgs);
			// $smarty->display('test.tpl');
		// }
		
		public static function obj_test2_mapper_select()
		{
			$res = Obj_Test2_Mapper::select(
				array(),
				array(
					array(
						'field'=>'nom',
						'operator' => '=',
						'values' => array('bla bla 1')
					)
				)
			);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function obj_test_mapper_insert()
		{
			$res = Obj_Test_Mapper::insert(
				array('nom'),
				array(
					array('test 5'),
					array('test 6'),
				)
			);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function obj_test2_mapper_insert()
		{
			$res = Obj_Test2_Mapper::insert(
				array('nom'),
				array(
					array('bla bla 5'),
					array('bla bla 6'),
				)
			);
			
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function obj_test_mapper_update()
		{
			$set[] = array(
				'field' => 'nom',
				'value' => 'test update 1'
			);
			$where[] = array(
				'field' => 'nom',
				'operator' => '=',
				'values' => array('test 1')
			);
			$res = Obj_Test_Mapper::update($set,$where);
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function obj_test2_mapper_update()
		{
			$set[] = array(
				'field' => 'nom',
				'value' => 'test update 1'
			);
			$where[] = array(
				'field' => 'nom',
				'operator' => '=',
				'values' => array('bla bla 1')
			);
			$res = Obj_Test2_Mapper::update($set,$where);
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}

		public static function obj_test_mapper_delete()
		{
			$where[] = array(
				'field' => 'nom',
				'operator' => '=',
				'values' => array('test 2')
			);
			$res = Obj_Test_Mapper::delete($where);
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
		
		public static function obj_test2_mapper_delete()
		{
			$where[] = array(
				'field' => 'nom',
				'operator' => '=',
				'values' => array('bla bla 2')
			);
			$res = Obj_Test2_Mapper::delete($where);
			$msgs[] = print_r($res,true);
			$smarty = Viewer::init_viewer();
			$smarty->assign("msgs",$msgs);
			$smarty->display('test.tpl');
		}
	}
?>