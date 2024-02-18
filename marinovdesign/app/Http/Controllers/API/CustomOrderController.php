<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CustomOrderStoreRequest;
use App\Models\CustomOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ImageKit\ImageKit;

class CustomOrderController extends Controller
{
    public function store(CustomOrderStoreRequest $request)
    {
        try {
            $img_url = NULL;

            if ($request->hasFile('image')) {
                $img_url = $this->uploadImage($request->image);
            }

            CustomOrder::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'image' => $img_url,
                'link' => $request->link
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Thanks for order.',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    private function uploadImage($image)
    {
        $imageKit = new ImageKit(
            'public_HqvXchqCR3L08wnPnLXHdgNDhk4=',
            'private_5xIEDMhXzw+5XKstdR4q/WOqiSQ=',
            'https://ik.imagekit.io/lztd93pns',
        );

        if ($image) {
            $fileType = mime_content_type($image->path());

            $fileData = [
                'file' => 'data:' . $fileType . ';base64,' . base64_encode(file_get_contents($image->path())),
                'fileName' => $image->getClientOriginalName(),
                'folder' => 'MarinovDesign',
            ];

            $uploadedFile = $imageKit->uploadFile($fileData);

            if ($uploadedFile->result->url)
                return $uploadedFile->result->url;
        }

        return null;
    }
}
