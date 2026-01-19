<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        		# fetch The User Id
		$userId = $request->header('id');


		# get Request Token
		$authorizationToken = $request->header('authorizationToken');

		if($userId == ''){
			return response()->json([
									  'message' => 'Header User id is required.',
									  'code' => '401',
									]);
		}

		if($authorizationToken == ''){
			return response()->json([
									  'message' => 'Token is required.',
									  'code' => '401',
									]);
		}

		# get the user Token
		$apiToken = User::where('id', $userId)->pluck('api_token')->first();

		# Chek Api Token for vallidation
		if($apiToken == $authorizationToken)
		{
		  return $next($request);
		}

		return response()->json([
								  'message' => 'Unauthenticated User.',
								  'code' => '402',
								]);
        return $next($request);
    }
}
