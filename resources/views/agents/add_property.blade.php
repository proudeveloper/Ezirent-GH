@php
    $numbers = array();

    for ($i=0; $i <= 10 ; $i++) { 
        $numbers[] = $i; 
    }
@endphp

@extends('agents.layouts.app')

    @section('style')
        <style type="text/css">
            .image_container {
                width: 24vh;
                height: 15em;
                border-radius: 2em;
                overflow: hidden;
            }

            .image_container img {
                height: 100%;
                width: auto;
                object-fit: cover;
            }

            .image_container .close_btn {
                top: 5px;
                right: 8px;
                color: red;
                font-size: 2em;
                width: 1.4em;
                height: 1.4em;
                padding: 0;
                margin: 0;
                border: 1px solid color-mix(in srgb, white, transparent 50%);;
                outline: none;
                border-radius: 5em;
                background-color: color-mix(in srgb, black, transparent 90%);
            }

            .close_btn:focus {
                border: none;
                outline: none;
            }
            .close_btn:active {
                border: none;
                outline: none;
            }
            .close_btn:hover {
                background-color: color-mix(in srgb, black, transparent 70%);
            }






            /* New Ones */
            .visually-hidden {
                clip: rect(0 0 0 0);
                clip-path: inset(50%);
                height: 1px;
                overflow: hidden;
                position: absolute;
                white-space: nowrap;
                width: 1px;
            }

                input.visually-hidden:is(:focus, :focus-within) + label {
                outline: thin dotted;
            }

        </style>
    @endsection


     @section('content')
        <div class="page-content">
            <div>
                <div class="container-fluid p-5">
                    <form id="add_property_form" action="{{ url('add_property_form') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        <div class="col-lg-12 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
                                       
                        @include('agents.layouts._my_alerts')
                    
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4>Property Images</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 d-flex justify-content-between">
                                            <h4 class="form-label prop_images" for="prop_images">Selecte images of your property.</h4>
                                            <input class="form-control" name="prop_images[]" id="prop_images" type="file" multiple="multiple" onchange="select_image()" accept="image/*" style="display:none" />
                                            <button class="btn btn-sm btn-warning" type="button" onclick="document.getElementById('prop_images').click()">Choose Images</button>
                                    
                                        </div>
                                        <div class="card-body col-lg-12 col-md-12 d-flex flex-wrap justify-content-start"  id="container">
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4>Property description and price</h4>
                                </div>
                                <div class="card-body">
                                   
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Property Title</label>
                                                    <input type="text" class="form-control"  name="title" id="title" placeholder="Enter your property title" required>
                                                    
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-3">
                                                <label for="description">Property Description</label>
                                                <textarea class="form-control" id="description" name="prop_dexc" placeholder="Describe your property" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4 col-md-12 ">
                                                <div class=" categories">
                                                    <label for="description">Number of livingrooms</label>
                                                    <select class="nice-select form-control wide" name="livingroom" id="">
                                                        <option value="" selected disabled> Select Livingroom </option>
                                                        @foreach ($numbers as $number)
                                                            <option class="option" value="{{ $number }}">{{ $number }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 ">
                                                <div class="categories">
                                                    <label for="description">Number of bedrooms</label>
                                                    <select class="nice-select form-control wide" name="bedroom" id="">
                                                        <option value="" selected disabled> Select Bedrooms </option>
                                                        @foreach ($numbers as $number)
                                                            <option class="option" value="{{ $number }}">{{ $number }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 ">
                                                <label for="description">Number of bathrooms</label>
                                                <select class="nice-select form-control wide" name="bathroom" id="">
                                                    <option value="" selected disabled> Select Bathrooms </option>
                                                    @foreach ($numbers as $number)
                                                        <option class="option" value="{{ $number }}">{{ $number }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-12 col-md-12">
                                                <label for="locations">Property Location</label>
                                                <input class="form-control" type="text" name="prop_location" id="locations" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6 col-md-12">
                                                <label for="description">Rent Amount Per Month</label>
                                                    {{-- <label for="price">Price</label> --}}
                                                    <input class="form-control" type="number" name="price" placeholder="Rent Amount GH¢" id="price" required>
                                            </div>
                                            <div class="col-lg-6 col-md-12 ">
                                                <label for="description">Property type</label>
                                                <select class="nice-select form-control wide" name="prop_cat_id" id="">
                                                    <option class="option" value="" selected disabled>Select Property Type</option>
                                                    @foreach ($getPropType as $prop_cat)
                                                        <option class="option" value="{{ $prop_cat->id }}">{{ $prop_cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                </div>
                            </div>
                       
                            <div class="card">
                                
                                <div class="card-header">
                                    <h4>Property Features</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="pro-feature-add pl-0">
                                                <li class="form-check mb-3">
                                                    <input class="form-check-input" id="furnished" type="checkbox" name="furnished">
                                                    <label class="form-check-label" for="furnished">Furnished</label>
                                                </li>
                                               <li class="form-check mb-3">
                                                    <input class="form-check-input" id="fitted_kitchen" type="checkbox" name="fitted_kitchen">
                                                    <label class="form-check-label" for="fitted_kitchen">Fitted Kitchen</label>
                                                </li>
                                                <li class="form-check mb-3">
                                                    <input class="form-check-input" id="separate_meter" type="checkbox" name="separate_meter">
                                                    <label class="form-check-label" for="separate_meter">Self Meter</label>
                                                </li>
                                                <li class="form-check mb-3">
                                                    <input class="form-check-input" id="shared_amen" type="checkbox" name="shared_amen">
                                                    <label class="form-check-label" for="shared_amen">Shared Amenities</label>
                                                </li>
        
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                            
                                <div class="card-body">
                                    <div class="add-property-button p-3">
                                        <div class="row">
                                            <i class="text-danger"><b>Note:</b> Only quality and well taken property pictures will be approved and published.</i>
                                        </div>
                                        <div class="row">
                                            <button class="btn btn-primary" type="submit">Submit Property</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        
     @endsection

        
    @section('script')
        
    
        <script src="{{ url('public/agents/assets/js/popper.min.js') }}"></script>
        <script src="{{ url('public/agents/assets/js/dropzone.js') }}"></script>
        
        
        <!-- Ratings -->
        <script src="{{ url('public/assets/dist/rating/jquery.rateyo.min.js') }}"></script>

    
        <script type="text/javascript">

            var images = [];
            function select_image() {
                var image = document.getElementById('prop_images').files;
                
                for (let i = 0; i < image.length; i++) {

                    if (check_duplicate(image[i].name)) {
                        images.push({
                            "name": image[i].name,
                            "url": URL.createObjectURL(image[i]),
                            "file": image[i],
                        }); 

                        // document.getElementById('prop_images').files = URL.createObjectURL(image[i]);
                    } else {
                        alert(image[i].name +' is already added to the selected images.')
                    }
                
                }


                // var input = document.getElementById('prop_images');
                // var file = input.files[0];

                
                // document.getElementById('add_property_form').reset();
                document.getElementById('container').innerHTML = show_image();

            }

            function show_image() {
                var image = '';
               
                images.forEach((i) => {
                    image += '<div class="image_container d-flex justify-content-center position-relative mr-4 mb-4">'+
                                        '<img src="'+i.url+'" alt="">'+
                                        '<button class="position-absolute close_btn" type="button" onclick="delete_img('+images.indexOf(i)+')">&times;</button>'+
                                    '</div>';
                  ;
                });

                document.getElementById('prop_images').files[0] = images;
                return image;
            }


            function delete_img(e) {
                images.splice(e, 1);
                document.getElementById('container').innerHTML = show_image();
            }

            function check_duplicate(name) {

                var image = true;
                if (images.length > 0) {
                    
                    for (let j = 0; j < images.length; j++) {
                        // const element = images[j];

                        if (images[j].name == name) {
                            image = false;
                            break;
                        }
                    }
                }

                return image;
                // document.getElementById('contain er').innerHTML = show_image();
            }
            
        </script>

        
        {{-- <script type="text/javascript">

            const fileSelect = document.getElementById("fileSelect"),
            fileElem = document.getElementById("fileElem"),
            fileList = document.getElementById("fileList");
            var html_imgs = '';
            var my_images = [];

            fileSelect.addEventListener(
            "click",
            (e) => {
                if (fileElem) {
                fileElem.click();
                }
                e.preventDefault(); // prevent navigation to "#"
            },
            false,
            );

            fileElem.addEventListener("change", handleFiles, false);

            function handleFiles() {
            fileList.textContent = "";
                if (!this.files.length) {
                    const p = document.createElement("p");
                    p.textContent = "No files selected!";
                    fileList.appendChild(p);
                } else {
                    const list = document.createElement("ul");
                    fileList.appendChild(list);
                    for (let i = 0; i < this.files.length; i++) {
                    const li = document.createElement("li");
                    list.appendChild(li);

                    const img = document.createElement("img");
                    img.src = URL.createObjectURL(this.files[i]);
                    img.height = 60;
                    img.onload = () => {
                        URL.revokeObjectURL(img.src);
                    };
                    li.appendChild(img);
                    const info = document.createElement("span");
                    info.textContent = `${this.files[i].name}: ${this.files[i].size} bytes`;
                    li.appendChild(info);





                    my_images.push({
                            "name": this.files[i].name,
                            "url": URL.createObjectURL(this.files[i]),
                            "file": this.files[i],
                            "size": this.files[i].size,
                        }); 

                    // html_imgs += '<div class="image_container d-flex justify-content-center position-relative mr-4 mb-4">'+
                    //                     '<img src="'+img.src+'" alt="Images">'+
                    //                     '<button class="position-absolute close_btn" type="button" onclick="delete_img('+this.files.indexOf(i)+')">&times;</button>'+
                    //                 '</div>';
                    }
                }

                // document.getElementById('add_property_form').reset();
                document.getElementById('main_container').innerHTML = show_image();
            }

              
            
            function show_image() {
                var image = '';
               
                my_images.forEach((i) => {
                    image += '<div class="image_container d-flex justify-content-center position-relative mr-4 mb-4">'+
                                        '<img src="'+i.url+'" alt="">'+
                                        '<button class="position-absolute close_btn" type="button" onclick="delete_img('+my_images.indexOf(i)+')">&times;</button>'+
                                    '</div>';
                  ;
                });

                // document.getElementById('prop_images').files[0] = my_images;
                return image;
            }

            function delete_img(e) {
                images.splice(e, 1);
                document.getElementById('main_container').innerHTML = show_image();
            }

            function check_duplicate(name) {

                var image = true;
                if (images.length > 0) {
                    
                    for (let j = 0; j < images.length; j++) {
                        // const element = images[j];

                        if (images[j].name == name) {
                            image = false;
                            break;
                        }
                    }
                }

                return image;
                // document.getElementById('contain er').innerHTML = show_image();
            }
            
        </script> --}}


        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });

        </script>

    @endsection
   
    <!-- Wrapper / End -->