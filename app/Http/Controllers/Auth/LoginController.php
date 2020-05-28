<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 'ppcMan':
            case 'ppc':
                $this->redirectTo = '/ppc/dashboard';
                return $this->redirectTo;
                break;
            case 'logMan':
            case 'logSup':
            case 'logStaff':
                $this->redirectTo = '/logistik/dashboard';
                return $this->redirectTo;
                break;
            case 'gudStaff':
            case 'gudSup':
            case 'gudMan':
                $this->redirectTo = '/gudang/dashboard';
                return $this->redirectTo;
                break;
            case 'mutu':
                $this->redirectTo = '/mutu/dashboard';
                return $this->redirectTo;
                break;
            case 'admin':
                $this->redirectTo = '/dashboard';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
