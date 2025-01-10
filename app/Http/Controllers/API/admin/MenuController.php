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

class MenuController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Function to menu list
     * Method: Get
     * Request URL: /api/categories
     * Admin user will get list of categories & its menus from system using this api
     * Request Data: categories data in json format
     * */
     /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get all categories",
     *     tags={"Menu"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved categories",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="thumbnail", type="string"),
     *                 @OA\Property(property="type", type="integer"),
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
    public function getCategories()
    {
        try {
            $categories = Category::all();
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


    /**
     * @OA\Post(
     *     path="/api/categories",
     *     summary="Create a new category",
     *     tags={"Menu"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="thumbnail", type="string"),
     *             @OA\Property(property="type", type="integer"),
     *             @OA\Property(property="parent_id", type="integer", nullable=true),
     *             @OA\Property(property="status", type="integer", default=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Category created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="thumbnail", type="string"),
     *             @OA\Property(property="type", type="integer"),
     *             @OA\Property(property="created_at", type="string"),
     *             @OA\Property(property="updated_at", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function createCategory(Request $request)
    {
        try {
            $category = Category::create([
                'name' => $request->name,
                'thumbnail' => $request->thumbnail,
                'type' => $request->type,
                'parent_id' => $request->parent_id,
                'status' => $request->status,
            ]);
            $http_code = 200;
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $category;
            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     summary="Update category",
     *     tags={"Menu"},
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
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="thumbnail", type="string"),
     *             @OA\Property(property="type", type="integer"),
     *             @OA\Property(property="parent_id", type="integer", nullable=true),
     *             @OA\Property(property="status", type="integer", default=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="thumbnail", type="string"),
     *             @OA\Property(property="type", type="integer"),
     *             @OA\Property(property="created_at", type="string"),
     *             @OA\Property(property="updated_at", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateCategory(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'thumbnail' => $request->thumbnail,
                'type' => $request->type,
                'parent_id' => $request->parent_id,
                'status' => $request->status,
            ]);
            $http_code = 200;
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $category;
            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     summary="Delete category",
     *     tags={"Menu"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Category is assigned to a menu and cannot be deleted",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="message", type="string", example="This category is assigned to a menu and cannot be deleted.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteCategory($id)
    {
        try {
            $category = Category::findOrFail($id);

            // Check if the category is assigned to any menu
            $isAssignedToMenu = Menu::where('category_id', $id)->exists();
            if ($isAssignedToMenu) {
                $http_code = 400;
                $this->message['status'] = trans('messages.error');
                $this->message['message'] = 'This category is assigned to a menu and cannot be deleted.';
                return response()->json($this->message, $http_code);
            }

            $category->delete();
            $http_code = 200;
            $this->message['status'] = trans('messages.success');
            $this->message['message'] = 'Category deleted successfully.';
            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = trans('messages.error');
            $this->message['reason'] = $e->getMessage();
            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/menus",
     *     summary="Get all menus based on category",
     *     tags={"Menu"},
     *     @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved menus",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="category_id", type="integer"),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="thumbnail", type="string"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="price", type="string"),
     *                 @OA\Property(property="status", type="integer"),
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
    public function getMenus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        try {
            $menus = Menu::where('category_id', $request->category_id)->get();
            $http_code = 200;
            $this->message['status'] = trans('messages.success');
            $this->message['data'] = $menus;
            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            $http_code = 500;
            $this->message['status'] = trans('messages.error');
            return response()->json($this->message, $http_code);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/menus",
     *     summary="Create a new menu",
     *     tags={"Menu"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"category_id", "title", "description"},
     *                 @OA\Property(property="category_id", type="integer"),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="description", type="string"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully created menu",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function createMenu(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        try {
            $menu = Menu::create($request->all());
            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Menu created successfully';
            $this->message['data'] = $menu;
            return response()->json($this->message, $http_code);
        } catch (\Exception $e) {
            \Log::error('Menu creation failed: ' . $e->getMessage());
            $http_code = 500;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';
            return response()->json($this->message, $http_code);
        }        
    }


    /**
     * @OA\Put(
     *     path="/api/menus/{id}",
     *     summary="Update an existing menu",
     *     tags={"Menu"},
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
     *                 required={"category_id", "title", "thumbnail", "description", "price", "status"},
     *                 @OA\Property(property="category_id", type="integer"),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="status", type="integer")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated menu",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Menu not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Menu not found';
            return response()->json($this->message, $http_code);
        }

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|integer'
        ]);

        if ($validator->fails()) {
            $http_code = 400;
            $this->message['status'] = 'error';
            $this->message['message'] = $validator->errors();
            return response()->json($this->message, $http_code);
        }

        try {
            $menu->update($request->all());
            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Menu updated successfully';
            $this->message['data'] = $menu;
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
     *     path="/api/menus/{id}",
     *     summary="Delete a menu",
     *     tags={"Menu"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted menu",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Menu not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteMenu($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Menu not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $menu->delete();
            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Menu deleted successfully';
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
     *     path="/api/menu-items",
     *     summary="Get menu items by menu ID or all menu items",
     *     tags={"Menu Item"},
     *     @OA\Parameter(
     *         name="menu_id",
     *         in="path",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *         description="Optional ID to filter menu items by menu_id. If not provided, all menu items will be returned."
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully fetched menu items",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="price", type="number", format="float"),
     *                 @OA\Property(property="description", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */

    public function getMenuItems($menu_id=null)
    {
        try {
            if ($menu_id) {
                // Retrieve the menu items based on the given menu_id
                $menuItems = MenuItem::where('id', $menu_id)->get();
            } else {
                // Retrieve all menu items
                $menuItems = MenuItem::all();
            }

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['data'] = $menuItems;
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
     *     path="/api/menu-items",
     *     summary="Add a new menu item",
     *     tags={"Menu Item"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"name", "price", "description", "menu_type", "category_id", "menu_id"},
     *                 @OA\Property(property="name", type="string", example="Grilled Chicken"),
     *                 @OA\Property(property="price", type="number", format="float", example=12.99),
     *                 @OA\Property(property="description", type="string", example="Delicious grilled chicken with spices."),
     *                 @OA\Property(property="menu_type", type="string", enum={"Dine_In", "Takeaway", "Both"}, example="Dine_In"),
     *                 @OA\Property(property="category_id", type="integer", example=1),
     *                 @OA\Property(property="menu_id", type="integer", example=2),
     *                 @OA\Property(property="is_bom", type="boolean", example=false),
     *                 @OA\Property(property="stock_id", type="integer", nullable=true, example=null)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully added new menu item",
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
    public function addMenuItem(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'menu_type' => 'required|in:Dine_In,Takeaway,Both',
            'category_id' => 'required|exists:categories,id',
            'menu_id' => 'required|exists:menus,id',
            'is_bom' => 'nullable|boolean',
            'stock_id' => 'nullable|exists:stocks,id',
        ]);

        try {
            // Create new menu item
            $menuItem = MenuItem::create([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'menu_type' => $validated['menu_type'],
                'category_id' => $validated['category_id'],
                'menu_id' => $validated['menu_id'],
                'is_bom' => $validated['is_bom'] ?? 0,
                'stock_id' => $validated['stock_id'] ?? null,
            ]);

            $this->message['status'] = 'success';
            $this->message['message'] = 'Menu item added successfully';
            $this->message['data'] = $menuItem;

            return response()->json($this->message, 200);
        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Menu item creation failed: ' . $e->getMessage());

            $this->message['status'] = 'error';
            $this->message['message'] = 'Internal Server Error';
            return response()->json($this->message, 500);
        }
    }



    /**
     * @OA\Put(
     *     path="/api/menu_items/{id}",
     *     summary="Update a menu item",
     *     tags={"Menu Item"},
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
     *                 required={"name", "price", "description"},
     *                 @OA\Property(property="name", type="string", example="Grilled Chicken"),
     *                 @OA\Property(property="price", type="number", format="float", example=12.99),
     *                 @OA\Property(property="description", type="string", example="Delicious grilled chicken with spices."),
     *                 @OA\Property(property="dietary_labels", type="array", @OA\Items(type="string"), example={"Gluten-Free", "Low Carb"})
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated menu item",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request. Invalid data or parameters."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Menu item not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateMenuItem(Request $request, $id)
    {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'dietary_labels' => 'nullable|array',
            'dietary_labels.*' => 'string',
        ]);

        $menuItem = MenuItem::find($id);

        if (!$menuItem) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Menu item not found';
            return response()->json($this->message, $http_code);
        }

        // Update menu item details
        try {
            $menuItem->name = $validated['name'];
            $menuItem->price = $validated['price'];
            $menuItem->description = $validated['description'];
            $menuItem->save();

            // Update dietary labels if provided
            if (isset($validated['dietary_labels'])) {
                $menuItem->dietaryLabels()->sync($validated['dietary_labels']);
            }

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Menu item updated successfully';
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
     *     path="/api/menu_items/{id}",
     *     summary="Delete a menu item",
     *     tags={"Menu Item"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted menu item",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Menu item not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteMenuItem($id)
    {
        $menuItem = MenuItem::find($id);

        if (!$menuItem) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Menu item not found';
            return response()->json($this->message, $http_code);
        }

        // Check for foreign key relationship in customization_options and dietary_labels
        $customizationOptions = CustomizationOption::where('menu_item_id', $id)->exists();
        $dietaryLabels = DietaryLabel::where('menu_item_id', $id)->exists();

        if ($customizationOptions || $dietaryLabels) {
            $http_code = 400;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Cannot delete menu item. It has related records in customization options or dietary labels.';
            return response()->json($this->message, $http_code);
        }

        try {
            $menuItem->delete();
            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Menu item deleted successfully';
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
     *     path="/api/customization-options",
     *     summary="List all customization options",
     *     tags={"Customization Option"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved customization options",
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
    public function listCustomizationOptions()
    {
        try {
            $customizationOptions = CustomizationOption::all();

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Customization options retrieved successfully';
            $this->message['data'] = $customizationOptions;

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
     *     path="/api/customization-options",
     *     summary="Add a new customization option",
     *     tags={"Customization Option"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"menu_item_id", "option_name", "option_value"},
     *                 @OA\Property(property="menu_item_id", type="integer", example=1),
     *                 @OA\Property(property="option_name", type="string", example="Size"),
     *                 @OA\Property(property="option_value", type="string", example="Large"),
     *                 @OA\Property(property="additional_price", type="number", format="float", example=1.99)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully added customization option",
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
    public function addCustomizationOption(Request $request)
    {
        $validated = $request->validate([
            'menu_item_id' => 'required|integer|exists:menu_items,id',
            'option_name' => 'required|string|max:255',
            'option_value' => 'required|string|max:255',
            'additional_price' => 'nullable|numeric|min:0',
        ]);

        try {
            $customizationOption = CustomizationOption::create($validated);

            $http_code = 201;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Customization option added successfully';
            $this->message['data'] = $customizationOption;

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
     *     path="/api/customization-options/{id}",
     *     summary="Update a customization option",
     *     tags={"Customization Option"},
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
     *                 @OA\Property(property="option_name", type="string", example="Size"),
     *                 @OA\Property(property="option_value", type="string", example="Medium"),
     *                 @OA\Property(property="additional_price", type="number", format="float", example=2.99)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated customization option",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Customization option not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateCustomizationOption(Request $request, $id)
    {
        $validated = $request->validate([
            'option_name' => 'nullable|string|max:255',
            'option_value' => 'nullable|string|max:255',
            'additional_price' => 'nullable|numeric|min:0',
        ]);

        $customizationOption = CustomizationOption::find($id);

        if (!$customizationOption) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Customization option not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $customizationOption->update($validated);

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Customization option updated successfully';
            $this->message['data'] = $customizationOption;

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
     *     path="/api/customization-options/{id}",
     *     summary="Delete a customization option",
     *     tags={"Customization Option"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted customization option",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Customization option not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteCustomizationOption($id)
    {
        $customizationOption = CustomizationOption::find($id);

        if (!$customizationOption) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Customization option not found';
            return response()->json($this->message, $http_code);
        }

        // Delete the customization option
        $customizationOption->delete();

        $http_code = 200;
        $this->message['status'] = 'success';
        $this->message['message'] = 'Customization option deleted successfully';
        
        return response()->json($this->message, $http_code);
    }

    /**
     * @OA\Get(
     *     path="/api/dietary-attributes",
     *     summary="List all dietary attributes",
     *     tags={"Dietary Attributes"},
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
     *     tags={"Dietary Attributes"},
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
     *     tags={"Dietary Attributes"},
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
     *     tags={"Dietary Attributes"},
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
     *     path="/api/dietary-labels",
     *     summary="List all dietary labels",
     *     tags={"Dietary Labels"},
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved dietary labels",
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
    public function listDietaryLabels()
    {
        try {
            $dietaryLabels = DietaryLabel::with(['menuItem', 'dietaryAttribute'])->get();

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary labels retrieved successfully';
            $this->message['data'] = $dietaryLabels;

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
     *     path="/api/dietary-labels",
     *     summary="Add a new dietary label",
     *     tags={"Dietary Labels"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"menu_item_id", "dietary_attribute_id"},
     *                 @OA\Property(property="menu_item_id", type="integer", example=1),
     *                 @OA\Property(property="dietary_attribute_id", type="integer", example=1)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully added dietary label",
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
    public function addDietaryLabel(Request $request)
    {
        $validated = $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'dietary_attribute_id' => 'required|exists:dietary_attributes_master,id',
        ]);

        try {
            $dietaryLabel = DietaryLabel::create($validated);

            $http_code = 201;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary label added successfully';
            $this->message['data'] = $dietaryLabel;

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
     *     path="/api/dietary-labels/{id}",
     *     summary="Update a dietary label",
     *     tags={"Dietary Labels"},
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
     *                 @OA\Property(property="menu_item_id", type="integer", example=1),
     *                 @OA\Property(property="dietary_attribute_id", type="integer", example=1)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated dietary label",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Dietary label not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function updateDietaryLabel(Request $request, $id)
    {
        $validated = $request->validate([
            'menu_item_id' => 'nullable|exists:menu_items,id',
            'dietary_attribute_id' => 'nullable|exists:dietary_attributes_master,id',
        ]);

        $dietaryLabel = DietaryLabel::find($id);

        if (!$dietaryLabel) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Dietary label not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $dietaryLabel->update($validated);

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary label updated successfully';
            $this->message['data'] = $dietaryLabel;

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
     *     path="/api/dietary-labels/{id}",
     *     summary="Delete a dietary label",
     *     tags={"Dietary Labels"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted dietary label",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="status", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Dietary label not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error"
     *     )
     * )
     */
    public function deleteDietaryLabel($id)
    {
        $dietaryLabel = DietaryLabel::find($id);

        if (!$dietaryLabel) {
            $http_code = 404;
            $this->message['status'] = 'error';
            $this->message['message'] = 'Dietary label not found';
            return response()->json($this->message, $http_code);
        }

        try {
            $dietaryLabel->delete();

            $http_code = 200;
            $this->message['status'] = 'success';
            $this->message['message'] = 'Dietary label deleted successfully';

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
     *     tags={"Currencies"},
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
     *     tags={"Currencies"},
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
     *     tags={"Currencies"},
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
     *     tags={"Currencies"},
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


}