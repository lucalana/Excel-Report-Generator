<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __invoke(Request $request)
    {
        $path = $request->file('avatar')->store('avatar');
        return redirect()->back()->with('mensagem', 'Salvo legal: '.$path);
    }
}
