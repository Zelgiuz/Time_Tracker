<?php function logout(){
   if (isset($_COOKIE["logged"])){
	  setcookie("logged",0,time()-3600);
    setcookie('user',"",time()-3600);
    return FAlSE;
   }
}

