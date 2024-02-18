<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::select('id', 'name', 'email', 'role_id')
            ->where('id', '!=', Auth::id())
            ->where(function ($query) {
                $query->where('role_id', '1')
                    ->orWhere('role_id', '2');
            })
            ->get();

        return view('dashboard.admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required'],
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)->withInput();
            }

            $admin = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2
            ]);

            return redirect()
                ->route('admins.index')
                ->with(['success' => "Admin {$admin->name} created"]);
        } catch (\Exception $e) {
            return redirect()
                ->route('admins.index')
                ->with(['danger' => "An unexpected error occurred while creating admin. Please try again!"]);
        }
    }

    public function destroy(User $admin)
    {
        try {
            $admin->delete();

            return redirect()
                ->route('admins.index')
                ->with(['success' => "Account deleted."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('admins.index')
                ->with(['danger' => "An unexpected error occurred while deleteing account. Please try again!"]);
        }
    }
}
