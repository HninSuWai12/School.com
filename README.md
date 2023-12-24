user URL segment for Dashboard
Forget Password=> change setting from User.PHP that given name from controller with static public with arrtibute $email => static public function getEmailSingle($email){
    return User::where('email' , '=' $email)->first();
} => using mailtrap.io => php artisan make:mail forgetPasswordMAil 
AuthController => ForgetPasswordEmail => User.php




