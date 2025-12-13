<?php
require "lib/router.php";

$uri_dir = "/crudAPI";

$router = new Router();

$router->add("{$uri_dir}/index.php", "MainController@index");
$router->add("{$uri_dir}/api/empleados", "EmpleadoController@apiEmpleados");
$router->add("{$uri_dir}/api/empleados/{id}", "EmpleadoController@apiEmpleados");
$router->add("{$uri_dir}/api/skills", "SkillsController@apiSkills");
$router->add("{$uri_dir}/api/skills/{id}", "SkillsController@apiSkills");
$router->add("{$uri_dir}/api/departamentos", "DepartamentoController@apiDepartamento");
$router->add("{$uri_dir}/api/departamentos/{id}", "DepartamentoController@apiDepartamento");

$router->dispatch($_SERVER["REQUEST_URI"]);
?>