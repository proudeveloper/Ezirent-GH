<?php

use App\Http\Controllers\Admins\EziAdminApplicationController;
use App\Http\Controllers\Admins\EziAdminBookingController;
use App\Http\Controllers\Admins\EziAdminDashboardController;
use App\Http\Controllers\Admins\EziAdminPropertyController;
use App\Http\Controllers\Admins\EziAdminSettingsController;
use App\Http\Controllers\Admins\EziAdminTenantsController;
use App\Http\Controllers\Agent\EziAgentDashboardController;
use App\Http\Controllers\Agent\EziAgentMessagesController;
use App\Http\Controllers\Agent\EziAgentPaymentController;
use App\Http\Controllers\Agent\EziAgentProfileController;
use App\Http\Controllers\Agent\EziAgentPropertiesController;
use App\Http\Controllers\Clients\FrontClientController;
use App\Http\Controllers\EziAuthController;
use App\Http\Controllers\EziETransactionsController;
use App\Http\Controllers\EziNotificationController;
use App\Http\Controllers\EziPaymentAmountController;
use App\Http\Controllers\Tenant\EziTenantMessagesController;
use App\Http\Controllers\Tentant\EziTenantDashboardController;
use App\Http\Controllers\Tentant\EziTenantLoanApplicationController;
use App\Http\Controllers\Tentant\EziTenantProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontClientController::class, 'getFrontPage']);

Route::get('properties', [FrontClientController::class, 'getBrowseOverviewPage']);
Route::get('properties/prop_detail/{id}', [FrontClientController::class, 'getPropertyDetailPage']);

Route::get('login', [FrontClientController::class, 'getLoginPage']);

Route::get('admin_login', [FrontClientController::class, 'getAdminLoginPage']);

Route::post('login_opt_form', [EziAuthController::class, 'postOTPPage']);

Route::post('regiter_opt_form', [EziAuthController::class, 'postRegisterOTPNumber']);

Route::post('verify_otp', [EziAuthController::class, 'postLoginOTPNumber']);

Route::post('admin_login_form', [EziAuthController::class, 'postAdminLogin']);


// Agents Group MiddleWare
Route::middleware('agents')->group(function () {

    Route::get('agent/logout', [EziAuthController::class, 'auth_logout']);

    Route::get('agent/dashboard', [EziAgentDashboardController::class, 'getAgentDashboard']);
    
    Route::get('agent/profile', [EziAgentProfileController::class, 'getAgentProfile']);
    
    // Messaging Section
    Route::get('agent/messages', [EziAgentMessagesController::class, 'getAgentMessagesPage']);
    Route::get('agent/get_all_agent_messages', [EziAgentMessagesController::class, 'getAllAgentMessagesAjax']);
    Route::get('agent/open_message/{id}', [EziAgentMessagesController::class, 'getSingleAgentMessageAjax']);
    Route::get('agent/open_replied_message/{id}', [EziAgentMessagesController::class, 'getSingleAgentRepliedMessageAjax']);
    Route::get('agent/trash_message/{id}', [EziAgentMessagesController::class, 'getTrashAgetMessageAjax']);
    Route::get('agent/perm_delete_message/{id}', [EziAgentMessagesController::class, 'getDeleteAgetMessageAjax']);
    Route::get('agent/get_all_agent_replied_messages', [EziAgentMessagesController::class, 'getAllAgentRepliedMessagesAjax']);
    Route::get('agent/trash_del_agent_messages', [EziAgentMessagesController::class, 'trashDelAgentMessagesAjax']);
    Route::post('agent/agent_reply_message_form', [EziAgentMessagesController::class, 'postAgentReplyMessageForm']);

    
    // Properties Section
    Route::get('agent/properties', [EziAgentPropertiesController::class, 'getAgentProperties']);
    Route::post('add_property_form', [EziAgentPropertiesController::class, 'postAddNewProperty']);
    Route::get('agent/favorite', [EziAgentPropertiesController::class, 'getAgentFavorite']);
    Route::get('agent/add_property', [EziAgentPropertiesController::class, 'getAgentAddProperty']);
    Route::get('edit_property/{id}', [EziAgentPropertiesController::class, 'getAgentEditproperty']);
    Route::get('get_prop_imgs/{id}', [EziAgentPropertiesController::class, 'getAjaxPropertyImages']);
    Route::post('update_property_form', [EziAgentPropertiesController::class, 'postUpdateProperty']);
    Route::get('agent/delete_property/{id}', [EziAgentPropertiesController::class, 'getAgetPropertyDelete']);
    
    // Payment Section
    Route::get('agent/payment', [EziAgentPaymentController::class, 'getAgentPayment']);

    // Invoice Section
    Route::get('agent/invoice', [EziAgentPaymentController::class, 'getAgentInvoice']);

});




// Tenants Group MiddleWare
Route::middleware('tenants')->group(function () {

    Route::get('tenant/logout', [EziAuthController::class, 'auth_logout']);


    Route::get('tenant/dashboard', [EziTenantDashboardController::class, 'getTenantDashboard']);
    
    Route::get('tenant/apply', [EziTenantLoanApplicationController::class, 'getApplicationPage']);
    Route::get('tenant/list', [EziTenantLoanApplicationController::class, 'getApplicationLoanListPage']);
    Route::get('tenant/loan_details', [EziTenantLoanApplicationController::class, 'getLoanDetailsPage']);

    Route::get('tenant/loan_calc', [EziTenantLoanApplicationController::class, 'getLoanCalcPage']);

    Route::get('tenant/prop_list', [EziTenantLoanApplicationController::class, 'getPropListPage']);
    Route::get('tenant/prop_list_ajax', [EziTenantLoanApplicationController::class, 'getPropListAllAjax']);
    
    
    Route::get('tenant/profile', [EziTenantProfileController::class, 'getUserProfileInfo']);
    Route::post('tenant/send_add_user_img', [EziTenantProfileController::class, 'getChangeUserImg']);

    // Rent Application Section
    Route::get('tenant/personal_info', [EziTenantProfileController::class, 'getUserPersonalIfo']);
    Route::get('tenant/get_rentDetail_info', [EziTenantProfileController::class, 'getUserApplicationInfo']);
    Route::post('tenant/personal_info_form', [EziTenantProfileController::class, 'savePeronalInfoDetails']);
    Route::post('tenant/emergency_contact_form', [EziTenantProfileController::class, 'saveEmergencyInfoDetails']);
    Route::post('tenant/employment_form', [EziTenantProfileController::class, 'saveEmploymentInfoDetails']);
    Route::post('tenant/accomodation_form', [EziTenantProfileController::class, 'saveAccomodationInfoDetails']);
    Route::post('tenant/landlord_info_form', [EziTenantProfileController::class, 'saveLandLordInfoDetails']);
    Route::post('tenant/document_verification_form', [EziTenantProfileController::class, 'saveDocVerificationDetails']);
    Route::post('tenant/document_selfie_form', [EziTenantProfileController::class, 'saveSelfieImg']);


    // Finance Section
    Route::get('tenant/getFinanceAidInfo', [EziTenantProfileController::class, 'getUserApplicationInfoDetails']);


        
    // Messaging Section
    Route::get('tenant/messages', [EziTenantMessagesController::class, 'getTenantMessagesPage']);
    Route::get('tenant/get_all_tenant_messages', [EziTenantMessagesController::class, 'getAllTenantMessagesAjax']);
    Route::get('tenant/open_message/{id}', [EziTenantMessagesController::class, 'getSingleTenantMessageAjax']);
    Route::get('tenant/open_replied_message/{id}', [EziTenantMessagesController::class, 'getSingleTenantRepliedMessageAjax']);
    Route::get('tenant/trash_message/{id}', [EziTenantMessagesController::class, 'getTrashTenantMessageAjax']);
    Route::get('tenant/perm_delete_message/{id}', [EziTenantMessagesController::class, 'getDeleteTenantMessageAjax']);
    Route::get('tenant/get_all_tenant_replied_messages', [EziTenantMessagesController::class, 'getAllTenantRepliedMessagesAjax']);
    Route::get('tenant/trash_del_Tenant_messages', [EziTenantMessagesController::class, 'trashDelTenantMessagesAjax']);
    Route::post('tenant/tenant_reply_message_form', [EziTenantMessagesController::class, 'postTenantReplyMessageForm']);


    
    // Settings Section
    Route::get('tenant/get_payment_amount', [EziPaymentAmountController::class, 'getPaymentAmount']);
    
 
});





// Admins Group MiddleWare
Route::middleware('admins')->group(function () {

    Route::get('admin/logout', [EziAuthController::class, 'auth_logout']);

    // Applications Section
    Route::get('admin/dashboard', [EziAdminDashboardController::class, 'getAdminDashboard']);
    Route::get('admin/messages', [EziAdminDashboardController::class, 'getAdminMessages']);
    Route::get('admin/application', [EziAdminApplicationController::class, 'getAdminApplication']);
    Route::get('admin/aplication_detail/{id}', [EziAdminApplicationController::class, 'getAdminApplicationDetails']);
    Route::get('admin/aplication_det_ajax/{id}', [EziAdminApplicationController::class, 'getAdminApplicationDetailsAjax']);
    Route::get('admin/send_payed_info_status/{id}', [EziAdminApplicationController::class, 'sendAdminApplicationPayedAjax']);

    Route::get('admin/applcation_processing/{id}', [EziAdminApplicationController::class, 'getAdminApplicationProcessingAjax']);
    Route::get('admin/delete_application/{id}', [EziAdminApplicationController::class, 'getAdminApplicationDeletAjax']);

    // Properties Section
    Route::get('admin/properties', [EziAdminPropertyController::class, 'getAdminProperties']);
    Route::get('admin/getEditProperty/{id}', [EziAdminPropertyController::class, 'getSinglePropertyAjax']);
    Route::get('admin/sendPropertyPublish/{id}', [EziAdminPropertyController::class, 'sendPropertyStatusAjax']);
    Route::get('admin/property_detail/{id}', [EziAdminPropertyController::class, 'getPropertyDetailPage']);
    Route::get('admin/delete_property/{id}', [EziAdminPropertyController::class, 'getAdminPropertyDeletAjax']);

    // View Booking Section
    Route::get('admin/view_booking', [EziAdminBookingController::class, 'getAdminViewBooking']);
    Route::get('admin/delete_booking/{id}', [EziAdminBookingController::class, 'getAdminBookingDeletAjax']);
    
    // Tenants Section
    Route::get('admin/tenants', [EziAdminTenantsController::class, 'getAdminTenantsList']);
    Route::get('admin/getEdithUsers/{id}', [EziAdminTenantsController::class, 'getAdminUsersAjax']);
    Route::get('admin/sendUserStausState/{id}', [EziAdminTenantsController::class, 'sendUserStatusAjax']);
    Route::get('admin/delete_user/{id}', [EziAdminTenantsController::class, 'getAdminUserDeletAjax']);
    
    // Landlords Section
    Route::get('admin/landlords', [EziAdminTenantsController::class, 'getAdminLandlordsList']);
      
    // Agents Section
    Route::get('admin/agents', [EziAdminTenantsController::class, 'getAdminAgentsList']);
    

    // Settings Section
    Route::get('admin/settings', [EziAdminDashboardController::class, 'getAdminSettingsPage']);
    Route::get('admin/get_property_type_data', [EziAdminSettingsController::class, 'getAdminPropertyTypesAjax']);
    Route::get('admin/update_property_type_data/{id}', [EziAdminSettingsController::class, 'updateAdminPropertyTypesAjax']);
    Route::get('admin/delete_property_type/{id}', [EziAdminSettingsController::class, 'deleteAdminPropertyTypesAjax']);
    Route::get('admin/single_property_type/{id}', [EziAdminSettingsController::class, 'singleAdminPropertyTypeAjax']);
    Route::get('admin/sendPropTypeStausState/{id}', [EziAdminSettingsController::class, 'sendUserStatusAjax']);
    Route::post('admin/add_new_property_cat_form', [EziAdminSettingsController::class, 'postNewPropTypeFormAjax']);


    // Notification Section
    Route::post('admin/send_my_notifications', [EziNotificationController::class, 'postStoreNotification']);
    Route::get('admin/get_rentDetail_info', [EziAdminApplicationController::class, 'getAllAdminApplicationsAjax']);
    Route::get('admin/get_all_notifications', [EziNotificationController::class, 'getAllAdminNotificationsjax']);
    Route::get('admin/getTrack', [EziETransactionsController::class, 'getCheckOutPayment']);
    Route::get('admin/open_notification/{id}', [EziNotificationController::class, 'sendOpendNotification']);
    Route::get('admin/get_notifications', [EziNotificationController::class, 'getAllNotifications']);
    Route::get('admin/delete_notification/{id}', [EziNotificationController::class, 'getAdminNotiDeletAjax']);
    
    
});




// Tenants Group MiddleWare
Route::middleware('landlords')->group(function () {

    Route::get('agent/logout', [EziAuthController::class, 'auth_logout']);


    Route::get('agent/dashboard', [EziAgentDashboardController::class, 'getAgentDashboard']);
    
    Route::get('agent/profile', [EziAgentProfileController::class, 'getAgentProfile']);
    
    Route::get('agent/properties', [EziAgentPropertiesController::class, 'getAgentProperties']);
    Route::get('agent/favorite', [EziAgentPropertiesController::class, 'getAgentFavorite']);
    Route::get('agent/add_property', [EziAgentPropertiesController::class, 'getAgentAddProperty']);
    
    Route::get('agent/payment', [EziAgentPaymentController::class, 'getAgentPayment']);
    Route::get('agent/invoice', [EziAgentPaymentController::class, 'getAgentInvoice']);
    

});
