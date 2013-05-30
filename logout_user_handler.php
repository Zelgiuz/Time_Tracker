<?php function logout(){
   if (isset($_COOKIE["logged"]))
	setcookie("logged",FALSE);
}

