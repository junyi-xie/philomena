<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'class/PHPMailer/src/Exception.php';
    require 'class/PHPMailer/src/PHPMailer.php';
    require 'class/PHPMailer/src/SMTP.php';

    
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
    function flashMessage($name = '', $message = '', $class = 'alert-success') {
    
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

    
    /**
     * Get files in given directory with specified extention type.
     *
     * @param string $dir
     * @param string $ext
     *
     * @return array
     */
    function getFiles($dir = '', $ext = '') {

        $handle = opendir($dir);

        if (!$handle) return array();
        
        $contents = array();

        while ($entry = readdir($handle))   
        {
            if ($entry == '.' || $entry == '..') continue;

            $entry = $dir.DIRECTORY_SEPARATOR.$entry;
            
            if (is_file($entry)) {

                if (preg_match("/\.$ext$/", $entry)) {

                    $contents[] = $entry;

                }

            } else if (is_dir($entry)) {

                $contents = array_merge($contents, getFiles($entry, $ext));

            }
        }

        closedir($handle);
    
        return $contents;
    }

    
    /**
     * Load files from array. This fuction is used with getFiles().
     *
     * @param array $contents
     *
     * @return string
     */
    function loadFiles($contents = array()) {

        $s = '';

        krsort($contents);
        
        foreach($contents as $file) {

            $ext = pathinfo($file, PATHINFO_EXTENSION);

            switch ($ext) {

                default:
                    $s .= 'silence...';
                break;

                case 'js':
                    $s .= '<script type="text/javascript" src="'.$file.'"></script>';
                break;

                case 'css': 
                    $s .= '<link rel="stylesheet" type="text/css" href="'.$file.'?'.date("YmdHis").'" media="screen">';
                break;

                case 'php':
                    $s .= 'include_once("'.$file.'")';
                break;

            }

        }

        return $s;
    }


    /**
     * Send mail function. Created a reminder message for the customer about their booked appointment.
     * 
     * @return mixed
     */
    function sendMail() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'username';
        $mail->Password = 'password';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('', '');
        $mail->addAddress('', '');

        $mail->isHTML(true);
        $mail->AddEmbeddedImage('assets/images/layout/logo_philomena.png', 'philomena_logo');

        $mail->CharSet = "UTF-8";
        $mail->Subject = "";
        $mail->Body = "";

        
        if (!$mail->send()) {
            return $mail->ErrorInfo;
        } else {
            return true;
        }
    }
?>