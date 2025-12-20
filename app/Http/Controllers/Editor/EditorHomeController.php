<?php
namespace App\Http\Controllers\Editor;

use Illuminate\Http\RedirectResponse;

class EditorHomeController
{
    public function index(): RedirectResponse
    {
        return redirect()->route('editor.articles.index');
    }
}
