<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Agent\EziMessagesModel;
use App\Models\Agent\EziReplyMessagesModel;
use App\Models\Tenant\EziRepTenantMessagesModel;
use App\Models\Tenant\EziTenantMessagesModel;
use App\Models\Tenant\EziTenantPropertyModel;
use App\Models\Tenant\EziTenantReplyMessagesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EziTenantMessagesController extends Controller
{
    //
        //
        public function getTenantMessagesPage() {

            $currentUser = Auth::user();
            
            $data['getAllMessages'] = EziTenantMessagesModel::getUserAllMessages(user_id: $currentUser->id, is_opened: 0, is_delete: 0, is_replied: null);
    
            
            $data['getUserMessages'] = EziTenantMessagesModel::getUserAllMessages(user_id: $currentUser->id, is_opened: null, is_delete: null, is_replied: null);
            $data['getTrashedMessages'] = EziTenantMessagesModel::getUserAllMessages(user_id: $currentUser->id, is_opened: null, is_delete: null, is_replied: null);
            $data['getUserRepliedMessages'] = EziRepTenantMessagesModel::getAllRepliedMessages(user_id: $currentUser->id, is_opened: null, is_delete: null, is_replied: 1);
    
            return view('tenants.messages', $data);
    
        }
    
    
        public static function getSingleRepMsg($msg_id) {
    
            $meData = EziRepTenantMessagesModel::getSingleRepeMsg(id: $msg_id);
    
            if (!empty($meData)) {
                
                return $meData->messages;
    
            } else {
                
                return 'no Data';
    
            }
            
        }
    
    
        
        public function getAllTenantMessagesAjax() {
    
            $currentUser = Auth::user();
            
            $db_user_messages = EziTenantMessagesModel::getUserAllMessages(user_id: $currentUser->id, is_opened: null, is_delete: 0, is_replied: null);
            $db_trashed_messages = EziTenantMessagesModel::getUserAllMessages(user_id: $currentUser->id, is_opened: null, is_delete: 1, is_replied: null);

            // dd($db_user_messages);
    
            if (!empty($db_user_messages)) {
                $notification = array(
                    'title' => 'Messages',
                    'success' => true,
                    'data' => array(
                                        'all_messages'=> $db_user_messages, 
                                        'trasehd_messages'=> $db_trashed_messages
                                    )
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            } else {
                $notification = array(
                    'title' => 'Messages',
                    'success' => false,
                    'data' => 'No data'
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            }
            
        }
    
            
        public function getAllTenantRepliedMessagesAjax() {
    
            $currentUser = Auth::user();
            
            $db_user_messages = EziTenantReplyMessagesModel::getAllRepliedMessages(user_id: $currentUser->id, is_opened: null, is_delete: 0, is_replied: 1);
    
            if (!empty($db_user_messages)) {
                $notification = array(
                    'title' => 'Messages',
                    'success' => true,
                    'data' => array('all_messages'=> $db_user_messages)
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            } else {
                $notification = array(
                    'title' => 'Messages',
                    'success' => false,
                    'data' => 'No data'
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            }
            
        }
    
    
        
        public function getSingleTenantMessageAjax($id) {
    
            // dd($id);
     
            $currentUser = Auth::user();
            
            $db_user_messages = EziTenantMessagesModel::getSingleMessage(id: $id);
    
            if (!empty($db_user_messages)) {
    
                $db_user_messages->is_opened = 1;
                $db_user_messages->update();
        
                $notification = array(
                    'title' => 'Messages',
                    'success' => true,
                    'data' => $db_user_messages
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            } else {
                $notification = array(
                    'title' => 'Messages',
                    'success' => false,
                    'data' => 'No data'
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            }
            
        }
    
    
        public function getSingleTenantRepliedMessageAjax($id) {
    
            $currentUser = Auth::user();
            
            $db_user_messages = EziTenantReplyMessagesModel::getSingle(id: $id);
     
            if (!empty($db_user_messages)) {
    
                $db_user_messages->is_opened = 1;
                $db_user_messages->update();
        
                $notification = array(
                    'title' => 'Messages',
                    'success' => true,
                    'data' => $db_user_messages
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            } else {
                $notification = array(
                    'title' => 'Messages',
                    'success' => false,
                    'data' => 'No data'
                );
        
                $selected_item = response()->json($notification);
        
                return $selected_item;
        
            }
            
        }
    
    
        public function getTrashTenantMessageAjax(Request $request, $id) {
    
            // dd($id);
            
            $currentUser = Auth::user();
        
            $txt_purpose = $request->purpose;
    
            
            if ($txt_purpose == 'Inbox') {
                
                $result = $this->trash_in_messages($id);
    
            } elseif ($txt_purpose == 'Reply') {
                
                $result = $this->del_reply_messages($id);
    
            } elseif ($txt_purpose == 'Trash') {
                
            dd($id);
            
                $result = $this->trash_del_messages($id);
               
            }
    
            
            $notification = array(
                'title' => 'Messages',
                'success' => $result,
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }
    
        
        public function getDeleteTenantMessageAjax(Request $request, $id) {
    
            $currentUser = Auth::user();
    
            $txt_purpose = $request->purpose;
    
            
            if ($txt_purpose == 'Inbox') {
             
                $result = $this->trash_in_messages($id);
    
            } elseif ($txt_purpose == 'Reply') {
         
                $result = $this->del_reply_messages($id);
    
            } elseif ($txt_purpose == 'Trash') {
              
                $result = $this->trash_del_messages($id);
               
            } elseif ($txt_purpose == 'Restore') {
                
                
                $result = $this->restore_in_messages($id);
               
            }
    
            
            $notification = array(
                'title' => 'Messages',
                'success' => $result,
            );
    
            $selected_item = response()->json($notification);
    
            return $selected_item;
    
        }
    
    
 
        
        public function trashDelTenantMessagesAjax(Request $request) {
    
            $currentUser = Auth::user();
    
            // dd($request->all());
    
            $txt_purpose = $request->purpose;
    
            $result = false;
    
    
            if ($txt_purpose == 'Inbox') {
                
                foreach ($request->checked_ids as $id) {
                    $result = $this->trash_in_messages($id);
                }
                
            } elseif ($txt_purpose == 'Reply') {
                
                foreach ($request->checked_ids as $id) {
                    $result = $this->del_reply_messages($id);
                }
    
    
            } elseif ($txt_purpose == 'Trash') {
                
                foreach ($request->checked_ids as $id) {
                    $result = $this->trash_del_messages($id);
                }
    
    
            }
    
    
            $notification = array(
                'title' => 'Messages',
                'success' => $result,
            );
    
            $selected_item = response()->json($notification);
    
            // dd($selected_item);
    
    
            return $selected_item;
    
    
        }
    
    
              
        public function postTenantReplyMessageForm(Request $request) {
    
            $currentUser = Auth::user();
            
    
            // dd($request->all());
    
    
            $msg_id     = $request->reply_msg_id;
            $reply_from = $request->reply_reply_from;      
            $reply_to   = $request->reply_to;
            $message    = $request->message;
    
            $db_user_messages = EziTenantMessagesModel::getSingle(id: $msg_id);
    
            if (!empty($db_user_messages)) {
                $db_user_messages->is_replied      = 1;
                $isSuccess                         = $db_user_messages->update();
    
                if (!empty($isSuccess)) {
                    // $db_reply_msg               = new EziTenantReplyMessagesModel();
    
                    $addMessageAgent = $this->saveRepliedMessages(user_id: $currentUser->id, reply_to: $reply_to, msg_id: $msg_id, message: $message, model: new EziTenantReplyMessagesModel());
    
                    if ($addMessageAgent) {
    
                        $addMessageTenant = $this->saveNewMessages(user_id: $currentUser->id, reply_to: $reply_to, message: $message, model: new EziMessagesModel());
    
                        if ($addMessageTenant) {
                            $data['title'] = 'Message';
                            $data['success'] = 'success';
                            $data['message'] = 'Message sent successfully.';
                    
                            return redirect()->back()->with($data);
                        } else {
                            $data['title'] = 'Message';
                            $data['success'] = 'danger';
                            $data['message'] = 'Sorry! Message failed to send.';
                    
                            return redirect()->back()->with($data);
                        }
                    } else {
                        $data['title'] = 'Message';
                        $data['success'] = 'danger';
                        $data['message'] = 'Sorry! Message failed to send.';
                
                        return redirect()->back()->with($data);
                    }
    
                }
            } else {
                $data['title'] = 'Message';
                $data['success'] = 'danger';
                $data['message'] = 'Sorry! Current message was deleted.';
        
                return redirect()->back()->with($data);
            }
            
    
            // $selected_item = response()->json($notification);
    
            // dd($selected_item);
    
        }
    
    
    
    
    
    
    
    
        private function trash_in_messages(int $id) {
            $db_user_messages = EziTenantMessagesModel::getSingle(id: $id);
    
            if (!empty($db_user_messages)) {
    
                $db_user_messages->is_deleted = 1;
                $db_user_messages->update();
        
                return true;
        
            } else {
                
                return false;
        
            }
        }
    
        private function restore_in_messages(int $id) {
            $db_user_messages = EziTenantMessagesModel::getSingle(id: $id);
    
            if (!empty($db_user_messages)) {
    
                $db_user_messages->is_deleted = 0;
                $db_user_messages->update();
        
                return true;
        
            } else {
                
                return false;
        
            }
        }
    
        
        private function del_reply_messages(int $id) {
          
            $result = false;
    
            $db_re_messages = EziTenantReplyMessagesModel::getSingle(id: $id);
              
            $db_user_messages = EziTenantMessagesModel::getSingle(id: $db_re_messages->message_id);
          
            if (!empty($db_user_messages)) {
    
                $isSuccess = $db_re_messages->delete();
    
                if (!empty($isSuccess)) {
                    
                    if (!empty($db_re_messages)) {
                        $db_user_messages->delete();
                        $result = true;
                    }
                    
                    $result = true;
                }
    
                $result = true;
        
            } 
            
            return $result;
    
        }
    
    
        private function trash_del_messages(int $id) {
    
          
            $result = false;
            
            $db_user_messages = EziTenantMessagesModel::getSingle(id: $id);
            $db_re_messages = EziTenantReplyMessagesModel::getSingleRepeMsg(id: $id);
                    
    
            // dd($db_re_messages);
            
    
            if (!empty($db_user_messages)) {
    
                $isSuccess = $db_user_messages->delete();
    
                if (!empty($isSuccess)) {
                    // $db_re_messages = EziTenantReplyMessagesModel::getSingleRepeMsg(id: $id);
                    
                    if (!empty($db_re_messages)) {
                        $db_re_messages->delete();
                        $result = true;
                    }
                    
                    $result = true;
                }
    
                $result = true;
        
            } 
            
            return $result;
        }
    
    
        private function saveRepliedMessages(int $user_id, int $reply_to, int $msg_id, $message, $model) {
    
            $result = false;
                $db_reply_msg                   = $model;
    
                $db_reply_msg->user_id          = $user_id;
                $db_reply_msg->receipient_id    = $reply_to;
                $db_reply_msg->message_id       = $msg_id;
                $db_reply_msg->messages         = $message;
                $db_reply_msg->is_replied       = 1;
    
                $isSuccess                      = $db_reply_msg->save();
    
                if (!empty($isSuccess)) {
                    $result = true;
                }
            
            return $result;
        }
    
        private function saveNewMessages(int $user_id, int $reply_to, $message, $model) {
    
            $result = false;
                $db_reply_msg                   = $model;
    
                $db_reply_msg->user_id          = $user_id;
                $db_reply_msg->receipient_id    = $reply_to;
                $db_reply_msg->messages         = $message;
    
                $isSuccess                      = $db_reply_msg->save();
    
                if (!empty($isSuccess)) {
                    $result = true;
                }
            
            return $result;
        }
    
    
}
