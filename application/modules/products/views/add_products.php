<style type="text/css">
    .image-holder
    {
        width: 100%;
        padding: 40px;
    }

    #imagePreview
    {
        margin: 0 10px 0 100px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
        background-image: url('<?php echo ASSETS_URL;?>images/avatar-male.png');
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Products</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            Products
                        </li>
                        <li class="active">
                            <strong>Add Products</strong>
                        </li>
                    </ol>
                </div>
            </div>



        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add new Products below.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form id="form" method="post" action="<?php echo base_url();?>products/add_products"  enctype="multipart/form-data" class="wizard-big">
                                <h1>Product Category</h1>
                                <fieldset>
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Category *</label>
                                                <?php
                                                    echo $categories;
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Sub Category *</label>
                                                <select style="width:320px;" name="sub" id="sub" >
                                                    <option value="" selected="true" disabled="true" required>**Select a Sub Category**</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Product Details</h1>
                                <fieldset style="position: relative;">
                                    <!-- <h2>Profile Information</h2> -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Product Name: *</label>
                                                <input type="text" class="form-control required" name="product_name" id="product_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Brand *</label>
                                                <?php
                                                    echo $brands;
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label>color *</label>
                                                <input type="text" class="form-control required"  name="color" id="color">
                                            </div>
                                            <div class="form-group">
                                                <label>Price *</label>
                                                <input type="text" class="form-control required" name="price" id="price">
                                            </div>
                                            
                                                <label>Description *</label>
                                                <textarea name="description"></textarea>
                                            
                                            <script>
                                                CKEDITOR.replace( 'description' );
                                            </script>
                                        </div>
                                        <div class="col-lg-6">
                                           <div class = "image-holder" id = 'imagePreview' style=""></div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Cover Photo: </label>

                                                <div class="col-sm-9"><input type = "file" class = "form-control" name = "cover" id = "uploadImage" required/></div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script type="text/javascript">
        $(document).ready(function(){
             $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    
                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });

            $('#category').change(function(){
                id = $(this).val();
                // console.log(id);
                    if (id == 4) {
                        $('#sub').hide();
                        $('#sub').attr('value', '4');
                    } else{
                        $('#sub').show();
                        $.get('<?php echo base_url();?>products/ajax_get_sub_categories/'+id, function(data) {
                            obj = jQuery.parseJSON(data);

                            $('#sub').html(obj);
                            // console.log(obj);
                            // var list = $("#sub");
                            //     $.each(obj, function(index, item) {
                            //         console.log(new Option(item.category_name, item.category_id));
                            //       list.append(new Option(item.category_name, item.category_id));
                            //     });
                        });
                    }
                
            });

        width = $('.image-holder').width();
        height = width + 100;
        width = height;
        $('.image-holder').height(height);
        $('.image-holder').width(width);
        $('#data_1 .input-group.date .dob').datepicker({
            todayBtn: "linked",
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $(function() {
            $("#uploadImage").on("change", function()
            {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)  return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadstart = function(){
                        $("#imagePreview").text('Please Wait...');
                        $("#imagePreview").css("background-color", "rgba(0,0,0,0.8)");
                    }
                    reader.onloadend = function(){ // set image data as background of div
                        $("#imagePreview").css("background-image", "url("+this.result+")");
                        $("#imagePreview").text('');
                    }
                }
            });
        });

           
        });
        </script>