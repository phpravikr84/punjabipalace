<?php

namespace App\Http\Controllers\Api\admin;

use App\Helpers\Helpers as Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Emailtemplate;
use Carbon\Carbon;
use DB;
use File;
use Hash;
use OpenApi\Annotations as OA;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Response;
use Validator;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public function __construct()
    {
    }

    /**
     * @OA\Info(
     *     title="Punjabi Palace API",
     *     version="1.0.0",
     *     description="This is the API documentation for the Restaurant management application.",
     *     @OA\Contact(
     *         email="ravikumar@adzguruexports.com"
     *     )
     * ),
     * @OA\Post(
     *     path="/api/admin/auth/login",
     *     operationId="loginUser",
     *     tags={"Auth"},
     *     summary="User login",
     *     description="Authenticate a user and return an access token",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", format="email", example="admin.wli@yopmail.com"),
     *             @OA\Property(property="password", type="string", format="password", example="Abcd@1234")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User authenticated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="data", type="object"),
     *             @OA\Property(property="code", type="integer"),
     *             @OA\Property(property="access_token", type="string", description="Access Token", example="bearer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function login(Request $request)
    {

        /* If User is  parent  Checking validation */
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        /* If validation is working fine with provided information */
        if ($validator->fails()) {
            /* Validation error message */
            $http_code = 400;
            $error_message = $validator->messages()->first();
            $this->msg['status'] = trans('messages.error');
            $this->msg['code'] = $http_code;
            $this->msg['message'] = $error_message;

            return response()->json($this->msg, $http_code);
        }

        $credentials = $request->only('email', 'password');

        try {

            /* attempt to verify the credentials and create a token for the user */
            if (!Auth::attempt($credentials)) {
                $http_code = 401;
                $this->msg['status'] = trans('messages.error');
                $this->msg['message'] = trans('messages.user_invalid_email_password');
                $this->msg['code'] = 401;

                return response()->json($this->msg, $http_code);
            }

            /* User logged in successfully, now send user details ** */
            $user = User::select(
                'id',
                'name',
                'contact_number',
                'email',
                'status',
                'created_at'
            )->where('id', Auth::user()->id)->first();
            
            $role = Role::leftJoin('users', 'users.role_id', '=', 'roles.id')
                ->where('users.id', $user->id)->select('roles.id', 'roles.name')->first();
            $token = $user->createToken(base64_encode('Boilerplate'))->accessToken;

            if ($user['status'] == 1) {

                /* Created userdata array for passing into response */
                $user['role'] = $role;
                $user['access_token'] = $token;

                $http_code = 200;
                $this->msg['status'] = trans('messages.success');
                $this->msg['message'] = trans('messages.user_login');
                $this->msg['data'] = $user;
                $this->msg['code'] = $http_code;
            } else {
                $http_code = 400;
                $this->msg['status'] = trans('messages.error');
                $this->msg['message'] = trans('messages.user_inactive');
                $this->msg['code'] = $http_code;
            }
        } catch (Exception $e) {
            /* something went wrong while checking login info */
            $http_code = 500;
            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = $e->getMessage();
            $this->msg['code'] = $http_code;
        }

        /* IF all good so return the token */
        return response()->json($this->msg, $http_code);
    }

        /**
     * Function to change password of register user.
     * Method: POST
     * Request URL:
     * Admin user will change password in a system using this api
     * Request Data: user data in json format
     * */
    /**
     * @OA\Post(
     *     path="/api/admin/auth/change-password",
     *     operationId="changePassword",
     *     tags={"Auth"},
     *     summary="User Change Password",
     *     description="Change password for the current logged in user",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"current_password","new_password","confirm_password"},
     *             @OA\Property(property="current_password", type="string", format="text", example="current-password"),
     *             @OA\Property(property="new_password", type="string", format="text", example="new-password"),
     *             @OA\Property(property="confirm_password", type="string", format="text", example="confirm-password"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Password changed successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="code", type="integer"),
     *         ),
     *          @OA\Property(
     *            property="access_token",
     *            type="string",
     *            description="Access Token",
     *            example="Bearer {access token}",
     *          ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *     )
     * )
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changepassword(Request $request)
    {

        /* Checking validation */
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);
        /* If validation working proper */
        if ($validator->fails()) {
            //If Validation Fails than return message
            $error_message = $validator->messages()->first();
            $http_code = 400;
            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = $error_message;
            $this->msg['code'] = $http_code;

            return response()->json($this->msg, $http_code);
        }

        // Additional validation for current password
        $currentPassword = $request->input('current_password');
        $user = Auth::user();

        if (!Hash::check($currentPassword, $user->password)) {
            // Current password does not match
            $http_code = 400;
            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = trans('messages.password_not_match');
            $this->msg['code'] = $http_code;

            return response()->json($this->msg, $http_code);
        }


        try {
            // Get the user details
            $user = User::find(Auth::user()->id);

            // Check if the provided current password is correct
            if (!Hash::check($request->input('current_password'), $user->password)) {
                $http_code = 400;
                $this->msg['status'] = trans('messages.error');
                $this->msg['message'] = trans('messages.user_invalid_password');
                $this->msg['code'] = $http_code;

                return response()->json($this->msg, $http_code);
            }

            /* Update user's password */
            $new_password = $request->input('new_password');
            $user->password = bcrypt($new_password);
            $user->update_password_date = Carbon::now();

            // Start a database transaction
            DB::beginTransaction();

            if ($user->save() == '1') {
                // Commit the database transaction
                DB::commit();

                $http_code = 200;
                $this->msg['status'] = trans('messages.success');
                $this->msg['message'] = trans('messages.user_password_reset_success');
                $this->msg['code'] = $http_code;
            } else {
                // Rollback the database transaction in case of an error
                DB::rollBack();

                $http_code = 400;
                $this->msg['status'] = trans('messages.error');
                $this->msg['message'] = trans('messages.user_password_reset_fail');
                $this->msg['code'] = $http_code;
            }
        } catch (Exception $e) {
            /* Something went wrong while updating new password */
            $http_code = 500;
            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = $e->getMessage();
            $this->msg['code'] = $http_code;
        }

        return response()->json($this->msg, $http_code);
    }
/**
 * @OA\Post(
 *     path="/api/admin/auth/forgot-password",
 *     operationId="forgotPassword",
 *     tags={"Auth"},
 *     summary="User Forgot Password",
 *     description="Send mail for the forgot password link to change password for current user email",
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email"},
 *             @OA\Property(property="email", type="string", format="email", example="user@test.com"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Email sent successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string"),
 *             @OA\Property(property="message", type="string"),
 *             @OA\Property(property="code", type="integer"),
 *         ),
 *          @OA\Property(
 *            property="access_token",
 *            type="string",
 *            description="Access Token",
 *            example="bearer",
 *          ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized - Invalid Token",
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error",
 *     )
 * )
 */
public function forgotPassword(Request $request)
{
    // Check for valid token if you want token validation for this endpoint
    if (Auth::check()) {
        // If authenticated, proceed with the forgot password logic
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
        ], [
            'email.exists' => trans('messages.user_does_not_exists')
        ]);

        // If validation fails
        if ($validator->fails()) {
            $error_message = $validator->messages()->first();
            $http_code = 422;

            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = $error_message;
            $this->msg['code'] = $http_code;

            return response()->json($this->msg, $http_code);
        }

        $email = $request->input('email');

        // Proceed if user exists
        $user = DB::table('users')->select('first_name', 'last_name')->where('email', $email)->first();

        if (!empty($user)) {
            // Generate new password and create reset token
            $randomPassword = $this->generateRandomString();
            $password = bcrypt($randomPassword);
            $affectedRows = User::where('email', $email)->update(array('password' => $password));
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            // Send reset password email
            if ($affectedRows) {
                $fTemplate = Emailtemplate::select('content')->where('template_title', "=", "Forgot Password")->first();
                $forwardedUrl = url('password/reset', $token);
                $staticData = ["u_sendOn", "u_logo", "u_name", "u_password", "current_year"];
                $repalceData = [date('d M, Y'), url('/assets/images/logo_img.png'), $user->first_name . " " . $user->last_name, $forwardedUrl, date('Y')];

                $email_body = str_replace($staticData, $repalceData, $fTemplate->content);
                $mailData = [
                    'title' => 'Forgot Password',
                    'subject' => 'Forgot Password',
                    'body' => $email_body,
                ];

                if (Mail::to($email)->send(new CustomMail($mailData))) {
                    $http_code = 200;
                    $this->msg['status'] = trans('messages.success');
                    $this->msg['message'] = trans('messages.mail_sent_success');
                    $this->msg['data'] = array("token" => $token);
                    $this->msg['code'] = $http_code;
                } else {
                    $http_code = 400;
                    $this->msg['status'] = trans('messages.error');
                    $this->msg['message'] = trans('messages.mail_sent_fail');
                    $this->msg['code'] = $http_code;
                }

                return response()->json($this->msg, $http_code);
            } else {
                $http_code = 400;
                $this->msg['status'] = trans('messages.error');
                $this->msg['message'] = trans('messages.something_went_wrong');
                $this->msg['code'] = $http_code;
            }

        } else {
            $http_code = 404;
            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = 'User is not found';
            $this->msg['code'] = $http_code;
        }

    } else {
        $http_code = 401;
        $this->msg['status'] = trans('messages.error');
        $this->msg['message'] = 'Unauthorized - Invalid Token';
        $this->msg['code'] = $http_code;

        return response()->json($this->msg, $http_code);
    }

    return response()->json($this->msg, $http_code);
}


    /*
     * Method for reset password
     */
    /**
     * @OA\Post(
     *     path="/api/admin/auth/reset-password/{token}",
     *     operationId="resetPassword",
     *     tags={"Auth"},
     *     summary="Reset User Password",
     *     description="Reset the user's password using a valid token.",
     *     @OA\Parameter(
     *         name="token",
     *         in="path",
     *         description="Password reset token received via email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"password", "password_confirmation"},
     *             @OA\Property(property="password", type="string", format="password", example="new_password"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="new_password"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Password reset successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="code", type="integer"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid token or user not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="code", type="integer"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *     )
     * )
     *
     * Method for resetting the user's password using a valid token.
     *
     * @param Request $request
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */

    public function resetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $tokenValidation = DB::table('password_resets')
            ->where('token', $token)
            ->first();

        if (!$tokenValidation) {
            $http_code = 404;
            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = 'Invalid token';
            $this->msg['code'] = $http_code;
            return response()->json($this->msg, $http_code);
        }

        $user = User::where('email', $tokenValidation->email)->first();

        if (!$user) {
            $http_code = 404;
            $this->msg['status'] = trans('messages.error');
            $this->msg['message'] = 'User is not found';
            $this->msg['code'] = $http_code;
            return response()->json($this->msg, $http_code);
        }

        $user->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $tokenValidation->email)->delete();

        $http_code = 200;
        $this->msg['status'] = trans('messages.success');
        $this->msg['message'] = 'Password reset successfully';
        $this->msg['code'] = $http_code;
        return response()->json($this->msg, $http_code);
    }

    //Function to generated random string password
    public function generateRandomString($length = 8)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
}