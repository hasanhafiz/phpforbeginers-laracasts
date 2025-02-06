<?php 

namespace Core;
class Validator {
    public array $errors = [];
    public static function isEmpty( $value ) {
        return empty( $value );
    }
    
    public static function validLength( $value, int $min = 3, int $max = 100 ) {
        $value = trim( $value );
        return ( strlen( $value ) >= $min ) && ( strlen( $value ) <= $max );
    }
    
    public static function email( $value ): bool {
        return filter_var( $value, FILTER_VALIDATE_EMAIL );
    }
}