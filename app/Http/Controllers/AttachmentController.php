<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Attachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function create(AttachmentRequest $request)
    {
        $file = $request->file('file');
        $path = Storage::disk('local')->put('attachments', $file);
        $name = $file->getClientOriginalName();

        Attachment::create ([
            'name' => $name,
            'attachment_path' => $path,
            'uploaded_by' => Auth::id(),
            'task_id' => $request->input('task_id'),
        ]);

        return redirect()->back();
    }

    public function delete(int $id)
    {
        $attachment = Attachment::find($id);
        $attachment->delete();

        Storage::disk('local')->delete($attachment->attachment_path);

        return redirect()->back();
    }

    public function download(int $id)
    {
        $attachment = Attachment::find($id);

        $pathToFile = storage_path('app/' . $attachment->attachment_path);

        return response()->download($pathToFile, $attachment->name);
    }
}
