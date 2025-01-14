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
use App\Models\Stock;
use App\Models\StockItem;
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
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="stock_item_id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="quantity", type="number", format="float"),
     *                 @OA\Property(property="uom_id", type="integer"),
     *                 @OA\Property(property="unit", type="string"),
     *                 @OA\Property(property="minimum_qty", type="number", format="float"),
     *                 @OA\Property(property="unit_price", type="number", format="float"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
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
            return response()->json([
                'status' => 'success',
                'data' => $stocks,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/stocks",
     *     summary="Create a new stock",
     *     tags={"Inventory"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"stock_item_id", "name", "quantity", "uom_id", "unit", "minimum_qty"},
     *             @OA\Property(property="stock_item_id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="quantity", type="number", format="float"),
     *             @OA\Property(property="uom_id", type="integer"),
     *             @OA\Property(property="unit", type="string"),
     *             @OA\Property(property="minimum_qty", type="number", format="float"),
     *             @OA\Property(property="unit_price", type="number", format="float", nullable=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Stock created successfully"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function createStock(Request $request)
    {
        $request->validate([
            'stock_item_id' => 'required|exists:stock_items,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'uom_id' => 'required|exists:uoms,id',
            'unit' => 'required|string|max:255',
            'minimum_qty' => 'required|numeric|min:0',
            'unit_price' => 'nullable|numeric|min:0',
        ]);

        try {
            $stock = Stock::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $stock,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/stocks/{id}",
     *     summary="Update a stock",
     *     tags={"Inventory"},
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
     *             @OA\Property(property="stock_item_id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="quantity", type="number", format="float"),
     *             @OA\Property(property="uom_id", type="integer"),
     *             @OA\Property(property="unit", type="string"),
     *             @OA\Property(property="minimum_qty", type="number", format="float"),
     *             @OA\Property(property="unit_price", type="number", format="float", nullable=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Stock updated successfully"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock_item_id' => 'sometimes|exists:stock_items,id',
            'name' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|numeric|min:0',
            'uom_id' => 'sometimes|exists:uoms,id',
            'unit' => 'sometimes|string|max:255',
            'minimum_qty' => 'sometimes|numeric|min:0',
            'unit_price' => 'nullable|numeric|min:0',
        ]);

        try {
            $stock = Stock::findOrFail($id);
            $stock->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $stock,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/stocks/{id}",
     *     summary="Delete a stock",
     *     tags={"Inventory"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Stock deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteStock($id)
    {
        try {
            $stock = Stock::findOrFail($id);
            $stock->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Stock deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }




    /**
     * Get all stock items.
     * Method: GET
     * URL: /api/stock-items
     * Admin user will get stock items using this API
     */
    /**
     * @OA\Get(
     *     path="/api/stock-items",
     *     summary="Get all stock items",
     *      tags={"Inventory"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved stock items",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="item_code", type="string"),
     *                 @OA\Property(property="item_name", type="string"),
     *                 @OA\Property(property="item_category_id", type="integer"),
     *                 @OA\Property(property="uom_id", type="integer"),
     *                 @OA\Property(property="uom_name", type="string"),
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
    public function getStockItems()
    {
        try {
            $stockItems = StockItem::with(['category', 'uom'])->get();
            return response()->json([
                'status' => 'success',
                'data' => $stockItems
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create a new stock item.
     * Method: POST
     * URL: /api/stock-items
     */
    /**
     * @OA\Post(
     *     path="/api/stock-items",
     *     summary="Create a new stock item",
     *      tags={"Inventory"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"item_code", "item_name", "item_category_id", "uom_id"},
     *             @OA\Property(property="item_code", type="string"),
     *             @OA\Property(property="item_name", type="string"),
     *             @OA\Property(property="item_category_id", type="integer"),
     *             @OA\Property(property="uom_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Stock item created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function createStockItem(Request $request)
    {
        $request->validate([
            'item_code' => 'required|string|unique:stock_items',
            'item_name' => 'required|string',
            'item_category_id' => 'required|exists:stock_item_categories,id',
            'uom_id' => 'required|exists:uoms,id',
        ]);

        try {
            $stockItem = StockItem::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $stockItem
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update a stock item.
     * Method: PUT
     * URL: /api/stock-items/{id}
     */
    /**
     * @OA\Put(
     *     path="/api/stock-items/{id}",
     *     summary="Update a stock item",
     *      tags={"Inventory"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="item_code", type="string"),
     *             @OA\Property(property="item_name", type="string"),
     *             @OA\Property(property="item_category_id", type="integer"),
     *             @OA\Property(property="uom_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Stock item updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Stock item not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateStockItem(Request $request, $id)
    {
        $request->validate([
            'item_code' => 'sometimes|string|unique:stock_items,item_code,' . $id,
            'item_name' => 'sometimes|string',
            'item_category_id' => 'sometimes|exists:stock_item_categories,id',
            'uom_id' => 'sometimes|exists:uoms,id',
        ]);

        try {
            $stockItem = StockItem::findOrFail($id);
            $stockItem->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $stockItem
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a stock item.
     * Method: DELETE
     * URL: /api/stock-items/{id}
     */
    /**
     * @OA\Delete(
     *     path="/api/stock-items/{id}",
     *     summary="Delete a stock item",
     *      tags={"Inventory"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Stock item deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Stock item not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteStockItem($id)
    {
        try {
            $stockItem = StockItem::findOrFail($id);
            $stockItem->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Stock item deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
