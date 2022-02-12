<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class BookingBusyException extends Exception
{

    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'The given dates busy.',
            'errors' => [
                'dates' => 'The given dates busy.',
            ]
        ], 422);
    }
}
