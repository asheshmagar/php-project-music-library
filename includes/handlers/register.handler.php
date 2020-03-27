<?php

function sanitizeFormPassword($inputText)
{
    $inputText = strip_tags ( $inputText );
    return $inputText;
}

function sanitizeFormUsername($inputText)
{
    $inputText = strip_tags ( $inputText );
    $inputText = str_replace ( " " , "" , $inputText );
    return $inputText;
}

function sanitizeFormString($inputText)
{
    $inputText = strip_tags ( $inputText );
    $inputText = str_replace ( " " , "" , $inputText );
    $inputText = ucfirst ( strtolower ( $inputText ) );
    return $inputText;
}


if ( isset( $_POST[ 'registerButton' ] ) ) {
    $registerUsername  = sanitizeFormUsername ( $_POST [ 'registerUsername' ] );
    $firstName         = sanitizeFormString ( $_POST[ 'firstName' ] );
    $lastName          = sanitizeFormString ( $_POST[ 'lastName' ] );
    $email             = sanitizeFormString ( $_POST [ 'email' ] );
    $email2            = sanitizeFormString ( $_POST [ 'email2' ] );
    $registerPassword  = sanitizeFormPassword ( $_POST [ 'registerPassword' ] );
    $registerPassword2 = sanitizeFormPassword ( $_POST [ 'registerPassword2' ] );

    $wasSuccessful = $account -> register ( $registerUsername , $firstName , $lastName , $email , $email2 , $registerPassword , $registerPassword2 );

    if ( $wasSuccessful == true ) {
        header ( "Location: index.php" );
    }

}
