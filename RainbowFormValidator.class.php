<?php
/*
 * Rainbow Form Validator
 * Works with PHP 5.4 and above.
 */
Class RainbowFormValidator {
    public static $errors;

    /*
    * Validate Array Method
    * @param array $array
    * @param array $rules
    * @return bool
    */
    public static function validateArray($array = [], $rules = []) {
        foreach($rules as $ruleKey => $ruleValue) {
            foreach($ruleValue['rules'] as $optionName => $optionValue) {
                switch($optionName) {
                    case 'required':
                        if((isset($array[$ruleKey]) && empty($array[$ruleKey])) || !array_key_exists($ruleKey, $array)) {
                            self::$errors[$ruleKey] = str_replace(":field", $rules[$ruleKey]['name'], '<b>:field</b> field is required');
                        }
                        break;
                    case 'match':
                        if($array[$ruleKey] !== $array[$optionValue]) {
                            $replace = [
                                ':field1' => $rules[$ruleKey]['name'],
                                ':field2' => $rules[$optionValue]['name']
                            ];
                            self::$errors[$ruleKey] = str_replace(array_keys($replace), array_values($replace), '<b>:field1</b> field doesn\'t match with <b>:field2</b>');
                        }
                        break;
                }
            }
        }
        if(self::$errors) {
            return false;
        }
        else
        {
            return true;
        }
    }
}