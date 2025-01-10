<?php
namespace App\Http\Controllers\Api\admin;

use App\Helpers\Helpers as Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\DietaryAttributeMaster;
use App\Models\CurrencyMaster;
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

class InventoryController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Function to complete inventory
     * Method: Get
     * Request URL: /api/stocks
     * Admin user will get list of stock, vendor, vendor payment etc
     * Request Data: stocks data in json format
     * */
     /**
     * @OA\Get(
     *     path="/api/stocks",
     *     summary="Get all stocks",
     *     tags={"Inventory"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved stocks",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="quantity", type="integer"),
     *                 @OA\Property(property="unit", type="integer"),
     *                 @OA\Property(property="minimum_qty", type="string"),
    *                   @OA\Property(property="unit_price", type="integer"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function getStocks()
    {
        try {
            $stocks = Stock::all();
            $http_code = 200;
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $categories;
            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            $this->message['data'] = $categories;
            return response()->json($this->message, $http_code);
        }
    }
}
