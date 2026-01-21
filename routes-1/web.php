<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\TrustedByController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\PageBannerController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\TrunkeyPartnerController;
use App\Http\Controllers\Admin\ExcellanceCountingController;
use App\Http\Controllers\Admin\TechnologyUsedController;
use App\Http\Controllers\Admin\OurPeopleController;
use App\Http\Controllers\Admin\CertificateSoftwareController;
use App\Http\Controllers\Admin\OurJourneyController;
use App\Http\Controllers\Admin\FameMobileAppController;
use App\Http\Controllers\Admin\WhyBusinessChooseController;
use App\Http\Controllers\Admin\CraftingTechnologyController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\LeverageAiController;
use App\Http\Controllers\Admin\PowerPackedController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\AdvanceTechnologyController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\RoadMapController;
use App\Http\Controllers\Admin\ServiceWeOfferController;
use App\Http\Controllers\Admin\ClientSatisfationController;
use App\Http\Controllers\Admin\OurProvenController;
use App\Http\Controllers\Admin\AdvanceAiController;
use App\Http\Controllers\Admin\WeDeliverController;
use App\Http\Controllers\Admin\Master\GetEnquiryTypeController;

// Website Test
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\AboutController as WebAboutController;
use App\Http\Controllers\Website\FrroLocationController as WebFrroLocationController;
use App\Http\Controllers\Website\DestinationServicesController as WebDestinationServicesController;
use App\Http\Controllers\Website\BlogsNewsController as WebBlogsNewsController;
use App\Http\Controllers\Website\ContentManagementController as WebContentManagementController;
use App\Http\Controllers\Website\FaqController as WebFaqController;
use App\Http\Controllers\Website\AbreviationController as WebAbreviationController;
use App\Http\Controllers\Website\VideoLibraryController as WebVideoLibraryController;
use App\Http\Controllers\Website\ExpactServicesController as WebExpactServicesController;
use App\Http\Controllers\Website\OurServicesController as WebOurServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('mobile_privacy_policy', [CMSController::class,'mobile_privacy_policy'])->name('mobile_privacy_policy');
// Route::get('mobile_term_condition', [CMSController::class,'mobile_term_condition'])->name('mobile_term_condition');
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', [AdminLoginController::class, 'index'])->name('admin_login');
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin_login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin_login_submit');
    Route::get('admin-forgot-password', [AdminLoginController::class, 'forgotPassword'])->name('admin_forgot_password');
    Route::Post('admin-send-otp', [AdminLoginController::class, 'sendOtp'])->name('admin_send_otp');
    Route::get('admin-verify-otp/{email}', [AdminLoginController::class, 'verifyOTP'])->name('admin_verify_otp');
    Route::post('admin-match-otp', [AdminLoginController::class, 'matchotp'])->name('admin_match_otp');
    Route::get('reset_password', [AdminLoginController::class, 'resetPassword'])->name('reset_password');
    Route::Post('admin-update-password/{email}', [AdminLoginController::class, 'resetSubmitPassword'])->name('admin_updatePassword');

    Route::middleware(['admin'])->group(function () {
        #admin dashboard
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('home');
        Route::get('profile', [AdminDashboardController::class, 'profile'])->name('admin_profile');
        Route::get('security', [AdminDashboardController::class, 'security'])->name('security');
        Route::post('update-profile', [AdminDashboardController::class, 'updateProfile'])->name('admin_update_profile');
        Route::post('password', [AdminDashboardController::class, 'updatePassword'])->name('admin_update_password');
        Route::get('logout', [AdminDashboardController::class, 'logout'])->name('admin_logout');

        #Get Question Types
        Route::get('get-question-type/index',  [GetEnquiryTypeController::class, 'index'])->name('get-question-type-list');
        Route::post('get-question-type-store', [GetEnquiryTypeController::class, 'store'])->name('get-question-type-store');
        Route::get('get-question-type-edit/{id}', [GetEnquiryTypeController::class, 'edit'])->name('get-question-type-edit');
        Route::post('get-question-type-update', [GetEnquiryTypeController::class, 'update'])->name('get-question-type-update');
        Route::post('get-question-type-status-update/{id}', [GetEnquiryTypeController::class, 'status'])->name('get-question-type-status-update');
        Route::get('get-question-type/delete/{id}', [GetEnquiryTypeController::class, 'delete'])->name('get-question-type.delete');

        #Setting
        Route::get('setting/edit', [SettingController::class, 'edit'])->name('setting-edit');
        Route::post('setting/update', [SettingController::class, 'update'])->name('setting-update');

        #CMS
        Route::get('cms', [CMSController::class, 'index'])->name('cms');
        Route::get('edit-cms/{id}', [CMSController::class, 'edit'])->name('cms-edit');
        Route::post('update-cms', [CMSController::class, 'update'])->name('update-cms');

        #user management
        Route::get('user', [UserController::class, 'index'])->name('user-list');
        Route::post('user/store', [UserController::class, 'store'])->name('user-store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
        Route::post('user/update', [UserController::class, 'update'])->name('user-update');
        Route::post('user/status-update/{id}', [UserController::class, 'status'])->name('user-status-update');
        Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('export', [UserController::class, 'exportUser'])->name('user-export');
        Route::get('user/sample/export', [UserController::class, 'sampleExportCsv'])->name('user-sample-export');
        Route::post('user/import', [UserController::class, 'userBulkStore'])->name('user_bulk_store');
        Route::get('/import', [UserController::class, 'indexImport'])->name('import.index');

        Route::get('home-banner/edit', [HomeBannerController::class, 'edit'])->name('home-banner-edit');
        Route::post('home-banner-update', [HomeBannerController::class, 'update'])->name('home-banner-update');

        Route::get('features/edit', [FeaturesController::class, 'edit'])->name('features-edit');
        Route::post('features-update', [FeaturesController::class, 'update'])->name('features-update');

        Route::get('trunkey-partner/edit', [TrunkeyPartnerController::class, 'edit'])->name('trunkey-partner-edit');
        Route::post('trunkey-partner-update', [TrunkeyPartnerController::class, 'update'])->name('trunkey-partner-update');


        Route::get('excelanace-counting/edit', [ExcellanceCountingController::class, 'edit'])->name('excelanace-counting-edit');
        Route::post('excelanace-counting-update', [ExcellanceCountingController::class, 'update'])->name('excelanace-counting-update');

        Route::get('why-business-choose/edit', [WhyBusinessChooseController::class, 'edit'])->name('why-business-choose-edit');
        Route::post('why-business-choose-update', [WhyBusinessChooseController::class, 'update'])->name('why-business-choose-update');

        Route::get('technologies-used', [TechnologyUsedController::class, 'index'])->name('technologies-used-list');
        Route::get('technologies-used/edit/{id?}', [TechnologyUsedController::class, 'edit'])->name('technologies-used-edit');
        Route::post('technology-store-update', [TechnologyUsedController::class, 'storeUpdate'])->name('technology-store-update');
        Route::post('technologies-used-status-update/{id}', [TechnologyUsedController::class, 'status'])->name('technologies-used-status-update');
        Route::get('technologies-used/delete/{id}', [TechnologyUsedController::class, 'delete'])->name('technologies-used.delete');
        Route::get('technology/image-delete/{id}',[TechnologyUsedController::class, 'deleteImage'])->name('technology-image-delete');
        #Testimonials
        Route::get('testimonials/index', [TestimonialsController::class, 'index'])->name('testimonials-list');
        Route::post('testimonials-store', [TestimonialsController::class, 'store'])->name('testimonials-store');
        Route::get('testimonials-edit/{id}', [TestimonialsController::class, 'edit'])->name('testimonials-edit');
        Route::post('testimonials-update', [TestimonialsController::class, 'update'])->name('testimonials-update');
        Route::post('testimonials-status-update/{id}', [TestimonialsController::class, 'status'])->name('testimonials-status-update');
        Route::get('testimonials/delete/{id}', [TestimonialsController::class, 'delete'])->name('testimonials.delete');



        Route::get('our-people/index', [OurPeopleController::class, 'index'])->name('our-people-list');
        Route::post('our-people-store', [OurPeopleController::class, 'store'])->name('our-people-store');
        Route::get('our-people-edit/{id}', [OurPeopleController::class, 'edit'])->name('our-people-edit');
        Route::post('our-people-update', [OurPeopleController::class, 'update'])->name('our-people-update');
        Route::post('our-people-status-update/{id}', [OurPeopleController::class, 'status'])->name('our-people-status-update');
        Route::get('our-people/delete/{id}', [OurPeopleController::class, 'delete'])->name('our-people.delete');


        Route::get('case-study/index', [CaseStudyController::class, 'index'])->name('case-study-list');
        Route::post('case-study-store', [CaseStudyController::class, 'store'])->name('case-study-store');
        Route::get('case-study-edit/{id}', [CaseStudyController::class, 'edit'])->name('case-study-edit');
        Route::post('case-study-update', [CaseStudyController::class, 'update'])->name('case-study-update');
        Route::post('case-study-status-update/{id}', [CaseStudyController::class, 'status'])->name('case-study-status-update');
        Route::get('case-study/delete/{id}', [CaseStudyController::class, 'delete'])->name('case-study.delete');

        Route::get('leverage-ai/index', [LeverageAiController::class, 'index'])->name('leverage-ai-list');
        Route::post('leverage-ai-store', [LeverageAiController::class, 'store'])->name('leverage-ai-store');
        Route::get('leverage-ai-edit/{id}', [LeverageAiController::class, 'edit'])->name('leverage-ai-edit');
        Route::post('leverage-ai-update', [LeverageAiController::class, 'update'])->name('leverage-ai-update');
        Route::post('leverage-ai-status-update/{id}', [LeverageAiController::class, 'status'])->name('leverage-ai-status-update');
        Route::get('leverage-ai/delete/{id}', [LeverageAiController::class, 'delete'])->name('leverage-ai.delete');

        Route::get('power-packed/index', [PowerPackedController::class, 'index'])->name('power-packed-list');
        Route::post('power-packed-store', [PowerPackedController::class, 'store'])->name('power-packed-store');
        Route::get('power-packed-edit/{id}', [PowerPackedController::class, 'edit'])->name('power-packed-edit');
        Route::post('power-packed-update', [PowerPackedController::class, 'update'])->name('power-packed-update');
        Route::post('power-packed-status-update/{id}', [PowerPackedController::class, 'status'])->name('power-packed-status-update');
        Route::get('power-packed/delete/{id}', [PowerPackedController::class, 'delete'])->name('power-packed.delete');

        Route::get('service-we-offer/index', [ServiceWeOfferController::class, 'index'])->name('service-we-offer-list');
        Route::post('service-we-offer-store', [ServiceWeOfferController::class, 'store'])->name('service-we-offer-store');
        Route::get('service-we-offer-edit/{id}', [ServiceWeOfferController::class, 'edit'])->name('service-we-offer-edit');
        Route::post('service-we-offer-update', [ServiceWeOfferController::class, 'update'])->name('service-we-offer-update');
        Route::post('service-we-offer-status-update/{id}', [ServiceWeOfferController::class, 'status'])->name('service-we-offer-status-update');
        Route::get('service-we-offer/delete/{id}', [ServiceWeOfferController::class, 'delete'])->name('service-we-offer.delete');

        Route::get('client-satisfaction/index', [ClientSatisfationController::class, 'index'])->name('client-satisfaction-list');
        Route::post('client-satisfaction-store', [ClientSatisfationController::class, 'store'])->name('client-satisfaction-store');
        Route::get('client-satisfaction-edit/{id}', [ClientSatisfationController::class, 'edit'])->name('client-satisfaction-edit');
        Route::post('client-satisfaction-update', [ClientSatisfationController::class, 'update'])->name('client-satisfaction-update');
        Route::post('client-satisfaction-status-update/{id}', [ClientSatisfationController::class, 'status'])->name('client-satisfaction-status-update');
        Route::get('client-satisfaction/delete/{id}', [ClientSatisfationController::class, 'delete'])->name('client-satisfaction.delete');





        Route::get('blog-category/index', [BlogCategoryController::class, 'index'])->name('blog-category-list');
        Route::post('blog-category-store', [BlogCategoryController::class, 'store'])->name('blog-category-store');
        Route::get('blog-category-edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog-category-edit');
        Route::post('blog-category-update', [BlogCategoryController::class, 'update'])->name('blog-category-update');
        Route::post('blog-category-status-update/{id}', [BlogCategoryController::class, 'status'])->name('blog-category-status-update');
        Route::get('blog-category/delete/{id}', [BlogCategoryController::class, 'delete'])->name('blog-category.delete');


        Route::get('blog/index', [BlogController::class, 'index'])->name('blog-list');
        Route::get('blog/create', [BlogController::class, 'create'])->name('blog-create');
        Route::post('blog-store', [BlogController::class, 'store'])->name('blog-store');
        Route::get('blog-edit/{id}', [BlogController::class, 'edit'])->name('blog-edit');
        Route::post('blog-update', [BlogController::class, 'update'])->name('blog-update');
        Route::post('blog-status-update/{id}', [BlogController::class, 'status'])->name('blog-status-update');
        Route::get('blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');

        Route::get('advance-technologies/index', [AdvanceTechnologyController::class, 'index'])->name('advance-technologies-list');
        Route::get('advance-technologies/create', [AdvanceTechnologyController::class, 'create'])->name('advance-technologies-create');
        Route::post('advance-technologies-store', [AdvanceTechnologyController::class, 'store'])->name('advance-technologies-store');
        Route::get('advance-technologies-edit/{id}', [AdvanceTechnologyController::class, 'edit'])->name('advance-technologies-edit');
        Route::post('advance-technologies-update', [AdvanceTechnologyController::class, 'update'])->name('advance-technologies-update');
        Route::post('advance-technologies-status-update/{id}', [AdvanceTechnologyController::class, 'status'])->name('advance-technologies-status-update');
        Route::get('advance-technologies/delete/{id}', [AdvanceTechnologyController::class, 'delete'])->name('advance-technologies.delete');

        Route::get('roadmap/index', [RoadMapController::class, 'index'])->name('roadmap-list');
        Route::get('roadmap/create', [RoadMapController::class, 'create'])->name('roadmap-create');
        Route::post('roadmap-store', [RoadMapController::class, 'store'])->name('roadmap-store');
        Route::get('roadmap-edit/{id}', [RoadMapController::class, 'edit'])->name('roadmap-edit');
        Route::post('roadmap-update', [RoadMapController::class, 'update'])->name('roadmap-update');
        Route::post('roadmap-status-update/{id}', [RoadMapController::class, 'status'])->name('roadmap-status-update');
        Route::get('roadmap/delete/{id}', [RoadMapController::class, 'delete'])->name('roadmap.delete');

        Route::get('service/index', [ServiceController::class, 'index'])->name('service-list');
        Route::get('service/create', [ServiceController::class, 'create'])->name('service-create');
        Route::post('service-store', [ServiceController::class, 'store'])->name('service-store');
        Route::get('service-edit/{id}', [ServiceController::class, 'edit'])->name('service-edit');
        Route::post('service-update', [ServiceController::class, 'update'])->name('service-update');
        Route::post('service-status-update/{id}', [ServiceController::class, 'status'])->name('service-status-update');
        Route::get('service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');

        Route::get('our-proven/index', [OurProvenController::class, 'index'])->name('our-proven-list');
        Route::get('our-proven/create', [OurProvenController::class, 'create'])->name('our-proven-create');
        Route::post('our-proven-store', [OurProvenController::class, 'store'])->name('our-proven-store');
        Route::get('our-proven-edit/{id}', [OurProvenController::class, 'edit'])->name('our-proven-edit');
        Route::post('our-proven-update', [OurProvenController::class, 'update'])->name('our-proven-update');
        Route::post('our-proven-status-update/{id}', [OurProvenController::class, 'status'])->name('our-proven-status-update');
        Route::get('our-proven/delete/{id}', [OurProvenController::class, 'delete'])->name('our-proven.delete');

        Route::get('advance-ai/index', [AdvanceAiController::class, 'index'])->name('advance-ai-list');
        Route::get('advance-ai/create', [AdvanceAiController::class, 'create'])->name('advance-ai-create');
        Route::post('advance-ai-store', [AdvanceAiController::class, 'store'])->name('advance-ai-store');
        Route::get('advance-ai-edit/{id}', [AdvanceAiController::class, 'edit'])->name('advance-ai-edit');
        Route::post('advance-ai-update', [AdvanceAiController::class, 'update'])->name('advance-ai-update');
        Route::post('advance-ai-status-update/{id}', [AdvanceAiController::class, 'status'])->name('advance-ai-status-update');
        Route::get('advance-ai/delete/{id}', [AdvanceAiController::class, 'delete'])->name('advance-ai.delete');


        Route::get('industry/index', [IndustryController::class, 'index'])->name('industry-list');
        Route::get('industry/create', [IndustryController::class, 'create'])->name('industry-create');
        Route::post('industry-store', [IndustryController::class, 'store'])->name('industry-store');
        Route::get('industry-edit/{id}', [IndustryController::class, 'edit'])->name('industry-edit');
        // Route::post('industry-update', [IndustryController::class, 'update'])->name('industry-update');
        Route::put('industry/update/{id}', [IndustryController::class, 'update'])->name('industry-update');
        Route::post('industry-status-update/{id}', [IndustryController::class, 'status'])->name('industry-status-update');
        Route::get('industry/delete/{id}', [IndustryController::class, 'delete'])->name('industry-delete');


        Route::get('certificate-software/index', [CertificateSoftwareController::class, 'index'])->name('certificate-software-list');
        Route::post('certificate-software-store', [CertificateSoftwareController::class, 'store'])->name('certificate-software-store');
        Route::get('certificate-software-edit/{id}', [CertificateSoftwareController::class, 'edit'])->name('certificate-software-edit');
        Route::post('certificate-software-update', [CertificateSoftwareController::class, 'update'])->name('certificate-software-update');
        Route::post('certificate-software-status-update/{id}', [CertificateSoftwareController::class, 'status'])->name('certificate-software-status-update');
        Route::get('certificate-software/delete/{id}', [CertificateSoftwareController::class, 'delete'])->name('certificate-software.delete');

        Route::get('we-deliver/index', [WeDeliverController::class, 'index'])->name('we-deliver-list');
        Route::post('we-deliver-store', [WeDeliverController::class, 'store'])->name('we-deliver-store');
        Route::get('we-deliver-edit/{id}', [WeDeliverController::class, 'edit'])->name('we-deliver-edit');
        Route::post('we-deliver-update', [WeDeliverController::class, 'update'])->name('we-deliver-update');
        Route::post('we-deliver-status-update/{id}', [WeDeliverController::class, 'status'])->name('we-deliver-status-update');
        Route::get('we-deliver/delete/{id}', [WeDeliverController::class, 'delete'])->name('we-deliver.delete');

        Route::get('crafting-technology/index', [CraftingTechnologyController::class, 'index'])->name('crafting-technology-list');
        Route::post('crafting-technology-store', [CraftingTechnologyController::class, 'store'])->name('crafting-technology-store');
        Route::get('crafting-technology-edit/{id}', [CraftingTechnologyController::class, 'edit'])->name('crafting-technology-edit');
        Route::post('crafting-technology-update', [CraftingTechnologyController::class, 'update'])->name('crafting-technology-update');
        Route::post('crafting-technology-status-update/{id}', [CraftingTechnologyController::class, 'status'])->name('crafting-technology-status-update');
        Route::get('crafting-technology/delete/{id}', [CraftingTechnologyController::class, 'delete'])->name('crafting-technology.delete');

        Route::get('your-journey/index', [OurJourneyController::class, 'index'])->name('your-journey-list');
        Route::post('your-journey-store', [OurJourneyController::class, 'store'])->name('your-journey-store');
        Route::get('your-journey-edit/{id}', [OurJourneyController::class, 'edit'])->name('your-journey-edit');
        Route::post('your-journey-update', [OurJourneyController::class, 'update'])->name('your-journey-update');
        Route::post('your-journey-status-update/{id}', [OurJourneyController::class, 'status'])->name('your-journey-status-update');
        Route::get('your-journey/delete/{id}', [OurJourneyController::class, 'delete'])->name('your-journey.delete');


        Route::get('fame-mobile-app/index', [FameMobileAppController::class, 'index'])->name('fame-mobile-app-list');
        Route::post('fame-mobile-app-store', [FameMobileAppController::class, 'store'])->name('fame-mobile-app-store');
        Route::get('fame-mobile-app-edit/{id}', [FameMobileAppController::class, 'edit'])->name('fame-mobile-app-edit');
        Route::post('fame-mobile-app-update', [FameMobileAppController::class, 'update'])->name('fame-mobile-app-update');
        Route::post('fame-mobile-app-status-update/{id}', [FameMobileAppController::class, 'status'])->name('fame-mobile-app-status-update');
        Route::get('fame-mobile-app/delete/{id}', [FameMobileAppController::class, 'delete'])->name('fame-mobile-app.delete');

        #Testimonials
        Route::get('trustedby/index', [TrustedByController::class, 'index'])->name('trustedby-list');
        Route::post('trustedby-store', [TrustedByController::class, 'store'])->name('trustedby-store');
        Route::get('trustedby-edit/{id}', [TrustedByController::class, 'edit'])->name('trustedby-edit');
        Route::post('trustedby-update', [TrustedByController::class, 'update'])->name('trustedby-update');
        Route::post('trustedby-status-update/{id}', [TrustedByController::class, 'status'])->name('trustedby-status-update');
        Route::get('trustedby/delete/{id}', [TrustedByController::class, 'delete'])->name('trustedby.delete');

        #Faqs
        Route::get('faq',[FAQController::class,'index'])->name('faq-list');
        // Route::get('faq-create',[FAQController::class,'create'])->name('faq-admin-create');
        Route::post('faq-store',[FAQController::class,'store'])->name('faq-store');
        Route::get('faq-edit/{id}', [FAQController::class, 'edit'])->name('faq-edit');
        Route::post('faq-update',[FAQController::class,'update'])->name('faq-update');
        Route::post('faq-status/{id}',[FAQController::class,'status'])->name('faq-status-update');
        Route::get('faq/delete/{id}', [FAQController::class, 'delete'])->name('faq.delete');
        Route::get('contact-us/index', [ContactUsController::class, 'index'])->name('contact-us');
        #page-banner

        Route::get('page-banner', [PageBannerController::class, 'index'])->name('page-banner');
        Route::post('page-banner-store', [PageBannerController::class, 'store'])->name('page-banner-store');
        Route::get('page-banner-edit/{id}', [PageBannerController::class, 'edit'])->name('page-banner-edit');
        Route::post('page-banner-update', [PageBannerController::class, 'update'])->name('page-banner-update');
        Route::post('page-banner-status-update/{id}', [PageBannerController::class, 'status'])->name('page-banner-status-update');
        Route::get('page-banner/delete/{id}', [PageBannerController::class, 'delete'])->name('page-banner.delete');
    });
});

// website Routes
Route::get('/', [HomeController::class, 'home'])->name('web_home');
// Route::get('/contact-us', [HomeController::class, 'contact'])->name('contactUs');
// Route::get('our-services-details/{id}', [WebOurServicesController::class, 'details'])->name('our-services-details');
// Route::get('frro-optin', [WebOurServicesController::class, 'frroOptin'])->name('frro-optin');
// Route::post('get-report-form', [WebOurServicesController::class, 'reportsubmit'])->name('get-report-form');
// Route::post('contact', [HomeController::class, 'contactsubmit'])->name('contact-us-form');
// Route::get('about', [WebAboutController::class, 'index'])->name('about');
// Route::get('frro-location', [WebFrroLocationController::class, 'index'])->name('frrolocation');
// Route::post('get-enquery-form', [WebFrroLocationController::class, 'getenquerysubmit'])->name('get-enquery-form');
// Route::get('destination-services', [WebDestinationServicesController::class, 'index'])->name('destination-services');
// Route::get('services', [WebOurServicesController::class, 'index'])->name('services');
// Route::get('blog-news', [WebBlogsNewsController::class, 'index'])->name('blog-news');
// Route::get('blog-news-details/{id}', [WebBlogsNewsController::class, 'details'])->name('blog-news-details');
// Route::get('privacy-policy', [WebContentManagementController::class, 'privacypolicy'])->name('privacypolicy');
// Route::get('terms-condition', [WebContentManagementController::class, 'termcondition'])->name('termcondition');
// Route::get('disclaimer', [WebContentManagementController::class, 'disclaimer'])->name('disclaimer');
// Route::get('faq', [WebFaqController::class, 'index'])->name('faq');
// Route::get('abbreviation', [WebAbreviationController::class, 'index'])->name('abbreviation');
// Route::get('video-library', [WebVideoLibraryController::class, 'index'])->name('video-library');
// Route::post('comment-form', [WebVideoLibraryController::class, 'commentsubmit'])->name('comment-form');
// Route::get('expact-service/{slug}', [WebExpactServicesController::class, 'index'])->name('expact-service');
// Route::post('get-expact-form', [WebExpactServicesController::class, 'expactsubmit'])->name('get-expact-form');

