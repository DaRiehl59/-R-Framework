<?php
	class Obj_Test3 extends Data
	{
		private $id_obj_test;
		private $id_obj_test2;
		private $obj_test;
		private $obj_test2;
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case 2:
					$this->id_obj_test = func_get_arg(0);
					$this->id_obj_test2 = func_get_arg(1);
					break;
				case 0:
					$this->id_obj_test = null;
					$this->id_obj_test2 = null;
			}
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
		
		function get_id_obj_test2()
		{
			return $this->id_obj_test2;
		}
		
		function set_id_obj_test2($id_obj_test2)
		{
			$this->id_obj_test2 = $id_obj_test2;
		}
		
		function get_obj_test2()
		{
			return $this->obj_test2;
		}
		
		function set_obj_test2($obj_test2)
		{
			$this->obj_test2 = $obj_test2;
		}
	}
?>