<?php

namespace App\Http\Controllers\Api\admin;

use App\Helpers\Helpers as Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Uom;
use App\Models\DietaryAttributeMaster;
use App\Models\CurrencyMaster;
use App\Models\Emailtemplate;
use App\Models\StockItemCategory;
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

class MasterController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Function to Master
     * Method: Get
     * Request URL: /api/uoms
     * Admin user will get list of unit of materials & its menus from system using this api
     * Request Data: unit of lists data in json format
     * */
     /**
     * @OA\Get(
     *     path="/api/uoms",
     *     summary="Get all uoms",
     *     tags={"Master"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved uoms",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="uom_name", type="string"),
     *                 @OA\Property(property="uom_desc", type="string"),
     *                 @OA\Property(property="created_at", type="string"),
     *                 @OA\Property(property="updated_at", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function getUoms()
    {
        try {
            $uoms = Uom::all();
            $http_code = 200;
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $uoms;
            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            $this->message['data'] = $uoms;
            return response()->json($this->message, $http_code);
        }
    }

    /**
     * Function to Create UOM
     * Method: POST
     * Request URL: /api/uoms
     * Admin user will create a new unit of material using this API
     * Request Data: JSON containing uom_name and uom_desc
     */
    /**
     * @OA\Post(
     *     path="/api/uoms",
     *     summary="Create a new UOM",
     *     tags={"Master"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="uom_name", type="string"),
     *             @OA\Property(property="uom_desc", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully created UOM",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="uom_name", type="string"),
     *                 @OA\Property(property="uom_desc", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function createUom(Request $request)
    {
        $validated = $request->validate([
            'uom_name' => 'required|string|max:255',
            'uom_desc' => 'nullable|string|max:255',
        ]);

        try {
            $uom = Uom::create($validated);
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $uom;
            return response()->json($this->message, 201);
        } catch (\Exception $e) {
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, 500);
        }
    }

    /**
     * Function to Update UOM
     * Method: PUT
     * Request URL: /api/uoms/{id}
     * Admin user will update an existing unit of material using this API
     * Request Data: JSON containing uom_name and uom_desc
     */
    /**
     * @OA\Put(
     *     path="/api/uoms/{id}",
     *     summary="Update an existing UOM",
     *     tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="uom_name", type="string"),
     *             @OA\Property(property="uom_desc", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated UOM",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="uom_name", type="string"),
     *                 @OA\Property(property="uom_desc", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateUom(Request $request, $id)
    {
        $validated = $request->validate([
            'uom_name' => 'required|string|max:255',
            'uom_desc' => 'nullable|string|max:255',
        ]);

        try {
            $uom = Uom::findOrFail($id);
            $uom->update($validated);
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $uom;
            return response()->json($this->message, 200);
        } catch (\Exception $e) {
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, 500);
        }
    }

    /**
     * Function to Delete UOM
     * Method: DELETE
     * Request URL: /api/uoms/{id}
     * Admin user will delete an existing unit of material using this API
     */
    /**
     * @OA\Delete(
     *     path="/api/uoms/{id}",
     *     summary="Delete a UOM",
     *     tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted UOM",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="message", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteUom($id)
    {
        try {
            $uom = Uom::findOrFail($id);
            $uom->delete();
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = [
                'id' => $id,
                'message' => 'UOM deleted successfully'
            ];
            return response()->json($this->message, 200);
        } catch (\Exception $e) {
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, 500);
        }
    }


    
    /**
     * @OA\Get(
     *     path="/api/dietary-attributes",
     *     summary="List all dietary attributes",
     *      tags={"Master"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved dietary attributes",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="object"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function listDietaryAttributes()
    {
        try {
            $dietaryAttributes = DietaryAttributeMaster::all();

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary attributes retrieved successfully';
            $this->message['data'] = $dietaryAttributes;

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/dietary-attributes",
     *     summary="Add a new dietary attribute",
     *      tags={"Master"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"name"},
     *                 @OA\Property(property="name", type="string", example="Vegetarian"),
     *                 @OA\Property(property="short_name", type="string", example="Veg"),
     *                 @OA\Property(property="description", type="string", example="This attribute signifies a vegetarian dish.")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully added dietary attribute",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request. Invalid data or parameters."
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function addDietaryAttribute(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $dietaryAttribute = DietaryAttributeMaster::create($validated);

            $http_code = 201;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary attribute added successfully';
            $this->message['data'] = $dietaryAttribute;

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/dietary-attributes/{id}",
     *     summary="Update a dietary attribute",
     *      tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(property="name", type="string", example="Vegetarian"),
     *                 @OA\Property(property="short_name", type="string", example="Veg"),
     *                 @OA\Property(property="description", type="string", example="This attribute signifies a vegetarian dish.")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated dietary attribute",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Dietary attribute not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateDietaryAttribute(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'short_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $dietaryAttribute = DietaryAttributeMaster::find($id);

        if (!$dietaryAttribute) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Dietary attribute not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $dietaryAttribute->update($validated);

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary attribute updated successfully';
            $this->message['data'] = $dietaryAttribute;

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/dietary-attributes/{id}",
     *     summary="Delete a dietary attribute",
     *      tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted dietary attribute",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Dietary attribute not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteDietaryAttribute($id)
    {
        $dietaryAttribute = DietaryAttributeMaster::find($id);

        if (!$dietaryAttribute) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Dietary attribute not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $dietaryAttribute->delete();

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary attribute deleted successfully';

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }

    

    /**
     * @OA\Get(
     *     path="/api/currencies",
     *     summary="List all currencies",
     *      tags={"Master"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved currency",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="object"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function listCurrencies()
    {
        try {
            $currencies = CurrencyMaster::all();

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary attributes retrieved successfully';
            $this->message['data'] = $currencies;

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/currencies",
     *     summary="Add a new currency",
     *      tags={"Master"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"currency_code"},
     *                 @OA\Property(property="currency_code", type="string", example="$"),
     *                 @OA\Property(property="currency_name", type="string", example="Usd"),
     *                 @OA\Property(property="description", type="string", example="USA")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully added currency",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request. Invalid data or parameters."
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function addCurrency(Request $request)
    {
        $validated = $request->validate([
            'currency_code' => 'required|string',
            'currency_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $currency = CurencyMaster::create($validated);

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Currency added successfully';
            $this->message['data'] = $currency;

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/currencies/{id}",
     *     summary="Update a currency",
     *      tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                  @OA\Property(property="currency_code", type="string", example="$"),
     *                 @OA\Property(property="currency_name", type="string", example="Usd"),
     *                 @OA\Property(property="description", type="string", example="USA")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated currency",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="currency not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateCurrency(Request $request, $id)
    {
        $validated = $request->validate([
            'currency_code' => 'required|string',
            'currency_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $currency = CurrencyMaster::find($id);

        if (!$currency) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Dietary attribute not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $currency->update($validated);

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary attribute updated successfully';
            $this->message['data'] = $currency;

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/currencies/{id}",
     *     summary="Delete a currency attribute",
     *      tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted currency",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Currency not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteCurrency($id)
    {
        $dietaryAttribute = CurencyMaster::find($id);

        if (!$dietaryAttribute) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Currency not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $dietaryAttribute->delete();

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Currency deleted successfully';

            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';

            return response()->json($this->message, $http_code);
        }
    }

    /**
     * Function to Get Stock Item Categories
     * Method: GET
     * Request URL: /api/stock-item-categories
     * Admin user will get the list of stock item categories using this API
     */
    /**
     * @OA\Get(
     *     path="/api/stock-item-categories",
     *     summary="Get all stock item categories",
     *     tags={"Master"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved stock item categories",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="item_category_name", type="string"),
     *                 @OA\Property(property="item_category_desc", type="string"),
     *                 @OA\Property(property="created_at", type="string"),
     *                 @OA\Property(property="updated_at", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function getStockItemCategories()
    {
        try {
            $categories = StockItemCategory::all();
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $categories;
            return response()->json($this->message, 200);
        } catch (\Exception $e) {
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, 500);
        }
    }

    /**
     * Function to Create Stock Item Category
     * Method: POST
     * Request URL: /api/stock-item-categories
     * Admin user will create a new stock item category using this API
     */
    /**
     * @OA\Post(
     *     path="/api/stock-item-categories",
     *     summary="Create a new stock item category",
     *     tags={"Master"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="item_category_name", type="string"),
     *             @OA\Property(property="item_category_desc", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully created stock item category",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="item_category_name", type="string"),
     *                 @OA\Property(property="item_category_desc", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function createStockItemCategory(Request $request)
    {
        $validated = $request->validate([
            'item_category_name' => 'required|string|max:255',
            'item_category_desc' => 'nullable|string|max:255',
        ]);

        try {
            $category = StockItemCategory::create($validated);
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $category;
            return response()->json($this->message, 201);
        } catch (\Exception $e) {
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, 500);
        }
    }

    /**
     * Function to Update Stock Item Category
     * Method: PUT
     * Request URL: /api/stock-item-categories/{id}
     * Admin user will update an existing stock item category using this API
     */
    /**
     * @OA\Put(
     *     path="/api/stock-item-categories/{id}",
     *     summary="Update a stock item category",
     *     tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="item_category_name", type="string"),
     *             @OA\Property(property="item_category_desc", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated stock item category",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="item_category_name", type="string"),
     *                 @OA\Property(property="item_category_desc", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateStockItemCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'item_category_name' => 'required|string|max:255',
            'item_category_desc' => 'nullable|string|max:255',
        ]);

        try {
            $category = StockItemCategory::findOrFail($id);
            $category->update($validated);
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $category;
            return response()->json($this->message, 200);
        } catch (\Exception $e) {
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, 500);
        }
    }

    /**
     * Function to Delete Stock Item Category
     * Method: DELETE
     * Request URL: /api/stock-item-categories/{id}
     * Admin user will delete an existing stock item category using this API
     */
    /**
     * @OA\Delete(
     *     path="/api/stock-item-categories/{id}",
     *     summary="Delete a stock item category",
      *     tags={"Master"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted stock item category",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="message", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteStockItemCategory($id)
    {
        try {
            $category = StockItemCategory::findOrFail($id);
            $category->delete();
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = [
                'id' => $id,
                'message' => 'Stock item category deleted successfully'
            ];
            return response()->json($this->message, 200);
        } catch (\Exception $e) {
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, 500);
        }
    }

    

}