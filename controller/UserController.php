<?php
class UserController{
    private $userModel;

    public function __construct($userModel){
        $this->userModel = $userModel;
    }

    public function login($username, $password){
        $user = $this->userModel->authenticate($username, $password);
        if ($user){
            $_session['user_id'] = $user["id"];
            header('location: /dashboard');
        }
        else{
            return 'Invalid username or password';
        }
    }
}
?>

