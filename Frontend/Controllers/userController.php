<?php
function ScriptLogin(){

    /** 
     * This function is used to check if the username and password are empty
     * @param string $username
     * @param string $password
     * @return void
     */
    
    ?>
    <script>
        function LoginFrm(){
            let username=document.getElementById("username").value;
            console.log(username);
            let password=document.getElementById("password").value;
            console.log(password);
            if ((username=="")||(password=="")){
                alert("Please fill in the username and password");
                }                
            else
                document.getElementById("login-form").submit();
        }
        function ResetFrm(){
            document.getElementById("username").value="";
            document.getElementById("password").value="";
        }
    </script>
    <?php
}

?>

