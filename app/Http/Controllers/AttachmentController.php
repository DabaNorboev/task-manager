<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
//    public function create(AttachmentRequest $request)
//    {
//        $file = $request->file('file');
//        $path = Storage::disk('local')->put('attachments', $file);
//    }
//
//    public function update(AttachmentRequest $request)
//    {
//        $file = $request->file('attachment');
//
//        $path = Storage::disk('local')->put('attachments', $file);
//
//        $attachment = Attachment::create([
//            'file_path' => $path,
//            ''
//        ]);
//
//        return redirect()->back();
//    }
}
