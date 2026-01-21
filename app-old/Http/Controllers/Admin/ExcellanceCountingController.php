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
use App\Models\ExcellanceCounting;
use Illuminate\Validation\Rule;
class ExcellanceCountingController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.excelanace_counting.';

    protected $type = 'Excellance Counting  ';


    # Bind outlet
    protected $excellanceCounting;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ExcellanceCounting        $excellanceCounting,
                        )
                        {
                            $this->excellanceCounting= $excellanceCounting;
                            $this->page          = config('paginate.pagination');
                        }



    /**
     * edit Home excellanceCounting edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $details['counting'] = $this->excellanceCounting->first();
            return view($this->view.'edit', $details);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home excellanceCounting page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'industry_count'         => 'nullable|integer|min:0',
            'empowered_count'        => 'nullable|integer|min:0',
            'coutries_count'         => 'nullable|integer|min:0',
            'teach_engineer_count'   => 'nullable|integer|min:0',
            'digital_solution_count' => 'nullable|integer|min:0',
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

            // Always single record
            $counting = ExcellanceCounting::firstOrNew(['id' => 1]);

            $counting->industry_count         = $request->industry_count;
            $counting->empowered_count        = $request->empowered_count;
            $counting->coutries_count         = $request->coutries_count;
            $counting->teach_engineer_count   = $request->teach_engineer_count;
            $counting->digital_solution_count = $request->digital_solution_count;

            $counting->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Excellence Counting Updated Successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



}
