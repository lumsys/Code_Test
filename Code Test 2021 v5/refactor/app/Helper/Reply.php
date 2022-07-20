<?php

    namespace App\Helper;


    class Reply
    {

        /** Return success response
         * @param $message
         * @return array
         */
        
        public static function apiSuccess($message, $data = []): array
        {
            return [
                'success' => self::getTranslated($message),
                'data' => $data
            ];
        }

        public static function apiError($message, $errorData = []): array {
            return [
                'error' => self::getTranslated($message),
                'data' => $errorData,
            ];
        }
    
    }