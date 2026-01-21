<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\ReportConsultation;
class ReportConsultationController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.get_report_consultation.';

    protected $type = 'Report Consultation';
    protected $reportConsultation;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ReportConsultation          $reportConsultation
                        )
                        {
                            $this->reportConsultation = $reportConsultation;
                        }
    /**
      * get reportConsultation
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function index(Request $request) {

        # fetch ReportConsultation list
        $query = $this->reportConsultation;

        $reportConsultationData = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'reportConsultationData'  => $reportConsultationData ?? [],
                                                ]);
    }
}
