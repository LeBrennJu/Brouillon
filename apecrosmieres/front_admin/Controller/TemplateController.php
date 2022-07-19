<?php

namespace Controller;

class TemplateController
{

    public static function messageAlert($message)
    {
        echo $message;
        // echo "<script>alert($message)</script>";
    }


    public static function home()
    {
        wp_redirect(home_url());
    }
}
