<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\vagas_candidatura;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role =='user') {

            if (session()->has('vaga_id')) {
                $vaga = vagas_candidatura::create([
                    'vaga_id' => session('vaga_id'),
                    'user_id' => Auth::user()->id,
                    'status' => 'Pendente',
                ]);
                if ($vaga) {
                    return redirect()->route('frontend.home')->with('success', 'Candidatura enviada com sucesso!');
                }else
                {
                    return redirect()->route('frontend.home')->with('error', 'Erro ao enviar a candidatura!');
                }
            }
        }

        if (Auth::user()->role =='admin') {
            return redirect()->intended(route('admin.index', absolute: false));
        }elseif (Auth::user()->role =='cliente') {
            return redirect()->intended(route('client.index', absolute: false));
        }elseif (Auth::user()->role =='company') {
            return redirect()->intended(route('company.index', absolute: false));
        }
        return redirect()->intended(route('frontend.home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
