<?php
	class Obj_Test extends Data
	{
		private $id;
		private $nom;
		private $obj_test2_role_items;
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case 2:
					$this->id = func_get_arg(0);
					$this->nom = func_get_arg(1);
					break;
				case 1:
					$this->id = func_get_arg(0);
					$res = Obj_Test_Mapper::select(array(),array(array('field' => 'id', 'operator' => '=', 'values' => array($this->id))));
					if(count($res))
					{
						$this->nom = $res[0]['nom'];
					}
					break;
				case 0:
					$this->id = null;
					$this->nom = "unkown";
			}
		}
		
		function get_id()
		{
			return $this->id;
		}
		
		function set_id($id)
		{
			$this->id = $id;
		}
		
		function get_nom()
		{
			return $this->nom;
		}
		
		function set_nom($nom)
		{
			$this->nom = $nom;
		}
		
		static function get_list()
		{
			$rows = Obj_Test_Mapper::select();
			return $rows;
		}
		
		/**
		 * Add item in list
		 * @param object
		 */
		public function add_obj_test2_role($obj_test2)
		{
			parent::add_item($obj_test2,'obj_test2_role_items');
		}
		
		/**
		 * Add all items in list
		 * @param object
		 */
		public function add_all_obj_test2_role($obj_test2_items)
		{
			parent::add_all_items($obj_test2_items,'obj_test2_role_items');
		}
		
		/**
		 * Remove item from list
		 * @param int id
		 */
		public function remove_obj_test2_role($obj_test2)
		{
			parent::remove_item($obj_test2,'obj_test2_role_items');
		}
		
		/**
		 * Get item from list
		 * @param int id
		 */
		public function get_obj_test2_role($id)
		{
			return parent::get_item($id,'obj_test2_role_items');
		}
		
		/**
		 * Get all items from list
		 * @param int id
		 */
		public function get_all_obj_test2_role()
		{
			return parent::get_all_items('obj_test2_role_items');
		}
		
		/**
		 * List contains item
		 * @param int id
		 */
		public function isset_obj_test2_role($obj_test2)
		{
			return parent::isset_item($obj_test2,'obj_test2_role_items');
		}
		
		/**
		 * List is empty
		 * @param int id
		 */
		public function empty_obj_test2_role()
		{
			return parent::empty_list('obj_test2_role_items');
		}
		
		/**
		 * Count items from list
		 * @param int id
		 */
		public function count_obj_test2_role()
		{
			return parent::count_list('obj_test2_role_items');
		}
	}
?>