<?php
	class Obj_Test2
	{
		private $id;
		private $nom;
		private $min;
		private $max;
		private $id_obj_test;
		
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
	}
?>