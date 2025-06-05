<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifications = Notifikasi::where('user_id', auth::user()->id)
            ->latest()
            ->paginate(10);

        $unreadCount = Notifikasi::where('user_id', auth::user()->id)
            ->where('isreaded', false)
            ->count();

        return view('notifikasi.notifikasi', compact('notifications','unreadCount'));
    }

    public function markAsRead($id)
    {
        $notification = Notifikasi::where('user_id', auth::user()->id)
            ->findOrFail($id);

        $notification->update(['isreaded' => true]);

        return back()->with('success', 'Notifikasi ditandai sudah dibaca');
    }

    public function markAllAsRead()
    {
        Notifikasi::where('user_id', auth::user()->id)
            ->where('isreaded', false)
            ->update(['isreaded' => true]);

        return back()->with('success', 'Semua notifikasi ditandai sudah dibaca');
    }

    public function show($id)
    {
        $notification = Notifikasi::where('user_id', auth::user()->id)
            ->findOrFail($id);

        // Tandai sebagai sudah dibaca ketika dilihat
        if (!$notification->isreaded) {
            $notification->update(['isreaded' => true]);
        }

        return view('notifikasi.show', compact('notification'));
    }

    public function destroy($id)
    {
        $notification = Notifikasi::where('user_id', auth::user()->id)
            ->findOrFail($id);

        $notification->delete();

        return redirect()->route('notifications.index')
            ->with('success', 'Notifikasi berhasil dihapus');
    }
}
