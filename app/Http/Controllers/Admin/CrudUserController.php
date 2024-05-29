<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class CrudUserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate();
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'roles_id' => 'required|exists:roles,id',
        ]);

        if (isset($request->id)) {
            $user = User::findOrNew($request->id);
        } else {
            $user = new User();
        }

        $user->fill($validated);
        $user->password = bcrypt($user->password);
        if ($user->save()) {
            flash()->addSuccess('Usuario creado');
        }

        return redirect()->back();
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * @throws \Throwable
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
//            'referred_user_id' => 'nullable|exists:users,id',
//            'referred_url' => 'nullable|string|max:255',
            'password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()],
        ]);

        DB::beginTransaction();

        try {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->roles_id = $request->role_id;
//        $user->referred_user_id = $request->referred_user_id;
//        $user->referred_url = $request->referred_url;

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            DB::commit();

            flash()->addSuccess(__('Guardado'), __('Usuario'));
            return redirect()->back();

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    public function create()
    {

    }
}
