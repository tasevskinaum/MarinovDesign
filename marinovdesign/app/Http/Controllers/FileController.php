<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        return response()->json(['message' => 'File uploaded successfully', 'filePath' => $filePath]);
    }
}