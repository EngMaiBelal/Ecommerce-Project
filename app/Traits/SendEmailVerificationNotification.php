<?php
namespace App\Traits;

use App\Notifications\VerifyEmail;

trait SendEmailVerificationNotification{

    /**
     * Send the email verification notification.
     * I Override the method in this trait MustVerifyEmail 
     * \vendor\laravel\framework\src\Illuminate\Auth\MustVerifyEmail.php
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}

