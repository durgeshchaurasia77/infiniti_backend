<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use DB;
use Validator;
use App\Models\FAQ;
use App\Http\Traits\MessageStatusTrait;

class FAQController extends Controller
{
    use MessageStatusTrait;
    # Bind location
    protected $view = 'admin.faq.';

    protected $type = 'Faq ';

    protected  $page = 10;
    # Bind outlet
    protected $faqs;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            FAQ          $faqs

                        ) {
                            $this->faqs = $faqs;
                            $this->page = config('paginate.pagination');
                        }

    #outlet page
    /**
      * Faq  index page
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function index(Request $request)
    {
        $query = $this->faqs;

        $faq_list = $query->orderBy('id', 'desc')->paginate($this->page ?? 10);
        return view($this->view . 'index')->with([
            'faqList'  => $faq_list ?? [],

        ]);
    }


    /**
      * Faq  store
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function store(Request $request)
    {
        try {

            $rules = [
                'question'        => 'required|max:150',
                'answer'          => 'required|max:255'
            ];
            $messages = ['required' => 'The :attribute field is required.'];

            #validator
            $validator = Validator::make($request->all(), $rules, $messages);

            #if validation fails
            if ($validator->fails()) {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => $validator->errors()->first()
                ]);
            }

            # check the requested sub category already exist or not
            $checkfaq = $this->faqs->where('question', $request->question)
                ->first();

            if ($checkfaq) {

                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => 'Sorry, this Faqs Question already exist.'
                ]);
            }

            $value                  = new $this->faqs;
            $value->question        = $request->question ?? null;
            $value->answer          = $request->answer ?? null;
            $value->created_at      = date('Y-m-d H:i:s');
            $value->save();

            if (isset($value->id)) {
                return response()->json([
                    (string)$this->responseCode     => (string)$this->successStatus,
                    (string)$this->responseMessage  => 'FAQ Added Successfully.',
                    'responseUrl'                   => route('faq-list')
                ]);
            } else {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => 'Something went wrong.'
                ]);
            }
        } catch (Exception $e) {

            return response()->json([
                (string)$this->responseCode    => (string)$this->errorStatus,
                (string)$this->responseMessage => 'Something went wrong.'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $details['faqData'] = $this->faqs->findOrFail($id);
            return view($this->view . 'edit', $details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
      * Faq  update
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function update(Request $request)
    {
        $rules = [
            'question'    => 'required|max:150',
            'answer'      => 'required|max:255',
        ];
        $messages = ['required' => 'The :attribute field is required.'];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if ($validator->fails()) {
            return response()->json([
                (string)$this->responseCode    => (string)$this->errorStatus,
                (string)$this->responseMessage => $validator->errors()->first()
            ]);
        }
        try {

            DB::beginTransaction();
            // dd($request->all());
            $checkSubCategory = $this->faqs->where('question', $request->question)
                                            ->where('id', '!=', $request->id)
                                            ->first();


            if ($checkSubCategory) {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => 'Sorry, this question already exist above category.'
                ]);
            }


            $value                 = $this->faqs->where('id', $request->id)->first();
            $value->question       = $request->question ?? null;
            $value->answer         = $request->answer ?? null;
            $value->updated_at     = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if (isset($value->id)) {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->successStatus,
                    (string)$this->responseMessage => 'Faqs Updated Successfully.',
                    'responseUrl'                  => route('faq-list')
                ]);
            } else {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => 'Something went wrong.'
                ]);
            }
        } catch (Exception $e) {

            return response()->json([
                (string)$this->responseCode    => (string)$this->errorStatus,
                (string)$this->responseMessage => $validator->errors()->first()
            ]);
        }
    }

    /**
     * active deactive
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        # initiate constructor
        $query = $this->faqs;

        # get the status
        $status = $query->where('id', $id)->first()->status;

        # check status, if active
        if ($status == '1') {
            #message
            $message = $this->inActiveMessage($this->type);

            # deactive( update status to zero)
            $statusCode = '0';
        } else {
            #message
            $message = $this->activeMessage($this->type);

            # active( update status to one)
            $statusCode = '1';
        }

        # update status code
        $query->where('id', $id)->update(['status' => $statusCode]);

        # return success
        return [$this->successKey => $this->successStatus, $this->messageKey => $message];
    }
    public function delete($id)
    {

        $query = $this->faqs;

        $query->where('id', $id)->delete();

        return  [$this->successKey  =>  $this->successStatus,  $this->messageKey  => $this->deleteMessage($this->type)];
    }
}
