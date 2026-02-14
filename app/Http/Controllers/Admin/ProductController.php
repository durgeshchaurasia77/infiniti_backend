<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Exception;
use App\Models\Product;
use App\Models\FeatureProduct;

class ProductController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.product.';

    protected $type = 'Product  ';


    # Bind outlet
    protected $page;
    protected $product;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Product          $product
                        )
                        {
                            $this->product = $product;
                            $this->page = config('paginate.pagination');
                        }


    #product page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->product;

        $categories = FeatureProduct::where('status',1)->get();
        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                'categories' => $categories ?? [],
                                                ]);
    }
    /**
    * product store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'category_id'      => 'required|exists:features_product,id',
            'title'            => 'required|string|max:255',
            'image'            => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_product_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/products/'), $filename);
                $imagePath = 'images/admin/products/'.$filename;
            }

            $product = new Product();
            $product->category_id     = $request->category_id;
            $product->title           = $request->title;
            $product->short_detail    = $request->short_detail;
            $product->contry       = $request->contry;
            $product->platform    = $request->platform;
            $product->image           = $imagePath ?? null;
            $product->created_at      = now();
            $product->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Product Added Successfully.',
                'responseUrl'     => route('product-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }




    /**
     * edit product page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $productData['data'] = $this->product->findOrFail($id);

            $productData['categories'] = FeatureProduct::where('status',1)->get();
            return view($this->view.'edit',$productData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update product page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:products,id',
            'category_id'      => 'required|exists:features_product,id',
            'title'            => 'required|string|max:255',
            'short_detail'     => 'required|string|max:500',

            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {

        DB::beginTransaction();
            $product = Product::findOrFail($request->id);

            /* ================= BLOG IMAGE ================= */
            if ($request->hasFile('image')) {
                if (!empty($product->image) && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }

                $file = $request->file('image');
                $filename = time().'_product_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/products/'), $filename);
                $product->image = 'images/admin/products/'.$filename;
            }
            /* ================= UPDATE DATA ================= */
            $product->category_id     = $request->category_id;
            $product->title           = $request->title;
            $product->short_detail    = $request->short_detail;
            $product->contry          = $request->contry;
            $product->platform        = $request->platform;
            $product->updated_at      = now();
            $product->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Product Updated Successfully.',
                'responseUrl'     => route('product-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }


    /**
    * update product status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->product;
        $status = $query->where('id', $id)->first()->status;

        if ($status == '1')
        {
            $message = $this->inActiveMessage($this->type);
            $statusCode = '0';
        }
        else
        {
            $message = $this->activeMessage($this->type);
            $statusCode = '1';
        }

        $query->where('id', $id)->update(['status' => $statusCode]);

        return [
                    $this->successKey => $this->successStatus,
                    $this->messageKey => $message
                ];
    }
    /**
    * delete product
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {

        $result = $this->product->where('id', $id)->delete();

        if($result){

            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
