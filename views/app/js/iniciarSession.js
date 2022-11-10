function iniciarSession(){
    var connect,form,result,user,pass;
    user= __('txt_email').value;
    pass= __('txt_contrasena').value;
    form ='user='+ user +'&pass='+ pass;
    
    
    if(user!='' && pass!=''){
    connect= window.XMLHttpRequest? new XMLHttpRequest():new ActivexObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function(){
        if(connect.readyState == 4 && connect.status == 200){
            
            if(parseInt(connect.responseText)===1){
               result='<div><div class="alert alert-success" role="alert">redireccionando al sistema</div>'; 
                __('mensaje').innerHTML = result;
                location.reload();
            }else {
                 result='<div class="alert alert-danger" role="alert">usuario o contraseña incorrectos</div>'; 
                __('mensaje').innerHTML = result;
 
            }
            
        }else if(connect.readyState!=4){
            result='<div class="alert alert-primary" role="alert">estamos procesando la solicitud...!.</div>';
            __('mensaje').innerHTML= result;
          
        }
    }
    
    
    connect.open('POST','ajax.php?mode=login',true);
    /* si esta linea no se pone : no se ejecutara la peticion*/
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
    
     }else {
         result='<div class="alert alert-warning" role="alert">coplete todos los campos por favor!</div>';
            __('mensaje').innerHTML= result;
 
     }
 }
 
 function runScriptLogin(e){
     if(e.keyCode == 13){
        iniciarSession();
     }
 }