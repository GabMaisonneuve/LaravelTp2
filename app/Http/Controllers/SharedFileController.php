<?php

namespace App\Http\Controllers;

use App\Models\SharedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SharedFileController extends Controller
{
    public function index()
    {
        $files = SharedFile::with('user')->latest()->paginate(10);
        return view('files.index', compact('files'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'file' => 'required|mimes:pdf,zip,doc,docx|max:10240', // 10 MB
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        SharedFile::create([
            'user_id' => Auth::id(),
            'title' => [app()->getLocale() => $request->title],
            'file_path' => $path,
        ]);

        return redirect()->route('files.index')->with('success', __('messages.file_uploaded'));
    }

    public function edit(SharedFile $file)
    {

        return view('files.edit', compact('file'));
    }

    public function update(Request $request, SharedFile $file)
    {

        $request->validate([
            'title' => 'required|max:100',
            'file' => 'nullable|mimes:pdf,zip,doc,docx|max:10240',
        ]);

        $data = ['title' => [app()->getLocale() => $request->title]];

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($file->file_path);
            $data['file_path'] = $request->file('file')->store('uploads', 'public');
        }

        $file->update($data);

        return redirect()->route('files.index')->with('success', __('messages.file_updated'));
    }

    public function destroy(SharedFile $file)
    {
        Storage::disk('public')->delete($file->file_path);
        $file->delete();

        return redirect()->route('files.index')->with('success', __('messages.file_deleted'));
    }
}
