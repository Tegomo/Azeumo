<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Post, ContactMessage};

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postCount' => Post::count(),
            'unreadCount' => ContactMessage::where('read', false)->count(),
            'messageCount' => ContactMessage::count(),
        ]);
    }
}
