<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Tampilkan daftar pengguna via DataTables.
     */
    public function index(UserDataTable $dataTables)
    {
        return $dataTables->render('pages.user.index');
    }

    /**
     * Tampilkan form tambah pengguna.
     */
    public function create(): View
    {
        return view('pages.user.create');
    }

    /**
     * Simpan pengguna baru ke database.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'roles'    => $request->roles,
        ]);

        alert()->success('Berhasil!', 'Pengguna berhasil ditambahkan.');

        return redirect()->route('user.index');
    }

    /**
     * Tampilkan form edit pengguna.
     */
    public function edit(User $user): View
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update data pengguna.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
        ];

        // Hanya update password jika field diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        alert()->success('Berhasil!', 'Data pengguna berhasil diperbarui.');

        return redirect()->route('user.index');
    }

    /**
     * Hapus pengguna.
     */
    public function destroy(User $user): RedirectResponse
    {
        // Cegah hapus akun sendiri
        if ($user->id === Auth::id()) {
            alert()->error('Gagal!', 'Anda tidak bisa menghapus akun Anda sendiri.');
            return redirect()->route('user.index');
        }

        $user->delete();

        alert()->success('Berhasil!', 'Pengguna berhasil dihapus.');

        return redirect()->route('user.index');
    }

    /**
     * Tampilkan form update password.
     */
    public function updatePasswordForm(User $user): View
    {
        return view('pages.user.update-password', compact('user'));
    }

    /**
     * Proses update password pengguna.
     */
    public function updatePassword(UserRequest $request, User $user): RedirectResponse
    {
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        alert()->success('Berhasil!', 'Password pengguna berhasil diperbarui.');

        return redirect()->route('user.index');
    }
}
