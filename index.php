<?php
/**
 * Component Launch File
 * @author D. [R]IEHL
 * @version 1.0
 */

require_once "_parameters.init.php";
require_once "_kernel.func.php";

import_directory($PARAM['directories']['kernel']);
import_directory($PARAM['directories']['plugins']['root']);
import_directory($PARAM['directories']['mapping']);
import_directory($PARAM['directories']['model']);
import_directory($PARAM['directories']['view']);
import_directory($PARAM['directories']['controler']);

// Test::database();
// Test::database_deploy();
// Test::database_create_table();
// Test::database_add_constraint();
// Test::database_insert_into();
// Test::database_update();
// Test::database_delete_from();
// Test::database_select();


// Test::obj_test_mapper_select();
// Test::obj_test2_mapper_select();
// Test::obj_test_mapper_insert();
// Test::obj_test2_mapper_insert();
// Test::obj_test_mapper_update();
// Test::obj_test2_mapper_update();
// Test::obj_test_mapper_delete();
// Test::obj_test2_mapper_delete();

Router::parse_url();
Router::load_controler();
?>