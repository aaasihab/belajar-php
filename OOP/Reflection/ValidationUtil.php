<?php

// reflection -> membaca struktur kode saat program sedang berjalan

class ValidationUtil
{
    // tanpa reflection
    static function validate(LoginRequest $request) {
        if (!isset($request->username)) {
            throw new ValidationException("Username is null");
        } else if (!isset($request->password)) {
            throw new ValidationException("Password is null");
        } else if (is_null($request->username)){
            throw new ValidationException("Username is not set");
        } else if (is_null($request->password)){
            throw new ValidationException("Password is not set");
        }
    }
    // dengan reflection
    static function validateReflection(LoginRequest $request) {
        // membuat object dari class reflection
        $reflection = new ReflectionClass($request);
        //  mengambil semua properti yang memiliki visibilitas publik (public) ke dalam array
        $properties =  $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach($properties as $property){
            // mengecek apakah propertiy sudah terinisialisasi atau sudah dibuat
            if (!$property->isInitialized($request)){
                throw new ValidationException("$property->name is not set");
            // mengecek apakah property null
            } else if (is_null($property->getValue($request))){
                throw new ValidationException("$property->name is null");
            }
        }
    }
}