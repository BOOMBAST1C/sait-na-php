<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()
{
    $texts = Text::with(['user', 'category'])->orderBy('created_at', 'desc')->get(); // Было paginate(10)
    $users = User::with('role')->get(); // Было paginate(10)
    $roles = Role::all();
    
    return view('pages.admin', compact('texts', 'users', 'roles'));
}
    public function destroy($id)
    {
        $text = Text::findOrFail($id);
        $text->delete();
        
        return redirect()->route('admin')->with('success', 'Статья удалена!');
    }

    public function assignRole(Request $request, $userId)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($userId);
        // Просто обновляем поле role_id
        $user->update(['role_id' => $validated['role_id']]);

        return redirect()->route('admin')->with('success', 'Роль изменена!');
    }
}