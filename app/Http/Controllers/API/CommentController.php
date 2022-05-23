<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function all(Request $request) {
        try {
            return Comment::all();
        } catch (Exception $error) {
            return ResponseFormatter::success([
                'message' => 'Ada yang salah',
                'error' => $error,
            ]);
        }
    }
}
