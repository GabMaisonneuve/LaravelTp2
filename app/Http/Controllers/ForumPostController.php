<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumPostController extends Controller
{
    public function index()
    {
        $posts = ForumPost::with('user')->latest()->paginate(10);
        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

 public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:100',
        'content' => 'required',
    ]);

    ForumPost::create([
        'user_id' => Auth::id(),
        'title' => [app()->getLocale() => $request->title],
        'content' => [app()->getLocale() => $request->content],
    ]);

    return redirect()->route('forum.index')->with('success', __('messages.post_published'));
}

    public function edit(ForumPost $forum)
    {

        return view('forum.edit', ['forumPost' => $forum]);
    }

    public function update(Request $request, ForumPost $forum)
    {

        $request->validate([
            'title_en' => 'required|max:100',
            'content_en' => 'required',
        ]);

        $forum->update([
            'title' => array_filter([
                'en' => $request->title_en,
                'fr' => $request->title_fr,
            ]),
            'content' => array_filter([
                'en' => $request->content_en,
                'fr' => $request->content_fr,
            ]),
        ]);

        return redirect()->route('forum.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(ForumPost $forum)
    {
        $forum->delete();

        return redirect()->route('forum.index')->with('success', 'Post deleted successfully!');
    }
}
