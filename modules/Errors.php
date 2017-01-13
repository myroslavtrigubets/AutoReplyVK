<?php

class Errors
{
    public function getErrors($errcode)
    {
        switch ($errcode['error']['error_code']){
            case 1:
                return exit('Error Code 1: An unknown error occurred. Try again later.');
                break;
            case 3:
                return exit('Error code 3: transferred to an unknown method.
                 Check whether the right is the name of the called method.');
                break;
            case 6:
                return exit('Error code 6: too many requests per second.');
                break;
            case 7:
                return exit('Error code 7: do not have permission to perform this action.');
                break;
            case 8:
                return exit('Error code 8: The request is incorrect.
                 Check the syntax of the query and a list of the parameters used.');
                break;
            case 9:
                return exit('Error code 9: too much of the same type of action.
                 It is necessary to reduce the number of similar complaints.');
                break;
            case 14:
                return exit('Error code 14: requires code entry from the picture (Captcha)');
                break;
            default:
                return $errcode['response']['items'][0];
        }
    }
}
