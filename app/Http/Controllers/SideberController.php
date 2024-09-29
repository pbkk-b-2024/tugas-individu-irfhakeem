<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SideberController extends Controller
{
    public function showSidebar()
    {
        $links = [
            [
                'title' => 'Dashboard',
                'url' => route('dashboard'),
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" width="auto" viewBox="0 0 448 512"><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm64 192c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 192c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192zM320 288c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32z"/></svg>'
            ],
            [
                'title' => 'CRUD Pasien',
                'url' => route('dashboard'),
                'icon' => '<i class="fas fa-user-injured"></i>'
            ]
        ];

        return view('sidebar', compact('links'));
    }
}
