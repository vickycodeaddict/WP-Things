<?php

add_filter('wp_mail','dev_email_in_bcc', 10,1);
function dev_test_email_in_bcc($args){
    $is_dev = true; //Add condition for production
    if($is_dev){
        $bcc_email = sanitize_email('dev.email@domain.com');
        if (is_array($args['headers'])){
            $args['headers'][] = 'Bcc: '.$bcc_email ;
        }else{
            $args['headers'] .= 'Bcc: '.$bcc_email."\r\n";
        }
    }
    return $args;
}