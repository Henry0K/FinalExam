<?php

/**
 * This function is used to display the login form
 * @return void
 */
function LoginForm(){
    ?>
    <form class="form-container" id="login-form" action="Backend/Controllers/userController.php" method="post">
        <input type="hidden" name="action" value="LOGIN">
        <input class="input-field" type="text" name="username" placeholder="Username">
        <input class="input-field" type="password" name="password" placeholder="Password">
        <input class="input-field" type="submit" name="login" value="Login">
    </form>
    <?php
}

/**
 * This function is used to display the sign up form
 * @return void
 */
function SignUpForm(){
    ?>
    <form class="form-container" id="signup-form" action="../../Backend/Controllers/userController.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="SIGNUP">
        <input class="input-field" type="text" name="username" placeholder="Username" required>
        <input class="input-field" type="text" name="firstname" placeholder="Firstname" required>
        <input class="input-field" type="text" name="lastname" placeholder="Lastname" required>
        <input class="input-field" type="email" name="email" placeholder="Email" required>
        <input class="input-field" type="password" name="password" placeholder="Password" required>
        <div style="text-align: left; margin-bottom: 10px;">
            Gender:
            <label><input type="radio" name="gender" value="male" required> Male</label>
            <label><input type="radio" name="gender" value="female"> Female</label>
        </div>
        <input class="input-field" type="number" name="age" placeholder="Age" required>
        <label for="profilePicture" style="float: left; margin-bottom: 10px;">Profile Picture:</label>
        <input class="input-field" type="file" name="profilePicture" accept="image/png, image/jpeg" required>
        <input class="input-field" type="hidden" name="role" value="User">
        <input class="input-field" type="submit" name="signup" value="Sign Up">
    </form>
    <?php   
}


?>