<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function selectRole()
    {
        return view('session.select');
    }

    public function setRole(Request $request)
    {
        $request->validate([
            'role' => 'required|in:guest,author,admin'
        ]);

        session(['user_role' => $request->role]);
        session(['user_name' => $this->getRoleName($request->role)]);

        return redirect()->route('home')->with('success', 'Role berhasil diubah menjadi ' . $this->getRoleName($request->role));
    }

    private function getRoleName($role)
    {
        $roles = [
            'guest' => 'Pengunjung',
            'author' => 'Penulis',
            'admin' => 'Administrator'
        ];

        return $roles[$role] ?? 'Tidak dikenal';
    }
}
