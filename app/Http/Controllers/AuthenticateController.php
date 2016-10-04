<?Php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
//         $credentials = $request->only('email', 'password');
		$credentials = array();
		$credentials["email"]=$request->query("email");
		$credentials["password"]=$request->query("password");
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->jsonp($request->query("callback"),['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->jsonp($request->query("callback"),['error' => 'could_not_create_token'], 500);
        }
// 		return response()->json($request->query('callback'));
        // all good so return the token
        return response()->jsonp($request->query("callback"),compact("token"));
    }
}