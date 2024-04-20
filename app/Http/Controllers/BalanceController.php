<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BalanceController extends Controller
{
    public function index()
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        $users = User::all();
        return view('balance.index', ['users' => $users]);
    }

    public function edit(User $user)
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        return view('balance.edit', ['user' => $user]);
    }
    
    public function update(Request $request, User $user)
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        $validated = $request->validate([
            'balance' => 'required|numeric|min:0',
        ]);
    
        $user->balance = $validated['balance'];
        $user->save();
    
        return redirect()->route('balance.index')->with('success', 'Balance updated successfully!');
    }


}
