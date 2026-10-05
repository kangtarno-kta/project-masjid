<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $totalUser = User::count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalPengurus = User::where('role', 'pengurus')->count();

        return view('admin.pengguna.index', compact(
            'users',
            'totalUser',
            'totalAdmin',
            'totalPengurus'
        ));
    }

    public function updateRole(Request $request, User $user)
    {
        // $request->validate([
        //     'role' => ['required', Rule::in(['admin', 'pengurus'])],
        // ]);

        $request->validate([
            'role' => ['required', Rule::in([
                'admin',
                'pengurus',
                'pengguna',
            ])],
        ]);

        // Jangan izinkan admin mengubah role akunnya sendiri.
        if ($user->id === $request->user()->id) {
            return back()->with(
                'error',
                'Role akun yang sedang Anda gunakan tidak dapat diubah dari halaman ini.'
            );
        }

        // Jangan sampai sistem kehilangan admin terakhir.
        if (
            $user->role === 'admin'
            && $request->input('role') === 'pengurus'
            && User::where('role', 'admin')->count() <= 1
        ) {
            return back()->with(
                'error',
                'Role admin terakhir tidak dapat diturunkan.'
            );
        }

        $user->role = $request->input('role');
        $user->save();

        return back()->with(
            'success',
            'Role ' . $user->name . ' berhasil diubah menjadi '
                . $user->role . '.'
        );
    }
}
