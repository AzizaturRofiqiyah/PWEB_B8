<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
        public function index()
    {
        $notifications = Notifikasi::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        $unreadCount = Notifikasi::where('user_id', auth()->id())
            ->where('isreaded', false)
            ->count();

        return view('notifikasi.notifikasi', [
            'notifications' => $notifications,
            'unreadCount' => $unreadCount
        ]);
    }

    public function markAsRead($id)
    {
        $notification = Notifikasi::where('user_id', auth()->id())
            ->findOrFail($id);

        $notification->update(['isreaded' => true]);

        return back()->with('success', 'Notifikasi ditandai sudah dibaca');
    }

    public function markAllAsRead()
    {
        Notifikasi::where('user_id', auth()->id())
            ->where('isreaded', false)
            ->update(['isreaded' => true]);

        return back()->with('success', 'Semua notifikasi ditandai sudah dibaca');
    }
}
