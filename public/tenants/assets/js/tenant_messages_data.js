      
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$(document).ready(function () {

    var msg_btn = '';

    loadTableMesages();
    function loadTableMesages() {

        $(function() {

            // INBOX
            (function(name) {
                var container = $('#pagination-' + name);
                if (!container.length) return;
                var sources = function () {
                var result = [];

                var myData = loadMessages();


                myData.forEach(item => {
                    result.push(`<li class="${item.is_opened == 0 ? 'unread' : ''}">
                    <div class="col-mail col-mail-1">
                        <div class="checkbox-wrapper-mail">
                            <input type="checkbox" id="${item.id}" class="chk_inbox">
                            <label class="form-label" for="${item.id}"></label>
                        </div>
                        ${item.is_replied == 1 ? '<i class="fa fa-reply" aria-hidden="true"></i>' : ''}
                        <a data-bs-toggle="offcanvas" id="${item.id}" href="#email-read${item.id}" class="title open_message_btn">${item.f_name+ ' '+item.l_name}</a>
                    </div>
                    <div class="col-mail col-mail-2"  id="${item.id}">
                        <div class="row d-flex justify-content-start">
                            <div id="${item.id}" class="col-11 open_message_btn">
                                <a data-bs-toggle="offcanvas" id="${item.id}" href="#email-read${item.id}" class="subject open_message_btnss${item.id}">
                                    ${item.messages}
                                    
                                </a>
                                <div class="date">${changeOnlyTimeFormat(item.created_at)}</div>
                            </div>
                            <div class="col-1 float-right"><i class="fa fa-trash trash_message_btn fs-4" id="${item.id}" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </li>`);

                });

                return result;
                }();

                var options = {
                dataSource: sources,
                pageSize: 10,
                showGoInput: true,
                showGoButton: true,
                showNavigator: true,
                showSizeChanger: true,
                formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> of <%= totalNumber %> items',
                callback: function (response, pagination) {
                    // window.console && console.log(response, pagination);

                    var dataHtml = '<ul>';

                    $.each(response, function (index, item) {
                    dataHtml += '<li>' + item + '</li>';
                    });

                    dataHtml += '</ul>';

                    container.prev().html(dataHtml);
                }
                };

                //$.pagination(container, options);

                container.addHook('beforeInit', function () {
                // window.console && console.log('beforeInit...');
                });
                container.pagination(options);

                container.addHook('beforePageOnClick', function () {
                window.console && console.log('beforePageOnClick...');
                //return false
                });
            })('inbox_messages_div');


            // REPLIED
            (function(name) {
                var container = $('#pagination-' + name);
                if (!container.length) return;
                var sources = function () {
                var result = [];

                var myData = loadRepliedMessages();

                myData.forEach(item => {
                    result.push(`<li class="${item.is_opened == 0 ? 'unread' : ''}">
                    <div class="col-mail col-mail-1">
                        <div class="checkbox-wrapper-mail">
                            <input type="checkbox" id="${item.id}" class="chk_reply">
                            <label class="form-label" for="${item.id}"></label>
                        </div>
                        
                        <a data-bs-toggle="offcanvas" id="${item.id}" href="#replied-read${item.id}" class="title open_replied_message_btn">${item.f_name+ ' '+item.l_name}</a>
                    </div>
                    <div class="col-mail col-mail-2"  id="${item.id}">
                        <div class="row d-flex justify-content-start">
                            <div id="${item.id}" class="col-11 open_replied_message_btn">
                                <a data-bs-toggle="offcanvas" id="${item.id}" href="#replied-read${item.id}" class="subject open_replied_message_btnss${item.id}">
                                    ${item.messages}
                                    
                                </a>
                                <div class="date">${changeOnlyTimeFormat(item.created_at)}</div>
                            </div>
                            <div class="col-1"><i class="fa fa-trash perm_del_reply_message_btn fs-4" id="${item.id}" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </li>`);

                });

                return result;
                }();

                var options = {
                dataSource: sources,
                pageSize: 10,
                showGoInput: true,
                showGoButton: true,
                showNavigator: true,
                showSizeChanger: true,
                formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> of <%= totalNumber %> items',
                callback: function (response, pagination) {
                    // window.console && console.log(response, pagination);

                    var dataHtml = '<ul>';

                    $.each(response, function (index, item) {
                    dataHtml += '<li>' + item + '</li>';
                    });

                    dataHtml += '</ul>';

                    container.prev().html(dataHtml);
                }
                };

                container.addHook('beforeInit', function () {
                // window.console && console.log('beforeInit...');
                });
                container.pagination(options);

                container.addHook('beforePageOnClick', function () {
                window.console && console.log('beforePageOnClick...');
                //return false
                });
            })('sent_messages_div');


            // TRASHED
            (function(name) {
                var container = $('#pagination-' + name);
                if (!container.length) return;
                var sources = function () {
                var result = [];

                var myData = loadTrashedMessages();

                myData.forEach(item => {
                    result.push(`<li class="${item.is_opened == 0 ? 'unread' : ''}">
                    <div class="col-mail col-mail-1">
                        <div class="checkbox-wrapper-mail">
                            <input type="checkbox" id="${item.id}" class="chk_trash">
                            <label class="form-label" for="${item.id}"></label>
                        </div>
                        ${item.is_replied == 1 ? '<i class="fa fa-reply" aria-hidden="true"></i>' : ''}
                        <a data-bs-toggle="offcanvas" id="${item.id}" href="#trashed-read${item.id}" class="title open_trashed_message_btn">${item.f_name+ ' '+item.l_name}</a>
                    </div>
                    <div class="col-mail col-mail-2 open_trashed_message_btn"  id="${item.id}">
                        <div class="row d-flex justify-content-start">
                            <div class="col-10">
                                <a data-bs-toggle="offcanvas" id="${item.id}" href="#trashed-read${item.id}" class="subject open_trashed_message_btnss${item.id}">
                                    ${item.messages}
                                    
                                </a>
                                <div class="date">${changeOnlyTimeFormat(item.created_at)}</div>
                            </div>
                            <div class="col-2 d-flex justify-content-start mt-2">
                                <i class="fa fa-undo restore_message_btn fs-4 " id="${item.id}" aria-hidden="true"></i>
                                <i class="fa fa-trash perm_delete_message_btn fs-4 mx-2" id="${item.id}" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </li>`);

                });

                return result;
                }();

                var options = {
                dataSource: sources,
                pageSize: 10,
                showGoInput: true,
                showGoButton: true,
                showNavigator: true,
                showSizeChanger: true,
                formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> of <%= totalNumber %> items',
                callback: function (response, pagination) {
                    // window.console && console.log(response, pagination);

                    var dataHtml = '<ul>';

                    $.each(response, function (index, item) {
                    dataHtml += '<li>' + item + '</li>';
                    });

                    dataHtml += '</ul>';

                    container.prev().html(dataHtml);
                }
                };

                container.addHook('beforeInit', function () {
                // window.console && console.log('beforeInit...');
                });
                container.pagination(options);

                container.addHook('beforePageOnClick', function () {
                window.console && console.log('beforePageOnClick...');
                //return false
                });
            })('tashed_messages_div');


        });


    }

    function loadMessages() {
        
        var mainData = [];

        $.ajax({
            url: 'get_all_tenant_messages',
            method: 'GET',
            dataType: 'json',
            async: false,
            // data: 'id',
            success: function(response) {

                // console.log(response.data);


                if (response.success == true) {

                    var kkk = response.data.all_messages;
                    mainData = kkk;

                    // console.log(mainData);


                }
                
            },
            error: function(data) {
                console.log(data);
            }
        });

        return mainData;
    }


    function loadRepliedMessages() {
        
        var mainData = [];

        $.ajax({
            url: 'get_all_tenant_replied_messages',
            method: 'GET',
            dataType: 'json',
            async: false,
            // data: 'id',
            success: function(response) {

                // console.log(response.data);


                if (response.success == true) {

                    var kkk = response.data.all_messages;
                    mainData = kkk;

                }
                
            },
            error: function(data) {
                console.log(data);
            }
        });

        return mainData;
    }



    function loadTrashedMessages() {
        
        var mainData = [];

        $.ajax({
            url: 'get_all_tenant_messages',
            method: 'GET',
            dataType: 'json',
            async: false,
            // data: 'id',
            success: function(response) {

                // console.log(response.data);

                if (response.success == true) {

                    var kkk = response.data.trasehd_messages;
                    mainData = kkk;

                }
                
            },
            error: function(data) {
                console.log(data);
            }
        });

        return mainData;
    }

    
    readOpenMessages();
    function readOpenMessages() {

        var myDatas = loadMessages();

        // console.log(myDatas);
        var listOfData = '';
        var my_ids = [];
        var my_rich_editor = [];
        

        for (let index = 0; index < myDatas.length; index++) {
            const element = myDatas[index];

            my_ids.push(myDatas[index].id);

            listOfData += `<div class="offcanvas offcanvas-end mail-read position-absolute shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="email-read${myDatas[index].id}" aria-labelledby="email-readLabel">
            <div class="offcanvas-header">
                    <div class="d-flex gap-2 align-items-center w-50">
                        <a href="#" role="button" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="bx bx-arrow-back fs-18 align-middle"></i>
                        </a>
                        <h5 class="offcanvas-title text-truncate w-50" id="email-readLabel">Message</h5>
                    </div>

                    <div class="ms-auto">
                        <!-- archive, spam & delete -->
                        <div class="btn-group">
                            
                            <button type="button" id="${myDatas[index].id}" class="btn btn-light trash_message_btn" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                <i class="bx bx-trash fs-18"></i>
                            </button>
                        </div>
                    </div>
            </div>
                <!-- Opened Read Message Snow-editor-->
            <div class="offcanvas-body p-0 h-100" data-simplebar>
                    <div class="px-3">
                        <div class="mt-2">
                            
                            <div class="d-flex mb-4 mt-1">
                                <img class="me-2 rounded-circle avatar-sm" src="../public/uploads/users/${myDatas[index].user_img}" alt="Generic placeholder image">
                                <div class="flex-grow-1">
                                        <span class="float-end">${changeOnlyTimeFormat(myDatas[index].created_at)}</span>
                                        <h6 class="m-0">${myDatas[index].f_name +' '+myDatas[index].l_name}</h6>
                                        <small class="text-muted">From: ${myDatas[index].email}</small>
                                </div>
                            </div>

                            <div class="text-muted">
                                <p>${myDatas[index].messages}</p>
                            </div>

                            <hr />

                        </div> <!-- card-box -->
                    </div>
            </div>

                <!-- start Snow-editor-->
            <div class="p-3">
                <form action="{{ url('tenant_reply_message_form') }}" method="POST"  id="tenant_reply_message_form">
                    @csrf
                    <div class="d-flex">
                        <img class="me-2 rounded-circle avatar-sm" src="../public/uploads/users/${myDatas[index].user_img}" alt="Generic placeholder image">
                        <div class="flex-grow-1">
                            <div class="mb-2 col-lg-12 col-md-4">
                                <input type="hidden" name="reply_from" value="${myDatas[index].receipient_id}">
                                <input type="hidden" name="reply_to" value="${myDatas[index].user_id}">
                                <input type="hidden" name="reply_msg_id" value="${myDatas[index].id}">
                                <textarea id="textArea" name="message${myDatas[index].id}" class="textArea message${myDatas[index].id}" data-msg_id="${myDatas[index].id}"></textarea>

                                 <!-- end Snow-editor-->
                                 
                            </div>
                        </div>
                    </div>


                    <div class="text-end">
                        <button type="submit" class="btn btn-primary width-sm" data-bs-dismiss="offcanvas" aria-label="Close">Send</button>
                    </div>
                </form>
            </div>
        </div>`;
            
            
        }


        $(".show_read_message").html(listOfData);
                
        // var editor1 = new RichTextEditor("#div_editor1");
        // editor1.setHTMLCode("");

        // my_ids.forEach(ids => {
        //     richTextEdits('editor'+ids, 'div_editor'+ids);
        // });

        // <div id="div_editor${myDatas[index].id}" style="width: 100%">
        //                             <p>Hello world!</p>
        //                         </div>

  
    }

    readOpenRepliedMessages();
    function readOpenRepliedMessages() {

        var myDatas = loadRepliedMessages();

        // console.log(myData);
        var listOfData = '';
        var my_ids = [];
        var my_rich_editor = [];
        

        for (let index = 0; index < myDatas.length; index++) {
            const element = myDatas[index];

            my_ids.push(myDatas[index].id);

            listOfData += `<div class="offcanvas offcanvas-end mail-read position-absolute shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="replied-read${myDatas[index].id}" aria-labelledby="replied-readLabel">
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
                            
                            <button type="button" id="${myDatas[index].id}" class="btn btn-light perm_del_reply_message_btn" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                <i class="bx bx-trash fs-18"></i>
                            </button>
                        </div>
                    </div>
            </div>
                <!-- Opened Read Message Snow-editor-->
            <div class="offcanvas-body p-0 h-100" data-simplebar>
                    <div class="px-3">
                        <div class="mt-2">
                            
                            <div class="d-flex mb-4 mt-1">
                                <img class="me-2 rounded-circle avatar-sm" src="../public/uploads/users/${myDatas[index].user_img}" alt="Generic placeholder image">
                                <div class="flex-grow-1">
                                        <span class="float-end">${changeOnlyTimeFormat(myDatas[index].created_at)}</span>
                                        <h6 class="m-0">${myDatas[index].f_name +' '+myDatas[index].l_name}</h6>
                                        <small class="text-muted">From: ${myDatas[index].email}</small>
                                </div>
                            </div>

                            <div class="text-muted">
                                <p>${myDatas[index].messages}</p>
                            </div>

                            <hr />

                        </div> <!-- card-box -->
                    </div>
            </div>

        </div>`;
            
            
        }


        $(".show_read_replied_message").html(listOfData);
                
    }

    
    readOpenTrashedMessages();
    function readOpenTrashedMessages() {

        var myDatas = loadTrashedMessages();

        // console.log(myData);
        var listOfData = '';
        var my_ids = [];
        var my_rich_editor = [];
        

        for (let index = 0; index < myDatas.length; index++) {
            const element = myDatas[index];

            my_ids.push(myDatas[index].id);

            listOfData += `<div class="offcanvas offcanvas-end mail-read position-absolute shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="trashed-read${myDatas[index].id}" aria-labelledby="email-readLabel">
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
                            
                            <button type="button" id="${myDatas[index].id}" class="btn btn-light perm_delete_message_btn" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                <i class="bx bx-trash fs-18"></i>
                            </button>
                        </div>
                    </div>
            </div>
                <!-- Opened Read Message Snow-editor-->
            <div class="offcanvas-body p-0 h-100" data-simplebar>
                    <div class="px-3">
                        <div class="mt-2">
                            
                            <div class="d-flex mb-4 mt-1">
                                <img class="me-2 rounded-circle avatar-sm" src="../public/uploads/users/${myDatas[index].user_img}" alt="Generic placeholder image">
                                <div class="flex-grow-1">
                                        <span class="float-end">${changeOnlyTimeFormat(myDatas[index].created_at)}</span>
                                        <h6 class="m-0">${myDatas[index].f_name +' '+myDatas[index].l_name}</h6>
                                        <small class="text-muted">From: ${myDatas[index].email}</small>
                                </div>
                            </div>

                            <div class="text-muted">
                                <p>${myDatas[index].messages}</p>
                            </div>

                            <hr />

                        </div> <!-- card-box -->
                    </div>
            </div>


        </div>`;
            
            
        }


        $(".show_trashed_replied_message").html(listOfData);
 
    }



    function richTextEdits(varEd, divEd) {
        var varEds = varEd;
        var divEds = divEd;
        varEds = new RichTextEditor("#"+divEds);
        varEds.setHTMLCode("");

    }


            
    // Open Messages Infomation
    $("body").on("click", ".open_message_btn", function(e) {
        e.preventDefault();

        // const id = $(this).data('id');
        // const prod_id = $(this).data('prod_id');
        // const purpose = $(this).data('purpose');
        // const urls = $(this).attr('href');
        const mess_id = $(this).attr('id');

        // console.log('Opened '+mess_id);
        
        $.ajax({
            url: 'open_message/'+mess_id,
            method: 'GET',
            dataType: 'json',
            async: false,
            success: function(response) {
    
                    // console.log(response);

                    if (response.success) {
                        loadMessages();
                        loadTrashedMessages();
                        loadTableMesages();
                        
                        // window.location.href = 'messages';

                        var godshere = `<div class="offcanvas offcanvas-end mail-read position-absolute shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="email-read${response.data.id}" aria-labelledby="email-readLabel">
                        <div class="offcanvas-header">
                             <div class="d-flex gap-2 align-items-center w-50">
                                  <a href="#" role="button" data-bs-dismiss="offcanvas" aria-label="Close">
                                       <i class="bx bx-arrow-back fs-18 align-middle"></i>
                                  </a>
                                  <h5 class="offcanvas-title text-truncate w-50" id="email-readLabel">Medium</h5>
                             </div>

                             <div class="ms-auto">
                                  <!-- archive, spam & delete -->
                                  <div class="btn-group">
                                       <button type="button" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive">
                                            <i class="bx bx-archive fs-18"></i>
                                       </button>
                                       <button type="button" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark as spam">
                                            <i class="bx bx-info-square fs-18"></i>
                                       </button>
                                       <button type="button" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                            <i class="bx bx-trash fs-18"></i>
                                       </button>
                                  </div>
                             </div>
                        </div>
                         <!-- Opened Read Message Snow-editor-->
                        <div class="offcanvas-body p-0 h-100" data-simplebar>
                             <div class="px-3">
                                  <div class="mt-2">
                                       <h5>Hi Jorge, How are you?</h5>

                                       <hr />

                                       <div class="d-flex mb-4 mt-1">
                                            <img class="me-2 rounded-circle avatar-sm" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image">
                                            <div class="flex-grow-1">
                                                 <span class="float-end">07:23 AM</span>
                                                 <h6 class="m-0">Jonathan Smith</h6>
                                                 <small class="text-muted">From: jonathan@domain.com</small>
                                            </div>
                                       </div>

                                       <p><b>Hi Jorge...</b></p>
                                       <div class="text-muted">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                                 commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                                                 penatibus et magnis dis parturient montes, nascetur ridiculus
                                                 mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                                 quis, sem.</p>
                                            <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel,
                                                 aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,
                                                 imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                                                 mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                                                 elementum semper nisi.</p>
                                            <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor
                                                 eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                                                 dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra
                                                 nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet.
                                                 Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies
                                                 nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                                                 condimentum rhoncus, sem quam semper libero, sit amet adipiscing
                                                 sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
                                                 pulvinar,</p>
                                       </div>

                                       <hr />

                                       <h6> <i class="fa fa-paperclip mb-2"></i> Attachments <span>(3)</span>
                                       </h6>

                                       <div>
                                            <a href="javascript:void(0);">
                                                 <img src="assets/images/small/img-1.jpg" alt="attachment" style="height: 84px;" class="img-thumbnail me-1">
                                            </a>
                                            <a href="javascript:void(0);">
                                                 <img src="assets/images/small/img-2.jpg" alt="attachment" style="height: 84px;" class="img-thumbnail me-1">
                                            </a>
                                            <a href="javascript:void(0);">
                                                 <img src="assets/images/small/img-3.jpg" alt="attachment" style="height: 84px;" class="img-thumbnail me-1">
                                            </a>
                                       </div>

                                  </div> <!-- card-box -->
                             </div>
                        </div>

                         <!-- start Snow-editor-->
                        <div class="p-3">
                             <div class="d-flex">
                                  <img class="me-2 rounded-circle avatar-sm" src="assets/images/users/avatar-7.jpg" alt="Generic placeholder image">
                                  <div class="flex-grow-1">
                                       <div class="mb-2">
                                            <div id="snow-editor" style="height: 200px;">
                                                 <h3>This is an Air-mode editable area.</h3>
                                                 <p><br></p>
                                                 <ul>
                                                      <li>Select a text to reveal the toolbar.</li>
                                                      <li>Edit rich document on-the-fly, so elastic!</li>
                                                 </ul>
                                                 <p><br></p>
                                                 <p>End of air-mode area</p>
                                            </div> <!-- end Snow-editor-->
                                       </div>
                                  </div>
                             </div>

                             <div class="text-end">
                                  <button type="button" class="btn btn-primary width-sm" data-bs-dismiss="offcanvas" aria-label="Close">Send</button>
                             </div>
                        </div>
                   </div>`;

                        $("open_message_btnss"+mess_id).trigger('click');

                    } else {
                        toast(toast_type[1], "Sorry, already opened.", 'Notifications', toast_posi[0], 7000);
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

    // Trash Messages
    $("body").on("click", ".trash_message_btn", function(e) {
        e.preventDefault();
    
        // const id = $(this).data('id');
        // const prod_id = $(this).data('prod_id');
        // const purpose = $(this).data('purpose');
        // const urls = $(this).attr('href');
        const mess_id = $(this).attr('id');
    
        // console.log('Opened '+mess_id);
    
    
        Swal.fire({
            title: 'Trash Message',
            text:'Are you sure you want to trash this message?',
            icon: 'question',
            showConfirmButton: false,
            allowOutsideClick: false,
            backdrop:true,
            allowEscapeKey: false,
            showConfirmButton: true,
            confirmButtonColor: "#cd0142",
            confirmButtonText: 'Yes',
            showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
        
                    // window.location.href = "apply";
                    $.ajax({
                        url: 'trash_message/'+mess_id,
                        method: 'GET',
                        dataType: 'json',
                        async: false,
                        data: {'purpose': 'Inbox'},
                        success: function(response) {
                
                                // console.log(response);
                
                                if (response.success) {

                                    Swal.fire({
                                        title: 'Trashed',
                                        text: 'Your message has been trashed successfully.',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        backdrop:true,
                                        allowEscapeKey: false,
                                        showConfirmButton: true,
                                        confirmButtonText: 'Okay',
                                    });

                                    loadMessages();
                                    loadTrashedMessages();
                                    loadTableMesages();
                                    
                                    // window.location.href = 'messages';

                
                                } else {
                                    toast(toast_type[1], "Sorry, already opened.", 'Notifications', toast_posi[0], 7000);
                                }
                
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                
                } else {
                    // window.location.href = "apply";
                }
        
            });
    
       
        });



    // Permanently Delete Messages
    $("body").on("click", ".perm_delete_message_btn", function(e) {
        e.preventDefault();
    
        const mess_id = $(this).attr('id');
    
        console.log('Opened '+mess_id);
    
    
        Swal.fire({
            title: 'Delete Message',
            text: "Are you sure you want to permanently delete this message? You can't retrieve it any longer when deleted.",
            icon: 'question',
            showConfirmButton: false,
            allowOutsideClick: false,
            backdrop:true,
            allowEscapeKey: false,
            showConfirmButton: true,
            confirmButtonColor: "#cd0142",
            confirmButtonText: 'Yes',
            showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
        
                    // window.location.href = "apply";
                    $.ajax({
                        url: 'perm_delete_message/'+mess_id,
                        method: 'GET',
                        dataType: 'json',
                        async: false,
                        data: {'purpose': 'Trash'},
                        success: function(response) {
                
                                // console.log(response);
                
                                if (response.success) {

                                    Swal.fire({
                                        title: 'Trashed',
                                        text: 'Your message has been trashed successfully.',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        backdrop:true,
                                        allowEscapeKey: false,
                                        showConfirmButton: true,
                                        confirmButtonText: 'Okay',
                                    });

                                    loadMessages();
                                    loadTrashedMessages();
                                    loadTableMesages();
                                    
                                    // window.location.href = 'messages';

                
                                } else {
                                    toast(toast_type[1], "Sorry, already opened.", 'Notifications', toast_posi[0], 7000);
                                }
                
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                
                } else {
                    // window.location.href = "apply";
                }
        
            });
    
        
    });
    
    
    // Permanently Delete Reply Message
    $("body").on("click", ".perm_del_reply_message_btn", function(e) {
        e.preventDefault();
    
        const mess_id = $(this).attr('id');
    
        console.log('Opened '+mess_id);
    
    
        Swal.fire({
            title: 'Delete Message',
            text: "Are you sure you want to permanently delete this message? You can't retrieve it any longer when deleted.",
            icon: 'question',
            showConfirmButton: false,
            allowOutsideClick: false,
            backdrop:true,
            allowEscapeKey: false,
            showConfirmButton: true,
            confirmButtonColor: "#cd0142",
            confirmButtonText: 'Yes',
            showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
        
                    // window.location.href = "apply";
                    $.ajax({
                        url: 'perm_delete_message/'+mess_id,
                        method: 'GET',
                        dataType: 'json',
                        async: false,
                        data: {'purpose': 'Reply'},
                        success: function(response) {
                
                                console.log(response);
                
                                if (response.success) {

                                    Swal.fire({
                                        title: 'Trashed',
                                        text: 'Your message has been trashed successfully.',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        backdrop:true,
                                        allowEscapeKey: false,
                                        showConfirmButton: true,
                                        confirmButtonText: 'Okay',
                                    });

                                    loadMessages();
                                    loadTrashedMessages();
                                    loadTableMesages();
                                    
                                    // window.location.href = 'messages';

                
                                } else {
                                    toast(toast_type[1], "Sorry, already opened.", 'Notifications', toast_posi[0], 7000);
                                }
                
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                
                } else {
                    // window.location.href = "apply";
                }
        
            });
    
        
    });
    
    
    

    // Open Replied Messages Infomation
    $("body").on("click", ".open_replied_message_btn", function(e) {
        e.preventDefault();

        // const id = $(this).data('id');
        // const prod_id = $(this).data('prod_id');
        // const purpose = $(this).data('purpose');
        // const urls = $(this).attr('href');
        const mess_id = $(this).attr('id');

        // console.log('Opened '+mess_id);
        
        $.ajax({
            url: 'open_replied_message/'+mess_id,
            method: 'GET',
            dataType: 'json',
            async: false,
            success: function(response) {
    
                    // console.log(response);

                    if (response.success) {
                        loadMessages();
                        loadTrashedMessages();
                        loadTableMesages();
                        // window.location.href = urls;

                        $("open_replied_message_btnss"+mess_id).trigger('click');

                    } else {
                        // toast(toast_type[1], "Sorry, already opened.", 'Notifications', toast_posi[0], 7000);
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });



    // Load Tab Name
    $("body").on("click", ".tab_btn", function (e) {
        e.preventDefault();

        var jj = $(this).data('tab_btn_msg');

        msg_btn = jj;

        $("#close_canvas_btn").trigger('click');

        // console.log(jj);
        
    });



    // Trash All Selected Messages
    $("body").on("click", ".delete_all_messages_btn", function(e) {
        e.preventDefault();
    
        const mess_id = $(this).attr('id');
        var mess_divs = $(".message_divs").data('message_div');
        // var mess_btn = $("#msg_btn").attr('id');
        var chk_name = '';
    
        var is_checked = [];
        var inboxCheckedIds = [];

        if (msg_btn == 'Inbox' || msg_btn == '') {

            msg_btn = 'Inbox';

            $('.chk_inbox:checked').each(function() {
                is_checked.push($(this).attr('id'));
                inboxCheckedIds.push($(this).attr('id'));
    
            });
    
        } else if (msg_btn == 'Reply') {
            $('.chk_reply:checked').each(function() {
                is_checked.push($(this).attr('id'));
                inboxCheckedIds.push($(this).attr('id'));
    
            });
    
            
        } else if (msg_btn == 'Trash') {
            $('.chk_trash:checked').each(function() {
                is_checked.push($(this).attr('id'));
                inboxCheckedIds.push($(this).attr('id'));
    
            });
    
        } 

   
        // console.log(inboxCheckedIds);
        
        if (is_checked.length == 0) {
            Swal.fire({
                title: msg_btn+' Information',
                text: "Please select at least one checkbox of a message.",
                icon: 'warning',
                showConfirmButton: false,
                allowOutsideClick: false,
                backdrop:true,
                allowEscapeKey: false,
                showConfirmButton: true,
                confirmButtonColor: "#cd0142",
                confirmButtonText: 'Okay',
                });
        } else {
                
            trash_perm_del(msg_btn, inboxCheckedIds)
        }
        

        
    });


    // Restore This Trashed Message
    $("body").on("click", ".restore_message_btn", function(e) {
        e.preventDefault();
    
        const mess_id = $(this).attr('id');
    
    
        Swal.fire({
            title: 'Restore Message',
            text: "Are you sure you want to restore this message?",
            icon: 'question',
            showConfirmButton: false,
            allowOutsideClick: false,
            backdrop:true,
            allowEscapeKey: false,
            showConfirmButton: true,
            confirmButtonColor: "#cd0142",
            confirmButtonText: 'Yes',
            showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
        
                    // window.location.href = "apply";
                    $.ajax({
                        url: 'perm_delete_message/'+mess_id,
                        method: 'GET',
                        dataType: 'json',
                        async: false,
                        data: {'purpose': 'Restore'},
                        success: function(response) {
                
                                // console.log(response);
                
                                if (response.success) {

                                    Swal.fire({
                                        title: 'Restore Message',
                                        text: 'Your message has been restored successfully.',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        backdrop:true,
                                        allowEscapeKey: false,
                                        showConfirmButton: true,
                                        confirmButtonText: 'Okay',
                                    });

                                    loadMessages();
                                    loadTrashedMessages();
                                    loadTableMesages();
                                    
                                    // window.location.href = 'messages';

                
                                } else {
                                    toast(toast_type[1], "Sorry, already opened.", 'Notifications', toast_posi[0], 7000);
                                }
                
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                
                } else {
                    // window.location.href = "apply";
                }
        
            });
    
        
    });


    // Submit Message
    $("body").on("submit", "#tenant_reply_message_form", function (e) {
        e.preventDefault();

        var serializedForm = $(this).serialize();

        // console.log(serializedForm);
        
        $.ajax({
            url: 'tenant_reply_message_form',
            type: 'POST',
            dataType: 'json',
            data: serializedForm,
            success: function(response) {
    
                console.log(response);

                // if (response.success) {
                //     // $(".emer_cont_btn").trigger('click');
                //     toast(toast_type[0], response.message, 'Personal Information', toast_posi[0], 7000);

                // } else {
                //     toast(toast_type[1], response.message, 'Personal Information', toast_posi[0], 7000);
                // }

                },
                error: function(data) {
                    console.log(data);
                }
            });
        
    });

    

    // Select All Checkboxes 
    $("#checkAllBoxes").click(function(){

        if (msg_btn == 'Inbox' || msg_btn == '') {

            // msg_btn = 'Inbox';
            $('.chk_inbox:checkbox').not(this).prop('checked', this.checked);

        } else if (msg_btn == 'Reply') {

            $('.chk_reply:checkbox').not(this).prop('checked', this.checked);
            
        } else if (msg_btn == 'Trash') {
            $('.chk_trash:checkbox').not(this).prop('checked', this.checked);
            
        } 

    });

    


    // SEARCHIN JQUERY LIVE FROM JSON DATA
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var myMessages = loadMessages();

        $('#text-search').keyup(function(){
            var searchField = $(this).val();
            if(searchField === '')  {
                $('#filter').html('');
                return;
            }
            
            var regex = new RegExp(searchField, "i");
            var output = '<div class="card mb-2">';
            var count = 1;
                $.each(myMessages, function(key, val){
                if ((val.f_name.search(regex) != -1) || (val.l_name.search(regex) != -1)) {
                    output += '<div class="row p-2">';
                    output += '<div class="col-3"><img class="img-responsive" style="height: 50px; width: 50px;" src="../public/uploads/users/'+val.user_img+'" alt="'+ val.f_name +'" /></div>';
                    output += '<div class="col-7">';
                    output += '<h5>' + val.f_name + '</h5>';
                    output += '<p>' + val.l_name + '</p>'
                    output += '</div>';
                    output += '</div>';
                    if(count%1 == 0){
                    output += '</div><div class="card mb-2">'
                    }
                    count++;
                }
                });
                output += '</div>';
                $('#filter').html(output);
        });


    function trash_perm_del(tab_sel, value_sel) {

        var task_tab = tab_sel;
        var checked_ids = value_sel;

        Swal.fire({
            title: task_tab+' Message',
            text: "Are you sure you want to trash selected message?.",
            icon: 'question',
            showConfirmButton: false,
            allowOutsideClick: false,
            backdrop:true,
            allowEscapeKey: false,
            showConfirmButton: true,
            confirmButtonColor: "#cd0142",
            confirmButtonText: 'Yes',
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {

                // console.log(checked_ids);
                
        
                $.ajax({
                    url: 'trash_del_agent_messages',
                    method: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {'purpose': task_tab, 'checked_ids': checked_ids},
                    success: function(response) {
        
                        // console.log(response);
        
        
                        if (response.success == true) {

                            loadMessages();
                            loadTrashedMessages();
                            loadTableMesages();
                            
                            // window.location.href = 'messages';

                            Swal.fire('Deleted', 
                                        'Your message has been deleted successfully!', 
                                        'success');
        
                        }else {
                            Swal.fire('Cancelled', 'Sorry, your message was not deleted.', 'error');
                        }
                        
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
        
            } 
    
        });
    }
    
        
    function changeDateFormat(datess) {
        const date = new Date(datess);
        formartedDate = date.toLocaleString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })
        return formartedDate;
    }

    // Convert To Readable Month And Year
    function makeMonthYear(datetimes) {
        // var d = new Date(Date.parse(datetimes.replace(/-/g, "/")));

        var d = new Date(datetimes);
        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        var date = month[d.getMonth()] + ", " + d.getFullYear();
        var time = d.toLocaleTimeString().toUpperCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
        return (date);
    }

    // Convert To Readable Date And Time
    function changeDateTimeFormat(datetimes) {
        // var d = new Date(Date.parse(datetimes.replace(/-/g, "/")));

        var d = new Date(datetimes);
        var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
        var time = d.toLocaleTimeString().toUpperCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
        return (date + " " + time);
    }


    // Convert To Readable Date And Time
    function changeOnlyTimeFormat(datetimes) {
        // var d = new Date(Date.parse(datetimes.replace(/-/g, "/")));

        var d = new Date(datetimes);
        var time = d.toLocaleTimeString().toUpperCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
        return (time);
    }



});
