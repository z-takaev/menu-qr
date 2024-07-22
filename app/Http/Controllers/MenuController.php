<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function show(Menu $menu)
    {
        abort_unless($menu->active, 404);

        return view('menu.show', compact('menu'));
    }
}
