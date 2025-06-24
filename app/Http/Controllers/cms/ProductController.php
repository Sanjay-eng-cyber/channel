<?php

namespace App\Http\Controllers\cms;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Media;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Showcase;
use App\Models\Wishlist;
use App\Models\Attribute;
use App\Models\OrderItem;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ShowcaseProduct;
use Illuminate\Validation\Rule;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeValue;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest();
        $products = $this->filterResults($request, $products);
        $products = $products->paginate(10);
        $brands = Brand::get();
        $categories = Category::get();
        return view('backend.product.index', compact('products', 'brands', 'categories'));
    }

    protected function filterResults($request, $products)
    {
        if ($request->q !== '' && !is_null($request->q)) {
            if (is_numeric($request->q)) {
                $request->validate(['q' => 'digits_between:3,40'], ['q.*' => 'Please enter proper Number']);
            } else {
                $request->validate(['q' => 'min:3']);
            }
        }

        if ($request !== null && $request->has('q') && $request['q'] !== '') {
            $search = $request['q'];
            $products = $products->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')->orWhere('sku', 'LIKE', '%' . $search . '%');
            });
        }
        if ($request !== null && $request->has('brand') && $request->brand != '') {
            $brand = Brand::whereSlug($request->brand)->first();
            if ($brand) {
                $products = $products->where('brand_id', $brand->id);
            }
        }
        if ($request !== null && $request->has('category') && $request->category != '') {
            $category = Category::whereSlug($request->category)->first();
            if ($category) {
                $products = $products->where('category_id', $category->id);
            }
        }
        return $products;
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product_showcases = $product->showcaseProducts()->get();
        $product_attributes = $product->ProductAttribute()->with('attribute', 'value')->latest()->get();
        //  dd( $product_attribute_values);
        return view('backend.product.show', compact('product', 'product_showcases', 'product_attributes'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $showcases = Showcase::all();
        $attributes = Attribute::all();
        $tags = Tag::all();
        // dd($showcases);
        return view('backend.product.create', compact('categorys', 'brands', 'showcases', 'attributes', 'tags'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $categorys = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $sub_categorys = SubCategory::pluck('id')->toArray();
        $showcases_id = Showcase::pluck('id')->toArray();
        $attributes = Attribute::pluck('id')->toArray();
        $showcases = Showcase::pluck('id')->toArray();
        // dd($categorys);
        // dd($request);
        // dd($showcases_id);
        $request->validate([
            'name' => 'required|min:3|max:250|unique:products,name,',
            'descriptions' => 'nullable|min:3|max:20000',
            'mrp' => 'required|numeric|max:10000000',
            'skin_type' => 'nullable|min:2|max:120',
            'material' => 'nullable|min:2|max:120',
            'special_ingredients' => 'nullable|min:2|max:3000',
            'care_instruction' => 'nullable|min:2|max:3000',
            'expiry' => 'nullable|min:2|max:120',
            'net_quantity' => 'nullable|min:2|max:120',
            'final_price' => 'required|numeric|max:10000000',
            'stock' => 'required|numeric|max:10000000',
            'sku' => 'required|string|unique:products,sku|max:120',
            'category_id' => ['required', Rule::in($categorys)],
            'brand_id' => ['nullable', Rule::in($brands)],
            'sub_category_id' => ['nullable', Rule::in($sub_categorys)],
            'image' => 'required|max:8',
            'image.*' => 'mimes:png,jpg,jpeg|max:1024',
            'showcases' => ['nullable', 'array'],
            'showcases.*' => [Rule::in($showcases_id)],
            'thumbnail_image' => 'required|mimes:png,jpg,jpeg|max:1024',
            'short_descriptions' => 'nullable|min:3|max:5000',
            'attributeKeys' => ['nullable'],
            'attributeKeys.*' => ['nullable', Rule::in($attributes)],
            'showcases' => ['nullable'],
            'showcases.*' => ['required', Rule::in($showcases)],
            // 'connection_no' => 'nullable|min:3|max:20',
            'tags' => 'nullable|max:20',
            'tags.*' => 'string|min:3|max:30',
            'unit_sale_price' => 'nullable|string|min:2|max:30',

        ]);

        $showcases = $request->showcases ?? [];
        foreach ($showcases as $showcase) {
            $checkShowcase = ShowcaseProduct::where('showcase_id', $showcase);
            if ($checkShowcase->count() >= 16) {
                return redirect()->back()->with(['alert-type' => 'error', 'message' => $checkShowcase->first()->showcase->name . ' Showcase has limit of 16'])->withInput();
            }
        }

        $fileWithExtension = $request->file('thumbnail_image');
        //dd($fileWithExtension);
        if ($fileWithExtension) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/products/thumbnails/');
            $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 85);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        // $product->connection_no = $request->connection_no;
        $product->sub_category_id = $request->sub_category_id;
        $product->mrp = $request->mrp;
        $product->skin_type = $request->skin_type;
        $product->material = $request->material;
        $product->special_ingredients = $request->special_ingredients;
        $product->care_instruction = $request->care_instruction;
        $product->expiry = $request->expiry;
        $product->net_quantity = $request->net_quantity;
        $product->final_price = $request->final_price;
        $product->stock = $request->stock;
        $product->sku = $request->sku;
        $product->descriptions = $request->descriptions;
        $product->short_descriptions = $request->short_descriptions;
        $product->thumbnail_image = $filename;
        $product->unit_sale_price = $request->unit_sale_price ?? null;


        if ($product->save()) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $file_details = uploadFile($file, 'images/products');
                $media = new Media();
                $media->model_id = $product->id;
                $media->model_type = Product::class;
                $media->mime_type = $file_details['type'];
                $media->file_name = $file_details['filename'];
                $media->save();
            }
            foreach ($showcases as $showcase) {
                $showcase_product = new ShowcaseProduct();
                $showcase_product->showcase_id = $showcase;
                $showcase_product->product_id = $product->id;
                $showcase_product->save();
            }
            $this->storeTags($request->tags, $product->id);
            $product->storeProductAttributes($request->attributeKeys, $request->values, $product->id);
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categorys = Category::all();
        $showcases = Showcase::all();
        $attributes = Attribute::all();
        $tags = Tag::all();
        $tagsArray = $product->tags()->pluck('tags.name')->toArray();
        //dd($tagsArray);
        $product_attribute = $product->ProductAttribute()->pluck('attribute_value_id')->toArray();
        $product_showcases = $product->showcaseProducts()->exists() ? $product->showcaseProducts()->pluck('showcase_id')->toArray() : [];
        //  dd($product_attribute);
        return view('backend.product.edit', compact('product', 'categorys', 'brands', 'showcases', 'product_showcases', 'attributes', 'product_attribute', 'tags', 'tagsArray'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $categorys = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $sub_categorys = SubCategory::pluck('id')->toArray();
        $product = Product::findOrFail($id);
        $showcases_id = Showcase::pluck('id')->toArray();
        $attributes = Attribute::pluck('id')->toArray();
        $showcases = Showcase::pluck('id')->toArray();
        // dd($media);

        $request->validate([
            'name' => 'required|min:3|max:250|unique:products,name,' . $id,
            'descriptions' => 'nullable|min:3|max:20000',
            'mrp' => 'required|numeric|max:10000000',
            'skin_type' => 'nullable|min:2|max:120',
            'material' => 'nullable|min:2|max:120',
            'special_ingredients' => 'nullable|min:2|max:3000',
            'care_instruction' => 'nullable|min:2|max:3000',
            'expiry' => 'nullable|min:2|max:120',
            'net_quantity' => 'nullable|min:2|max:120',
            'final_price' => 'required|numeric|max:10000000',
            'stock' => 'required|numeric|max:10000000',
            'sku' => 'required|string|max:120|unique:products,sku,' . $id,
            'category_id' => ['required', Rule::in($categorys)],
            'brand_id' => ['nullable', Rule::in($brands)],
            'sub_category_id' => ['nullable', Rule::in($sub_categorys)],
            'image' => 'nullable|max:8',
            'image.*' => 'mimes:png,jpg,jpeg|max:1024',
            'showcases' => ['nullable', 'array'],
            'showcases.*' => [Rule::in($showcases_id)],
            'thumbnail_image' => 'nullable|mimes:png,jpg,jpeg|max:1024',
            'short_descriptions' => 'nullable|min:3|max:5000',
            'attributeKeys' => ['nullable'],
            'attributeKeys.*' => ['nullable', Rule::in($attributes)],
            'showcases' => ['nullable'],
            'showcases.*' => ['required', Rule::in($showcases)],
            // 'connection_no' => 'nullable|min:3|max:20',
            'tags' => 'nullable|max:20',
            'tags.*' => 'string|min:3|max:30',
            'unit_sale_price' => 'nullable|string|min:2|max:30',

        ]);

        $showcases = $request->showcases ?? [];
        foreach ($showcases as $showcase) {
            $checkShowcase = ShowcaseProduct::where('showcase_id', $showcase);
            $checkShowcaseProduct = ShowcaseProduct::where('showcase_id', $showcase)->where('product_id', $id)->exists();
            $checkShowcaseCount = $checkShowcaseProduct ? $checkShowcase->count() - 1 : $checkShowcase->count();
            if ($checkShowcaseCount >= 16) {
                return redirect()->back()->with(['alert-type' => 'error', 'message' => $checkShowcase->first()->showcase->name . ' Showcase has limit of 16'])->withInput();
            }
        }

        $fileWithExtension = $request->file('thumbnail_image');
        if ($request->has('thumbnail_image')) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/products/thumbnails/');
            $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 85);
            if ($product->thumbnail_image) {
                Storage::disk('public')->delete('images/products/thumbnails/' . $product->thumbnail_image);
            }
            $product->thumbnail_image = $filename;
        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->mrp = $request->mrp;
        $product->skin_type = $request->skin_type;
        $product->material = $request->material;
        $product->special_ingredients = $request->special_ingredients;
        $product->care_instruction = $request->care_instruction;
        $product->expiry = $request->expiry;
        $product->net_quantity = $request->net_quantity;
        // $product->connection_no = $request->connection_no;
        $product->final_price = $request->final_price;
        $product->stock = $request->stock;
        $product->sku = $request->sku;
        $product->descriptions = $request->descriptions;
        $product->short_descriptions = $request->short_descriptions;
        $product->unit_sale_price = $request->unit_sale_price ?? null;

        if ($request->file('image')) {
            $medias = Media::where('model_id', $id)->where('model_type', Product::class)->get();
            foreach ($medias as $media) {
                if (Storage::disk('public')->delete('images/products/' . $media->file_name)) {
                    $media->delete();
                }
            }
            //insert multiple image
            $files = $request->file('image');
            foreach ($files as $file) {
                $file_details = uploadFile($file, 'images/products');
                $media = new Media();
                $media->model_id = $product->id;
                $media->model_type = Product::class;
                $media->mime_type = $file_details['type'];
                $media->file_name = $file_details['filename'];
                $media->save();
            }
        }

        // Showcase functionality
        if ($showcases) {
            $showcase_products = ShowcaseProduct::where('product_id', $id);
            optional($showcase_products->delete());
            //insert Showcases
            foreach ($showcases as $showcase) {
                $showcase_product = new ShowcaseProduct();
                $showcase_product->showcase_id = $showcase;
                $showcase_product->product_id = $product->id;
                $showcase_product->save();
            }
        }

        // add function for tags
        $this->updateTags($request->tags, $product->id);
        // Product Attribute functionality
        $product->updateProductAttributes($request->attributeKeys, $request->values, $product->id);

        if ($product->save()) {
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function getSubCategory($id)
    {
        $category = Category::findOrFail($id);
        $subCategory = SubCategory::where('category_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $subCategory,
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (OrderItem::where('product_id', $product->id)->exists()) {
            return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Product is in use']);
        };

        $medias = Media::where('model_id', $id)->where('model_type', Product::class)->get();
        foreach ($medias as $media) {
            if (Storage::disk('public')->delete('images/products/' . $media->file_name)) {
                $media->delete();
            }
        }
        $product->tags()->detach();
        optional(ProductAttribute::where('product_id', $id)->delete());
        optional(ShowcaseProduct::where('product_id', $id)->delete());
        optional(CartItem::where('product_id', $id)->delete());
        optional(Wishlist::where('product_id', $id)->delete());

        if ($product->delete() && Storage::disk('public')->delete('images/products/thumbnails/' . $product->thumbnail_image)) {
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    protected function storeTags($tags, $id)
    {
        // dd($tags);
        $product = Product::find($id);
        if ($tags) {
            foreach ($tags as $tag) {
                if (!Tag::where('name', $tag)->exists()) {
                    $newTag = $product->tags()->create(['name' => $tag]);
                } else {

                    $product->tags()->attach(Tag::where('name', $tag)->first()->id);
                }
            }
        }
    }

    protected function updateTags($tags, $id)
    {
        $product = Product::find($id);
        $product->tags()->detach();
        if ($tags) {
            foreach ($tags as $tag) {
                if (!Tag::where('name', $tag)->exists()) {
                    $newTag = $product->tags()->create(['name' => $tag]);
                } else {
                    $product->tags()->attach(Tag::where('name', $tag)->first()->id);
                }
            }
        }
    }
}
