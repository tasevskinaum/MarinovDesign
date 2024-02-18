<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Category;
use App\Models\Maintenance;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ImageKit\ImageKit;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();
        $maintenances = Maintenance::all();

        return view('dashboard.product.create', compact(['categories', 'materials', 'maintenances']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'dimension' => $request->dimension,
                'weight' => $request->weight,
                'price' => $request->price,
                'discount_percentage' => $request->discount,
                'discount_price' => $request->discount !== null ? $request->price * (1 - ($request->discount / 100)) : null,
                'category_id' => $request->category,
                'type_id' => $request->type,
                'stock' => $request->in_stock
            ]);

            if (!empty($request->images)) {
                foreach ($request->images as $image) {
                    ProductGallery::create([
                        'product_id' => $product->id,
                        'image_url' => $this->uploadImage($image)
                    ]);
                }
            }

            $materialData = [];
            foreach ($request->materials as $material) {
                $materialData[] = [
                    'product_id' => $product->id,
                    'material_id' => $material
                ];
            }
            DB::table('material_product')->insert($materialData);

            $maintenanceData = [];
            foreach ($request->maintenances as $maintenance) {
                $maintenanceData[] = [
                    'product_id' => $product->id,
                    'maintenance_id' => $maintenance
                ];
            }
            DB::table('maintenance_product')->insert($maintenanceData);

            DB::commit();

            return redirect()
                ->route('products.index')
                ->with(['success' => "Product added."]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('products.index')
                ->with(['danger' => "An unexpected error occurred while saving the product. Please try again!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()
                ->route('products.index')
                ->with(['success' => "Product deleted."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('products.index')
                ->with(['danger' => "An unexpected error occurred while deleting product. Please try again!"]);
        }
    }

    private function uploadImage($image)
    {
        $imageKit = new ImageKit(
            'public_HqvXchqCR3L08wnPnLXHdgNDhk4=',
            'private_5xIEDMhXzw+5XKstdR4q/WOqiSQ=',
            'https://ik.imagekit.io/lztd93pns',
        );

        if ($image) {
            $fileType = mime_content_type($image->path());

            $fileData = [
                'file' => 'data:' . $fileType . ';base64,' . base64_encode(file_get_contents($image->path())),
                'fileName' => $image->getClientOriginalName(),
                'folder' => 'MarinovDesign',
            ];

            $uploadedFile = $imageKit->uploadFile($fileData);

            if ($uploadedFile->result->url)
                return $uploadedFile->result->url;
        }

        return null;
    }
}
