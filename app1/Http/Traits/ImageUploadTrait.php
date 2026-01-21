<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{
    public function uploadImage($request, $imageName, $destinationPath)
    {
        if ($request->hasFile($imageName)) {
            $file = $request->file($imageName);
            $extension = $file->getClientOriginalExtension();
            $filename = microtime(true) * 10000 . '.' . $extension;
            $fullPath = public_path($destinationPath . $filename);

            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }

            $file->move(public_path($destinationPath), $filename);

            return $destinationPath . $filename;
        } else {
            return response()->json([
                'responseCode'    => $this->errorStatus,
                'responseMessage' => 'Image field is missing.'
            ]);
        }
    }
}
