<?php
	class obj_test2 extends Data
	{
		private $id;
		private $nom;
		private $min;
		private $max;
		private $id_obj_test;
		private $obj_test;
		private $obj_test_role_items;
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case 5:
					$this->id = func_get_arg(0);
					$this->nom = func_get_arg(1);
					$this->min = func_get_arg(2);
					$this->max = func_get_arg(3);
					$this->id_obj_test = func_get_arg(4);
					break;
				case 0:
					$this->id = null;
					$this->nom = "unkown";
					$this->min = null;
					$this->max = null;
					$this->id_obj_test = null;
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
		
		function get_id_obj_test()
		{
			return $this->id_obj_test;
		}
		
		function set_id_obj_test($id_obj_test)
		{
			$this->id_obj_test = $id_obj_test;
		}
		
		function get_obj_test()
		{
			return $this->obj_test;
		}
		
		function set_obj_test($obj_test)
		{
			$this->obj_test = $obj_test;
		}
		
		/**
		 * Add item in list
		 * @param object
		 */
		public function add_obj_test_role($obj_test)
		{
			parent::add_item($obj_test,'obj_test_role_items');
		}
		
		/**
		 * Add all items in list
		 * @param object
		 */
		public function add_all_obj_test_role($obj_test_items)
		{
			parent::add_all_items($obj_test_items,'obj_test_role_items');
		}
		
		/**
		 * Remove item from list
		 * @param int id
		 */
		public function remove_obj_test_role($obj_test)
		{
			parent::remove_item($obj_test,'obj_test_role_items');
		}
		
		/**
		 * Get item from list
		 * @param int id
		 */
		public function get_obj_test_role($id)
		{
			return parent::get_item($id,'obj_test_role_items');
		}
		
		/**
		 * Get all items from list
		 * @param int id
		 */
		public function get_all_obj_test_role()
		{
			return parent::get_all_items('obj_test_role_items');
		}
		
		/**
		 * List contains item
		 * @param int id
		 */
		public function isset_obj_test_role($obj_test)
		{
			return parent::isset_item($obj_test,'obj_test_role_items');
		}
		
		/**
		 * List is empty
		 * @param int id
		 */
		public function empty_obj_test_role()
		{
			return parent::empty_list('obj_test_role_items');
		}
		
		/**
		 * Count items from list
		 * @param int id
		 */
		public function count_obj_test_role()
		{
			return parent::count_list('obj_test_role_items');
		}
	}
?>