<?php
switch($action) {
    case 'logout':
        $_SESSION = array();    // Clear all session data from memory
        session_destroy();      // Clean up the session ID 
        $login_message = 'Logout successful';
        include('view/login.php');
        break;
    case 'show_register':
        include('view/register.php');
        break;
    case 'show_login':
        include('view/login.php');
        break;
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (AdminDB::is_valid_admin_login($username, $password)) {
            $_SESSION['is_valid_admin'] = true;
            header("Location: .?action=list_vehicles");
        } else {
            $login_message = 'Incorrect Login / Login Required';
            include('view/login.php');
        }
        break;
    case 'register':
        include('util/valid_register.php');
        $errors_array = ValidRegister::valid_registration($username, $password, $confirm_password);
        if (AdminDB::username_exists($username)) {
            array_push($errors, "The username you entered is already taken.");
        }
        if(!empty($errors_array)) {
            foreach ($errors_array as $key => $value) {
                echo "<p style='color:red;'>".$value."</p><br>";
            }
            include('view/register.php');
        } else {
            AdminDB::add_admin($username, $password);
            $_SESSION['is_valid_admin'] = true;
            header("Location: .?action=list_vehicles");
        }
        break;
}