<?php

namespace App\Http\Controllers;

use App\Events\Admins\EziAdminSettingsEvent;
use App\Models\EziNotificationModelr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziNotificationController extends Controller
{
    //
    public function postStoreNotification(Request $request)
    {

        // dd($request->all());

        // Validate the request
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        $txt_author     = $request->author;
        $txt_title      = $request->title;

        // Create the post
        // $post = Post::create([
        //     'author' => $request->input('author'),
        //     'title' => $request->input('title'),
        // ]);

        // Dispatch the event with the post data
        event(new EziAdminSettingsEvent([
            'author' => $txt_author,
            'title' => $txt_title,
        ]));

        // Redirect with success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }


    public function sendNotification($user_id, $user_type, $prod_id, $txt_author, $txt_title, $purose)
    {

        // dd($request->all());

        $results = false;

        $add_notifications = new EziNotificationModelr();

        $add_notifications->user_id = $user_id;
        $add_notifications->user_type = $user_type;
        $add_notifications->prod_id = $prod_id;
        $add_notifications->author = $txt_author;
        $add_notifications->title = $txt_title;
        $add_notifications->purpose = $purose;

        $isSuccess = $add_notifications->save();

        if ($isSuccess) {
            $results = true;
        }

        // Dispatch the event with the post data
        event(new EziAdminSettingsEvent([
            'author' => $txt_author,
            'title' => $txt_title,
        ]));

        // Redirect with success message

        $notification = array(
            'title' => 'Notification',
            'message' => 'Notification sent',
            'success' => $results,
        );

        $selected_item = response()->json($notification);

        return $selected_item;

        // return redirect()->back()->with('success', 'Post created successfully!');
    }


    public function getAllAdminNotificationsjax()
    {

        // dd($request->all());
        $currentUser = Auth::user();


        $myData = EziNotificationModelr::getAllNotificationsCheckOpened(0);

        $notification = array(
            'title' => 'List Of Songs',
            'success' => true,
            'user_type' => $currentUser->user_type,
            'data' => $myData
        );

        $selected_item = response()->json($notification);

        return $selected_item;
    }


    
    public function sendOpendNotification(Request $request,  $id)
    {

        // dd($request->all());

        $getPurpose = $request->purpose;

        $add_notifications = EziNotificationModelr::getSingle($id);

        $add_notifications->opened = 1;
        $isSuccess = $add_notifications->update();

        if ($isSuccess) {
            $notification = array(
                'title' => 'Notification',
                'message' => 'Notification sent',
                'success' => true,
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
        } else {
            $notification = array(
                'title' => 'Notification',
                'message' => 'Notification sent',
                'success' => false,
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
        }
    
    }


    public function getAllNotifications() {

        $currentUser = Auth::user();
        $data['getAllANoti'] = EziNotificationModelr::getAllNotifications();
        $data['getAllOpened'] = EziNotificationModelr::getAllNotificationsCheckOpened(1);
        $data['getAllNotOpen'] = EziNotificationModelr::getAllNotificationsCheckOpened(0);
        
        return view('admin.notifications.list', $data);

    }

           
    public function getAdminNotiDeletAjax( $id) {

        // dd($request->all());

        $db_notifications = EziNotificationModelr::getSingle($id);

        if (!empty($db_notifications)) {
                
            $db_notifications->delete();

            $notification = array(
                'title' => 'Delete Notification',
                'success' => true,
                'data' => $db_notifications
            );

            $selected_item = response()->json($notification);

            return $selected_item;

        } else {
            $notification = array(
                'title' => 'Delete Notification',
                'success' => false,
                'data' => $db_notifications
            );

            $selected_item = response()->json($notification);

            return $selected_item;
        }
        

    }



}
