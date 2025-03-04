<?php 
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
/**
 * Validation response
 */
function requestValidate($request, $validation, array $messages = []){
    $validator = Validator::make($request->all(), $validation, $messages);

    if ($validator->fails()) {
        $response = response()->json([
            'status'=>false,
            'message' => $validator->errors()->first()
        ], 200);
        throw new HttpResponseException($response);      
    }
}