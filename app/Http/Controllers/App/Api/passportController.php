<?php
/**
 * Created by PhpStorm.
 * User: 13458
 * Date: 2018/11/29
 * Time: 23:27
 */

namespace App\Http\Controllers\App\Api;


use App\AppUser;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\UnauthorizedException;


class passportController
{
    public $successStatus = 200;

    public function authenticate()
    {
        $client = new Client();
        try {
        $url = request()->root() . '/oauth/token';
        $params = array_merge(config('passport.proxy'), [
            'username' => request('user_name'),
            'password' => request('user_pwd'),
        ]);
        $respond = $client->request('POST', $url,  ['form_params' => $params]);

        } catch (RequestException $exception) {
            throw  new UnauthorizedException('请求失败，服务器错误');
        }
        if ($respond->getStatusCode() !== 401) {
            return json_decode($respond->getBody()->getContents(), true);
        }
        throw new UnauthorizedException('账号或密码错误');
    }


    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        dd($this->authenticate());

        if(Auth::guard('app')->attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::guard('app')->user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'user_pwd' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['user_pwd'] = bcrypt($input['user_pwd']);
        $user = AppUser::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
