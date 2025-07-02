<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;


class PageController extends Controller
{
    public function show($slug)
{
    // Khusus untuk halaman statis
    if (in_array($slug, ['tentang', 'panduan'])) {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', compact('page'));
    }

    // Slug lain tetap pakai view dinamis atau 404
    $page = Page::where('slug', $slug)->first();
    if (!$page) {
        abort(404);
    }

    return view('page', compact('page'));
}

}
