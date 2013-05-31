<?php function logout(){
   if (isset($_COOKIE["logged"])){
	  setcookie("logged",FALSE,time()-3600);
    setcookie('user',"",time()-3600);
   }
}

