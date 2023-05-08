<?php
define("BASIC","http://127.0.0.1/eraasoft/PHP_Ecommerce/");
// Dashboard paths
define("ADMIN",BASIC."admin/");
define("ADMIN_FRONT",ADMIN."views/");
define("CATEGORY",ADMIN_FRONT."categories/");
define("PRODUCT",ADMIN_FRONT."products/");
define("USER",ADMIN_FRONT."users/");
define("ORDER",ADMIN_FRONT."orders/");
// frontend  pathes
define("FRONTEND",BASIC."frontend/");
define("CLIENT",FRONTEND."users/");
// system logon ,logout,register,home
define("SYSTEM",FRONTEND."system/");
define("LOGIN",SYSTEM."login.php");
define("REGISTER",SYSTEM."register.php");
define("LOGOUT",SYSTEM."logout.php");

?>