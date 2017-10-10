?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManuallyAuthorizeLaravelUser extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticateLocalUser(Request $req)
    {
	$email = $req->username;
	$password = $req->passwprd;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
	    return response()->json([
		'authorized' => true,
		'message' => 'successfully authorized user:'.$email
	    ]);
	}
    }
}

