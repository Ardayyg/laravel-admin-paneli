<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function login(Request $request)
    {
        $credentionals = $request->only('email', 'password');
        if(auth()->attempt($credentionals))
        {
            return redirect(route('admin.index'));
        }
        else{
            return redirect()->back()->withErrors([
                'login' => 'Giriş bilgileri hatalı'
            ]);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect(route('admin.login'));
    }
    public function register(Request $request)
    {
        $data = $request->only('name', 'surname', 'email', 'password', 'repassword');

        if($data['password'] != $data['repassword'])
        {
            $message = ['type' => 'danger', 'description' => 'Parolalar eşleşmedi'];
            return redirect()->back()->with(['message' => $message]);
        }
        $checkmail = DB::table('users')->where('email', '=', $data['email'])->count();
        if($checkmail >= 1){
            $emailcheck = ['type' => 'danger', 'description' => 'E posta eşleşmedi'];
            return redirect()->back()->with(['emailcheck' => $emailcheck]);
        }
        

        User::create([
            'name' => $data['name'], ' ', $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);

        $message = ['type' => 'success', 'description' => 'Başarılı bir şekilde kayıt oldunuz'];
        return redirect(route('admin.login'))->with(['message' => $message]);
    }
}
