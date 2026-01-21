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
use App\Models\TrunkeyPartner;
use Illuminate\Validation\Rule;
class TrunkeyPartnerController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.trunkey_partner.';

    protected $type = 'Trunkey Partner  ';


    # Bind outlet
    protected $trunkeyPartner;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            TrunkeyPartner        $trunkeyPartner,
                        )
                        {
                            $this->trunkeyPartner= $trunkeyPartner;
                            $this->page          = config('paginate.pagination');
                        }



    /**
     * edit Home trunkeyPartner edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $details['trunkeyPartner'] = $this->trunkeyPartner->first();
            return view($this->view.'edit', $details);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home trunkeyPartner page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'id'                => 'nullable|exists:trunkey_partners,id',
            'title'             => 'required|string|max:100|unique:trunkey_partners,title,' . $request->id,
            'short_description' => 'nullable|string|max:500',
            'image_one'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_two'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'            => 'nullable|boolean',
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

            $partner = TrunkeyPartner::firstOrNew(['id' => $request->id]);

            if ($request->hasFile('image_one')) {
                if (!empty($partner->image_one) && file_exists(public_path($partner->image_one))) {
                    unlink(public_path($partner->image_one));
                }

                $file = $request->file('image_one');
                $filename = time() . '_one_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/admin/trunkeyPartners/'), $filename);
                $partner->image_one = 'images/admin/trunkeyPartners/' . $filename;
            }

            if ($request->hasFile('image_two')) {
                if (!empty($partner->image_two) && file_exists(public_path($partner->image_two))) {
                    unlink(public_path($partner->image_two));
                }

                $file = $request->file('image_two');
                $filename = time() . '_two_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/admin/trunkeyPartners/'), $filename);
                $partner->image_two = 'images/admin/trunkeyPartners/' . $filename;
            }

            $partner->title             = $request->title;
            $partner->short_description = $request->short_description;
            $partner->status            = $request->status ?? 1;

            $partner->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => $request->id
                    ? 'Trunkey Partner Updated Successfully.'
                    : 'Trunkey Partner Created Successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong. Please try again.',
            ]);
        }
    }


}
