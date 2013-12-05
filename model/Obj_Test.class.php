<?php
	class Obj_Test
	{
		private $id;
		private $nom;
		
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
	}
?>