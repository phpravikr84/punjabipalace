@extends('layouts.backend')

@section('title', 'Create Menu Item')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create Menu Item</h1>
        </div>
        <div class="card-body">
        <form action="insert_menu.php" enctype="multipart/form-data" name="myform" id="insertMenuForm" method="post" style="padding-top:15px;">
            <!-- Image Upload Table Start -->
            <table style="width:100%; display:none;" border="0">
            <tbody>
                <tr>
                <td style="width:45%;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr align="center">
                        <td height="100px">
                            <img id="preview1" src="https://comfortinn.adzgurupos.com/main/sst/cadmin/image/no_image.jpeg" width="150" height="150" alt="Client Photo" title="Client Photo" border="1">
                        </td>
                        </tr>
                        <tr align="center">
                        <td height="20px">Select Menu Image (Maximum Size = 100 KB)</td>
                        </tr>
                        <tr align="center">
                        <td height="30px">
                            <div style="display: flex; justify-content: space-around;">
                            <input type="file" name="file1" id="file1" accept="image/*" style="width: 70%;" onchange="return showPreview1(this);">
                            <input type="button" name="clearphoto1" class="btn btn-primary" value="Clear" id="clear" onclick="return clearPreview1()" style="width: 100px;">
                            </div>
                        </td>
                        </tr>
                        <tr align="center">
                        <td id="filestatus1">&nbsp;</td>
                        </tr>
                    </tbody>
                    </table>
                </td>
                </tr>
            </tbody>
            </table>
            <!-- Image Upload Table End -->

            <!-- Category and Subcategory -->
            <div class="row">
            <div class="col-25" style="display: none;">
                <label>Category</label>
            </div>
            <div class="col-30" style="display: none;">
                <select id="menu_cat" class="check_integrity" name="menu_cat" onchange="getMenuCategory(this.value)" autocomplete="off">
                <option value="0">Select</option>
                <option value="101">All</option>
                </select>
            </div>
            <div class="col-25">
                <span>Category</span>
            </div>
            <div class="col-30">
                <select id="menu_subcat" name="menu_subcat" autocomplete="off">
                <option value="142">Food</option>
                <option value="144">Beverage</option>
                <option value="145">Cakes</option>
                <option value="146">Coffee</option>
                <option value="147">Italian Bread</option>
                <option value="148">Hot Tea</option>
                <option value="149">Smoothies</option>
                </select>
            </div>
            </div>

            <!-- Food Code and Name -->
            <div class="row">
            <div class="col-25">
                <label>Food Code</label>
            </div>
            <div class="col-30">
                <input type="text" value="140" name="food_code" id="food_code" required readonly onkeyup="return checkfoodCode();" style="width:100%;">
            </div>
            <div class="col-15">
                <span>Food Name</span>
            </div>
            <div class="col-30">
                <input type="text" value="" class="check_integrity" name="food_name">
            </div>
            </div>

            <!-- Description and UOM -->
            <div class="row">
            <div class="col-25">
                <label>Description</label>
            </div>
            <div class="col-30">
                <input type="text" value="" name="description">
            </div>
            <div class="col-15">
                <span>UOM</span>
            </div>
            <div class="col-30">
                <select id="uom" name="uom" class="check_integrity" autocomplete="off">
                <option value="select">Select</option>
                <option value="7">Pc</option>
                <option value="8">Plate</option>
                <option value="17">Test1</option>
                <option value="18">Cup</option>
                <option value="19">Gms</option>
                <option value="20">ML</option>
                <option value="21">Mug</option>
                <option value="22">Kg</option>
                <option value="23">Liter</option>
                </select>
            </div>
            </div>

            <!-- Prices -->
            <div class="row">
            <div class="col-25">
                <label>Dine-In Price (Incl. 10% GST)</label>
            </div>
            <div class="col-30">
                <input type="text" value="0" class="check_integrity" name="dine_in_price" id="dine_in_price">
            </div>
            <div class="col-15" style="display: none;">
                <span>Take Away Price</span>
            </div>
            <div class="col-30" style="display: none;">
                <input type="text" value="0" name="take_away_price" id="take_away_price">
            </div>
            </div>

            <!-- Additional Prices -->
            <div class="row" style="display: none;">
            <div class="col-25">
                <label>Delivery Price</label>
            </div>
            <div class="col-30">
                <input type="text" value="0" name="delivery_price" id="delivery_price">
            </div>
            <div class="col-15">
                <span>Room Service Price</span>
            </div>
            <div class="col-30">
                <input type="text" value="0" name="room_service_price" id="room_service_price">
            </div>
            </div>

            <!-- Ingredient Selection -->
            <div class="row" id="ingredients_div">
            <div class="col-12">
                <label>ADD INGREDIENTS</label>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <select onchange="getPurchaseLot()" id="ingredients">
                <option value="0">Select Ingredients</option>
                <option value="39">37 - Water</option>
                <option value="40">38 - Coca cola</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" id="selectIndActionBtn"></div>
            </div>

            <!-- Submit Section -->
            <div class="row mt-3">
            <div class="col-12 text-right">
                <div class="custom-control custom-switch noselect" style="cursor:pointer;">
                <input type="checkbox" class="custom-control-input" id="bulk_check" name="bulk_check" onchange="BulkBomDivHide();">
                <label class="custom-control-label text-success" for="bulk_check">Will the item be a ready to sell menu?</label>
                </div>
            </div>
            <div class="col-12 text-right">
                <div class="custom-control custom-switch noselect" style="cursor:pointer;">
                <input type="checkbox" class="custom-control-input" id="bom_check" name="bom_check" checked onchange="BulkBomDivHide();">
                <label class="custom-control-label text-success" for="bom_check">Is the item having Bill of materials?</label>
                </div>
            </div>
            </div>
        </form>

        </div>
    </div>
</div>
@endsection

