<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller {
    function onFileUp( Request $request ) {
        // $request->FileKey->store( 'images' );
        // Or
        $result = $request->file( 'FileKey' )->store( 'images' );
        return $result;
    }
}