<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

trait DonorValidationTrait

{

    // public function validateRequest($request, $bladeIdentifier, $unique = true)
    // {
    //     $commonRule = [
    //         'title' => 'required|in:Mr,Miss,Mrs,Other',
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'email' => [
    //             'required', 'max:255',
    //             'email',
    //             $unique ? 'unique:donors,email' : '',
    //             'regex:/^\w+[-\.\w]*@(?!(?:)\.com$)\w+[-\.\w]*?\.\w{2,4}$/',
    //         ],
    //         'mobile' => 'required|numeric|digits:10',

    //         'pincode' => 'required|numeric|digits:6',
    //         'country_id' => 'required|exists:countries,id',
    //         'state_id' => 'required|exists:states,id',
    //         'city_id' => 'required|exists:cities,id',
    //         'house_no' => 'required|string',
    //         'road_name' => 'required|string',
    //     ];

    //     $rules = [];

    //     switch ($bladeIdentifier) {
    //         case 'individual':
    //             $rules = $commonRule + [
    //                 'pan_no' => [
    //                     'required',
    //                     $unique ? 'unique:donors,pan_no' : '',
    //                     'regex:/^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/'
    //                 ],
    //             ];
    //             break;

    //         case 'company':
    //         case 'trust':
    //             $rules = $commonRule + [
    //                 'company_name' => 'required|string',
    //                 'activity_type' => 'required',
    //                 'director_name' => 'required|string',
    //                 'company_email' => [
    //                     'required',
    //                     'max:255',
    //                     'email',
    //                     $unique ? 'unique:donors,company_email' : '',
    //                     'regex:/^\w+[-\.\w]*@(?!(?:)\.com$)\w+[-\.\w]*?\.\w{2,4}$/'
    //                 ],
    //             ];
    //             break;

    //         default:
    //             // Handle unknown blade identifier.
    //             break;
    //     }

    //     $validator = Validator::make($request->all(), $rules);

    //     return $validator;
    // }
    public function validateRequest($request, $bladeIdentifier, $unique = true)
    {
        $rules = [];

        $this->addRuleIfExists($request, $rules, 'title', 'required|in:Mr,Miss,Mrs,Other');
        $this->addRuleIfExists($request, $rules, 'first_name', 'required|string');
        $this->addRuleIfExists($request, $rules, 'last_name', 'required|string');
        $this->addRuleIfExists($request, $rules, 'email', [
            'required', 'max:255',
            'email',
            $unique ? 'unique:donors,email' : '',
            'regex:/^\w+[-\.\w]*@(?!(?:)\.com$)\w+[-\.\w]*?\.\w{2,4}$/',
        ]);
        $this->addRuleIfExists($request, $rules, 'mobile', 'required|numeric|digits:10');

        $this->addRuleIfExists($request, $rules, 'pincode', 'required|numeric|digits:6');
        $this->addRuleIfExists($request, $rules, 'country_id', 'required|exists:countries,id');
        $this->addRuleIfExists($request, $rules, 'state_id', 'required|exists:states,id');
        $this->addRuleIfExists($request, $rules, 'city_id', 'required|exists:cities,id');
        $this->addRuleIfExists($request, $rules, 'house_no', 'required|string');
        $this->addRuleIfExists($request, $rules, 'road_name', 'required|string');

        switch ($bladeIdentifier) {
            case 'individual':
                $this->addRuleIfExists($request, $rules, 'pan_no', [
                    'required',
                    $unique ? 'unique:donors,pan_no' : '',
                    'regex:/^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/',
                ]);
                break;

            case 'company':
            case 'trust':
                $this->addRuleIfExists($request, $rules, 'company_name', 'required|string');
                $this->addRuleIfExists($request, $rules, 'activity_type', 'required');
                $this->addRuleIfExists($request, $rules, 'director_name', 'required|string');
                $this->addRuleIfExists($request, $rules, 'company_email', [
                    'required',
                    'max:255',
                    'email',
                    $unique ? 'unique:donors,company_email' : '',
                    'regex:/^\w+[-\.\w]*@(?!(?:)\.com$)\w+[-\.\w]*?\.\w{2,4}$/',
                ]);
                break;

            default:
                // Handle unknown blade identifier.
                break;
        }

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }


    private function addRuleIfExists($request, &$rules, $field, $rule)
    {
        if ($request->has($field)) {
            $rules[$field] = $rule;
        }
    }
}
