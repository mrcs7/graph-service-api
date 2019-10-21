<?php
/* Success response  */
function successResponse($message = null)
{
    return response()->json(['status' => 'success', 'message' => $message], 200);
}

/* Success response with data **/
function successResponseWithData($data, $message = null)
{
    $data = [
        'status' => 'success',
        'message' => $message,
        'data' => $data,
    ];

    return response()->json($data, 200);
}

/* Success response  */
function errorResponse($message = null)
{
    return response()->json(['status' => 'error', 'message' => $message], 500);
}

function badRequest($message = null)
{
    return response()->json(['status' => 'error', 'message' => $message], 400);
}

/* Success response with data */
function errorResponseWithData($data, $message = null)
{
    $data = [
        'status' => 'success',
        'message' => $message,
        'data' => $data,
    ];

    return response()->json($data, 500);
}

/* validation errors */
function validationErrors($errors, $message = null)
{
    $data = [
        'status' => 'validations',
        'message' => (empty($message)) ? __('response.invalid_data') : $message,
        'errors' => $errors,
    ];

    return response()->json($data, 422);
}
