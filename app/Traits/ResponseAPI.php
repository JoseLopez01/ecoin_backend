<?php

namespace App\Traits;

trait ResponseAPI {

    public function response($message, $data = null, $status, $success = true) {
        if (!$message) return response()->json(['message' => 'Message is required'], 500);

        if ($success) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'status' => $status,
                'data' => $data
            ], $status);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'status' => $status
            ], $status);
        }
    }

    public function success($message, $data, $status = 200) {
        return $this->response($message, $data, $status);
    }

    public function error($message, $status) {
        return $this->response($message, null, $status, false);
    }

}
