<?php

namespace App\Http\Controllers\Amin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:32',
            'confirm' => 'same:password',
            'is_admin' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), //Hash::make($request->password)
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'is_admin' => 'required',
        ]);

        $user = User::find($id);

        $data = [
            'name' => $request->name,
            'is_admin' => $request->is_admin
        ];

        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|min:6|max:32',
                'confirm' => 'same:password',
            ]);
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.user.edit', $user->id)->with('success', 'Updated successfully');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.user.index')->with('success', 'Deleted successfully');
    }
}
