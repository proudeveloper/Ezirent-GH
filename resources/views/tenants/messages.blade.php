
@php
    use Carbon\Carbon;
@endphp


@extends('tenants.layouts.app')


@section('style')


    <!-- Pagination CSS -->
    <link rel="stylesheet" href="{{ url('public/assets/css/pagination.css') }}"> 

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ url('public/agents/assets/css/messages.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ url('public/admins/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ url('public/admins/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

 
     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ url('public/admins/assets/js/config.js') }}"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('public/assets/dist/rating/jquery.rateyo.min.css') }}"> 

    <link rel="stylesheet" href="{{ url('public/assets/richtexteditor/rte_theme_default.css') }}" />


    <link rel="stylesheet" href="{{ url('public/assets/css/mytexteditor.css') }}" />

    <style type="text/css">
          ul, li {
          list-style: none;
          }

          #wrapper {
          width: 900px;
          margin: 20px auto;
          }

          .data-container {
          margin-top: 20px;
          margin-bottom: 50px;
          }

          .data-container ul {
          padding: 0;
          margin: 0;
          }

          .data-container li {
          margin-bottom: 5px;
          padding: 5px 10px;
          /* background: #eee;
          color: #666; */
          }

          .paginationjs {
          padding: 5px 10px;
          }

          .paginationjs-pages li{
          height: 30px;
          width: 35px;
          /* background-color: var(--main-color); */
          margin-bottom: 0;
          } 
          /* input-border */
          /* .paginationjs-pages .active a {
          background-color: #5905d2;
          margin-bottom: 0;
          height: 50px;
          }  */
          /*
          .paginationjs-pages li.paginationjs-prev{
          background-color: var(--main-color);
          margin-bottom: 0;
          }  */

          /* .paginationjs-pages li.disabled{
          height: 30px;
          width: 30px;
          background-color: var(--input-border);
          margin-bottom: 0;
          }  */


          /* .paginationjs-pages li.paginationjs-next{
          background-color: var(--main-color);
          margin-bottom: 0;
          } 
          

          .paginationjs-pages li.paginationjs-next .disabled{
          background-color: var(--input-border);
          margin-bottom: 0;
          }  */

     </style>



{{-- <div class="paginationjs-pages">
  <ul>
       <li class="paginationjs-prev J-paginationjs-previous " data-num="1" title="Previous page"><a>‹</a></li>
       <li class="paginationjs-prev disabled "><a>‹</a></li>
       <li class="paginationjs-page J-paginationjs-page  active" data-num="1"><a>1</a></li>
       <li class="paginationjs-page J-paginationjs-page " data-num="2"><a>2</a></li>
       <li class="paginationjs-next J-paginationjs-next " data-num="2" title="Next page"><a>›</a></li>
  </ul>
</div> --}}


@endsection

@section('content')
    
    <div class="main_content">
        <div class="page-content">

            <!-- Start Container -->
            <div class="container-xxl mt-2">               

               <div class="row m-2">

                    @if (session('title') == 'Message')
                         @include('tenants.layouts._my_alerts')
                    @endif
             
               </div>

                 <div class="row g-1 mb-3">

                      <!-- Left Pane start -content-->
                      <div class="col-xxl-2">
                           <div class="offcanvas-xxl offcanvas-start h-100" tabindex="-1" id="EmailSidebaroffcanvas" aria-labelledby="EmailSidebaroffcanvasLabel">
                                <div class="card h-100 mb-0" data-simplebar="">
                                     <div class="card-body">
                                          {{-- <div class="d-grid">
                                               <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compose-modal">Compose</button>
                                          </div> --}}

                                          <div class="nav flex-column mt-3" id="email-tab" role="tablist" aria-orientation="vertical">
                                               <a class="nav-link px-0 py-1 tab_btn active show" id="email-inbox-tab" data-tab_btn_msg="Inbox" data-bs-toggle="pill" href="#email-inbox" role="tab" aria-controls="email-inbox" aria-selected="true">
                                                    <span class="text-danger fw-bold">
                                                         <i class="bx bxs-inbox fs-16 me-2 align-middle"></i> Inbox
                                                         <span class="badge badge-soft-danger float-end ms-2">{{ $getAllMessages->count() }}</span>
                                                    </span>
                                               </a>

                                               <a class="nav-link px-0 py-1 tab_btn" id="email-sent-tab" data-tab_btn_msg="Reply" data-bs-toggle="pill" href="#email-sent" role="tab" aria-controls="email-sent" aria-selected="false">
                                                    <i class="bx bx-send fs-16 align-middle me-2"></i>Sent
                                               </a>

                                               <a class="nav-link px-0 py-1 tab_btn" id="email-trash-tab" data-tab_btn_msg="Trash" data-bs-toggle="pill" href="#email-trash" role="tab" aria-controls="email-trash" aria-selected="false">
                                                    <i class="bx bx-trash fs-16 align-middle me-2"></i>Trashed
                                               </a>

                                          </div>

                                     </div>
                                </div>
                           </div>
                      </div>
                      <!-- Left Pane start -content-->

                      <!-- Right Pane start -content-->
                      <div class="col-xxl-10">
                           <div class="card position-relative overflow-hidden" style="height: 100%;">

                                <!-- Header Buttons start -content-->
                                <div class="p-3">
                                     <div class="d-flex flex-wrap gap-2">
                                          <button class="btn btn-light d-xxl-none d-flex align-items-center px-2 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#EmailSidebaroffcanvas" aria-controls="EmailSidebaroffcanvas">
                                               <i class="bx bx-menu fs-18"></i>
                                          </button>

                                          <!-- archive, spam & delete -->
                                          <div class="btn-group">
                                                  {{-- <input type="checkbox" name="select_all" id="checkAllBoxes"> --}}
                                                  <div data-bs-toggle="tooltip" class="btn btn-light" title="Select All">
                                                       <input type="checkbox" id="checkAllBoxes" style="width: 20px;">
                                                   </div>
                                              
                                                  <button type="button" class="btn btn-light delete_all_messages_btn" id="all" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                       <i class="bx bx-trash fs-18"></i>
                                                  </button>
                                          </div>

                                     </div>
                                </div>
                                <!-- Header Buttons end -content-->

                                <div class="tab-content pt-0" id="email-tabContent">
                                        <!-- Inbox Messages start -content-->
                                        <div class="tab-pane fade active show" id="email-inbox" role="tabpanel" aria-labelledby="email-inbox-tab" style="height: 600px;">
                                             <div>
                                             <!-- Header Tabs start -content-->
                                                  <ul class="nav nav-tabs nav-justified">
                                                       <li class="nav-item">
                                                            <a href="#primaryMail" data-bs-toggle="tab" aria-expanded="true" class="nav-link d-flex align-items-center active">
                                                                 <span class="me-2"><i class="bx bxs-inbox fs-18"></i></span>
                                                                 <span class="d-none d-md-block">Primary</span>
                                                            </a>
                                                       </li> <!-- end nav item -->
                                                       
                                                  </ul> <!-- end nav tabs -->

                                                  <!-- Inbox Mesages start -content-->
                                                  <div class="tab-content text-muted pt-0">
                                                       <div class="tab-pane show active" id="primaryMail">
                                                            <ul class="message-list mb-0">
                                                                 <div class="data-container"></div>
                                                                 <div id="pagination-inbox_messages_div" class="message_divs" data-message_div="inbox"></div>
                                                                 
                                                            </ul> <!-- end message list -->
                                                       </div> <!-- end pimary mail tab pane -->
                                                       
                                                  </div> <!-- end tab content -->
                                             </div>
                                        </div>
                                        <!-- Header Tabs end -content-->

                                        <!-- Replied Messages start -content-->
                                        <div class="tab-pane fade" id="email-sent" role="tabpanel" aria-labelledby="email-sent-tab" style="height: 600px;">
                                             <div>
                                             <!-- Header Tabs start -content-->
                                                  <ul class="nav nav-tabs nav-justified">
                                                       <li class="nav-item">
                                                            <a href="#primaryMail" data-bs-toggle="tab" aria-expanded="true" class="nav-link d-flex align-items-center active">
                                                                 <span class="me-2"><i class="bx bx-send fs-18"></i></span>
                                                                 <span class="d-none d-md-block">Sent Messages</span>
                                                            </a>
                                                       </li> <!-- end nav item -->
                                                       
                                                  </ul> <!-- end nav tabs -->

                                                  <!-- Sent Mesages start -content-->
                                                  <div class="tab-content text-muted pt-0">
                                                       <div class="tab-pane show active" id="primaryMail">
                                                            <ul class="message-list mb-0">
                                                            <div class="data-container"></div>
                                                            <div id="pagination-sent_messages_div" class="message_divs" data-message_div="sent"></div>
                                                           
                                                            </ul> <!-- end message list -->
                                                       </div> <!-- end pimary mail tab pane -->
                                                  
                                                  </div> <!-- end tab content -->
                                             </div>
                                        </div>
                                        <!-- Header Tabs end -content-->


                                        <!-- Trashed Messages start -content-->
                                        <div class="tab-pane fade" id="email-trash" role="tabpanel" aria-labelledby="email-trash-tab" style="height: 600px;">
                                             <div>
                                             <!-- Header Tabs start -content-->
                                                  <ul class="nav nav-tabs nav-justified">
                                                       <li class="nav-item">
                                                            <a href="#primaryMail" data-bs-toggle="tab" aria-expanded="true" class="nav-link d-flex align-items-center active">
                                                                 <span class="me-2"><i class="bx bxs-trash fs-18"></i></span>
                                                                 <span class="d-none d-md-block">Trashed Messages</span>
                                                            </a>
                                                       </li> <!-- end nav item -->
                                                       
                                                  </ul> <!-- end nav tabs -->

                                                  <!-- Trash Mesages start -content-->
                                                  <div class="tab-content text-muted pt-0">
                                                       <div class="tab-pane show active" id="primaryMail">
                                                            <ul class="message-list mb-0">
                                                            <div class="data-container"></div>
                                                            <div id="pagination-tashed_messages_div" class="message_divs" data-message_div="trash"></div>
                                                            
                                                            </ul> <!-- end message list -->
                                                       </div> <!-- end pimary mail tab pane -->
                                                  
                                                  </div> <!-- end tab content -->
                                             </div>
                                        </div>

                                </div> <!-- end tab-content-->

                                <!-- Pagination end -content-->

                                 <!-- START DETAILED MESSAGE Snow-editor-->

                                 <!-- <div class="show_read_message"></div> -->
                                 @foreach ($getUserMessages as $inbox_message)
                                   @php
                                   
                                        $db_reply_msg =  App\Http\Controllers\Tenant\EziTenantMessagesController::getSingleRepMsg($inbox_message->id);

                                   @endphp
                                     
                                   <div class="offcanvas offcanvas-end mail-read position-absolute shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="email-read{{ $inbox_message->id }}" aria-labelledby="email-readLabel">
                                        <div class="offcanvas-header">
                                             <div class="d-flex gap-2 align-items-center w-50">
                                                  <a href="#" role="button" id="close_canvas_btn" data-bs-dismiss="offcanvas" aria-label="Close">
                                                       <i class="bx bx-arrow-back fs-18 align-middle"></i>
                                                  </a>
                                                  <h5 class="offcanvas-title text-truncate w-50" id="email-readLabel">Message</h5>
                                             </div>

                                             <div class="ms-auto">
                                                  <!-- archive, spam & delete -->
                                                  <div class="btn-group">
                                                       <button type="button" id="{{ $inbox_message->id }}" class="btn btn-light trash_message_btn" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                            <i class="bx bx-trash fs-18"></i>
                                                        </button>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="offcanvas-body p-0 h-100" data-simplebar>
                                             <div class="px-3">
                                                  <div class="mt-2">
                                                       <hr />

                                                       <div class="d-flex mb-4 mt-1">
                                                            <img class="me-2 rounded-circle avatar-sm" src="{{ $inbox_message->getUserImage() }}" alt="Generic placeholder image">
                                                            <div class="flex-grow-1">
                                                                 <span class="float-end">{{ $inbox_message->created_at->toDayDateTimeString() }}</span>
                                                                 <h6 class="m-0">{{ $inbox_message->f_name.' '.$inbox_message->l_name }}</h6>
                                                                 <small class="text-muted">From: {{ $inbox_message->email }}</small>
                                                            </div>
                                                       </div>

                                                       <div class="text-muted">
                                                            <p>{{ $inbox_message->messages }}</p>
                                                       </div>

                                                       <hr />

                                                  </div> <!-- card-box -->
                                             </div>
                                        </div>

                                        
                                        @if ($inbox_message->is_replied == 0)
                                             <div class="p-3">
                                                  <form action="{{ url('tenant/tenant_reply_message_form') }}" method="POST" id="/tenant_reply_message_form/">
                                                       @csrf
                                                       <input type="hidden" name="reply_from" value="{{ $inbox_message->receipient_id }}">
                                                       <input type="hidden" name="reply_to" value="{{ $inbox_message->user_id }}">
                                                       <input type="hidden" name="reply_msg_id" value="{{ $inbox_message->id }}">
                                                       <div class="d-flex">
                                                            <img class="me-2 rounded-circle avatar-sm" src="{{ $inbox_message->getUserImage() }}" alt="Generic placeholder image">
                                                            <div class="flex-grow-1">
                                                                 <div class="mb-2">
                                                                      <textarea  name="message" id="textArea" class="form-control"></textarea>
                                                                      
                                                                 </div>
                                                            </div>
                                                       </div>

                                                       <div class="text-end">
                                                            <button type="submit" class="btn btn-primary width-sm" data-bs-dismiss="offcanvas" aria-label="Close">Send</button>
                                                       </div>
                                                  </form>
                                             </div>
                                          
                                        @else
                                             <div class="p-3">
                                                  <div class="mb-5">
                                                       <h6>Message Sent</h6>
                                                       <hr>
                                                       <textarea id="textArea" disabled readonly>{{ $db_reply_msg }}</textarea>
                                                       {{-- <p>{{ $db_reply_msg }}</p> --}}
                                                       <hr>
                                                  </div>
                                             </div>
                                        @endif
                                            
                                   </div>

                                 @endforeach


                                 <!-- <div class="show_read_replied_message"></div> -->
                                 @foreach ($getUserRepliedMessages as $reply_message)
                                     
                                   <div class="offcanvas offcanvas-end mail-read position-absolute shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="replied-read{{ $reply_message->id }}" aria-labelledby="replied-readLabel">
                                             <div class="offcanvas-header">
                                                  <div class="d-flex gap-2 align-items-center w-50">
                                                       <a href="#" role="button" data-bs-dismiss="offcanvas" aria-label="Close">
                                                            <i class="bx bx-arrow-back fs-18 align-middle"></i>
                                                       </a>
                                                       <h5 class="offcanvas-title text-truncate w-50" id="replied-readLabel">Message</h5>
                                                  </div>

                                                  <div class="ms-auto">
                                                       <!-- archive, spam & delete -->
                                                       <div class="btn-group">
                                                            <button type="button" id="{{ $reply_message->id }}" class="btn btn-light perm_del_reply_message_btn" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                                 <i class="bx bx-trash fs-18"></i>
                                                             </button>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="offcanvas-body p-0 h-100" data-simplebar>
                                                  <div class="px-3">
                                                       <div class="mt-2">
                                                            <hr />

                                                            <div class="d-flex mb-4 mt-1">
                                                                 <img class="me-2 rounded-circle avatar-sm" src="{{ $reply_message->getUserImage() }}" alt="Generic placeholder image">
                                                                 <div class="flex-grow-1">
                                                                      <span class="float-end">{{ $reply_message->created_at->toDayDateTimeString() }}</span>
                                                                      <h6 class="m-0">{{ $reply_message->f_name. ' '.$reply_message->l_name }}</h6>
                                                                      <small class="text-muted">To: {{ $reply_message->email }}</small>
                                                                 </div>
                                                            </div>

                                                            <div class="text-muted">
                                                                 <p>{{ $reply_message->messages }}</p>
                                                            </div>

                                                            <hr />

                                                       </div> <!-- card-box -->
                                                  </div>
                                             </div>
                                   </div>

                                 @endforeach


                                 <!--<div class="show_trashed_replied_message"></div> -->
                                 @foreach ($getTrashedMessages as $trashed_message)
                                   @php
                                   
                                        $db_reply_msg =  App\Http\Controllers\Tenant\EziTenantMessagesController::getSingleRepMsg($trashed_message->id);

                                   @endphp
                              
                                   <div class="offcanvas offcanvas-end mail-read position-absolute shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="trashed-read{{ $trashed_message->id }}" aria-labelledby="trashed-readLabel">
                                        <div class="offcanvas-header">
                                             <div class="d-flex gap-2 align-items-center w-50">
                                                  <a href="#" role="button" data-bs-dismiss="offcanvas" aria-label="Close">
                                                       <i class="bx bx-arrow-back fs-18 align-middle"></i>
                                                  </a>
                                                  <h5 class="offcanvas-title text-truncate w-50" id="trashed-readLabel">Message</h5>
                                             </div>

                                             <div class="ms-auto">
                                                  <!-- archive, spam & delete -->
                                                  <div class="btn-group">
                                                       <button type="button" id="{{ $trashed_message->id }}" class="btn btn-light perm_delete_message_btn" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                                            <i class="bx bx-trash fs-18"></i>
                                                        </button>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="offcanvas-body p-0 h-100" data-simplebar>
                                             <div class="px-3">
                                                  <div class="mt-2">
                                                       <hr />

                                                       <div class="d-flex mb-4 mt-1">
                                                            <img class="me-2 rounded-circle avatar-sm" src="{{ $trashed_message->getUserImage() }}" alt="Generic placeholder image">
                                                            <div class="flex-grow-1">
                                                                 <span class="float-end">{{ $trashed_message->created_at->toDayDateTimeString() }}</span>
                                                                 <h6 class="m-0">{{ $trashed_message->f_name.' '.$trashed_message->l_name }}</h6>
                                                                 <small class="text-muted">From: {{ $trashed_message->email }}</small>
                                                            </div>
                                                       </div>

                                                       <div class="text-muted">
                                                            <p>{{ $trashed_message->messages }}</p>
                                                       </div>

                                                       <hr />

                                                  </div> <!-- card-box -->
                                             </div>
                                        </div>

                                        
                                        @if ($trashed_message->is_replied == 1)
                                             <div class="p-3">
                                                  <div class="mb-5">
                                                       <h6>Message Sent</h6>
                                                       <hr>
                                                       <textarea id="textArea" disabled readonly>{{ $db_reply_msg }}</textarea>
                                                       {{-- <p>{{ $db_reply_msg }}</p> --}}
                                                       <hr>
                                                  </div>
                                             </div>
                                        @endif
                                            
                                   </div>

                                 @endforeach

                                
                                <!-- END DETAILED MESSAGE Snow-editor-->

                           </div> <!-- end card -->

                         
                      </div> 
                      
                 </div> <!-- end row -->
            </div>
            <!-- End Container Fluid -->
       </div>
    </div>



    
          <!-- Modal -->
          <div class="modal fade compose-mail" id="compose-modal" tabindex="-1" aria-labelledby="compose-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                      <div class="modal-header overflow-hidden bg-primary p-2">
                           <h5 class="modal-title text-white" id="compose-modalLabel">New Message</h5>
                           <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body p-4">
                           <div class="overflow-hidden">

                                <div class="mb-2">
                                     <input type="email" class="form-control" id="toEmail" placeholder="To: ">
                                </div>
                                <div class="mb-2">
                                     <input type="text" class="form-control" id="subject" placeholder="Subject ">
                                </div>

                                {{-- <form role="form">
                                    <div class="form-group">
                                      <input type="input" class="form-control input-m" id="text-search" placeholder="Type your search character">
                                    </div>
                                </form>
                                <div id="filter"></div> --}}


                                <div class="my-2">
                                     <div id="snow-editor2" style="height: 200px;"></div>
                                </div>

                                <div class="d-flex float-end">
                                     <div class="dropdown me-1">
                                          <a href="javascript:void(0);" class="dropdown-toggle arrow-none btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                               <i class="bx bx-dots-vertical-rounded fs-18"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-up">
                                               <a href="javascript:void(0);" class="dropdown-item">Default to full screen</a>
                                               <div class="dropdown-divider"></div>
                                               <a href="javascript:void(0);" class="dropdown-item">Label</a>
                                               <a href="javascript:void(0);" class="dropdown-item">Palin text mode</a>
                                               <div class="dropdown-divider"></div>
                                               <a href="javascript:void(0);" class="dropdown-item">Smart Compose Feedback</a>
                                          </div>
                                     </div>
                                     <a href="javascript: void(0);" class="btn btn-light compose-close"><i class="bx bxs-trash fs-18"></i></a>
                                </div>
                                <div>
                                     <a href="javascript: void(0);" class="btn btn-primary">Send</a>
                                </div>

                           </div>
                      </div>
                 </div>
            </div>
       </div>
       <!-- data-bs-scroll="true" data-bs-backdrop="false" -->

@endsection


@section('script')

    <script src="{{ url('public/agents/assets/js/messages.js') }}"></script>

        
    <!-- Messages Data Js -->
    <script src="{{ url('public/tenants/assets/js/tenant_messages_data.js') }}"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="{{ url('public/admins/assets/js/app.js') }}"></script>
    
    {{-- <script src="{{ url('public/assets/js/prop_details.js') }}"></script> --}}


    <!-- Page Js -->
    <script src="{{ url('public/admins/assets/js/pages/app-email.js') }}"></script>

    <!-- Pagination Js -->
    <script src="{{ url('public/assets/js/pagination.min.js') }}"></script>

    <!-- Rich Text Js -->
    {{-- <script type="text/javascript" src="{{ url('public/assets/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/assets/richtexteditor/plugins/all_plugins.js') }}"></script> --}}


    
    {{-- <script src="{{ url("https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/tinymce.min.js")}}"></script>
    <script src="{{ url("https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js")}}"></script>
 --}}

    <script type="text/javascript" src="{{ url('public/assets/js/mytexteditor.js') }}"></script>


@endsection