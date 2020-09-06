<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cause;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function profile() {

        $user = Auth::user();
        $causes = Cause::all();
        return view('user.profile')->with([
            'user' => $user,
            'causes' => $causes
        ]);
    }

    public function settings($id) {
        return view('user.settings');
    }
}
