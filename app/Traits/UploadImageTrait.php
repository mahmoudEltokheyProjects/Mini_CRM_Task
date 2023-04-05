<?php
namespace App\Traits ;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadImageTrait
{
    public function uploadImage(Request $request , $folderName)
    {
        // store "uploaded image" in $file
        $file = $request->file('pic');
        // image name = 'uuid'.'original image name'
        $originalName = Str::uuid().$file->getClientOriginalName();
        $path = $file->storeAs($folderName,$originalName,'public');
        return $path;
    }
}
