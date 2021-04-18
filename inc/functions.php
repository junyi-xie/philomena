<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    
    /**
     * print_r but fancier.
     *
     * @param mixed $arr
     *
     * @return void
     */
    function printr($arr) {
        print '<code><pre style="text-align: left; margin: 10px;">'.print_r($arr, TRUE).'</pre></code>';
    }


    /**
     * Function to create and display error and success messages
     * 
     * @params string $name
     * @params string $message
     * @params string $class
     * 
     * @return void
     */
    function flashMessage($name = '', $message = '', $class = 'success') {
    
        if (!empty($name)) {

            if (!empty($message) && empty($_SESSION[$name])) {

                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                        
                if (!empty($_SESSION[$name.'_class'])) {
                    unset($_SESSION[$name.'_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;

            } elseif (!empty($_SESSION[$name]) && empty($message)) {
                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : 'success';
                echo '<div class="'.$class.'">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }
?>