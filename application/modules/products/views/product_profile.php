<style type="text/css">
	.carousel_image
	{
		height: 418px !important;
		width: 699px !important;
	}

	.no_data
	{
		padding: 30%;
		background-color: #f3f3f3;
	}
</style>
<div class="wrapper wrapper-content">
	<div class = "row animated fadeInRight">
		<div class="col-md-4" id = "details_section">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $product_details[0]['product_name']; ?>'s Profile</h5>
				</div>
				<div>
					<div class="ibox-content no-padding border-left-right">
						<img alt="image" class="img-responsive" src="<?php echo $product_details[0]['cover_image']?>">
					</div>
					<div class="ibox-content profile-content">
						<h4><strong><?php echo ucwords(strtolower($product_details[0]['product_name'])); ?></strong></h4>
						<p><i class="fa fa-map-marker"></i>Price: <?php echo $product_details[0]['price'];?></p>
						<h5>
							About <?php echo ucwords(strtolower($product_details[0]['product_name'])); ?>
						</h5>
						<p>
							<?php echo ucwords(strtolower($product_details[0]['product_name'])); ?> is a <?php echo ucwords(strtolower($product_details[0]['category_name'])); ?> of <?php echo ucwords(strtolower($product_details[0]['brand_name'])); ?> and was added on <?php echo date('dS F, Y', strtotime($product_details[0]['added_on']))?>
						</p>
						<div class="row m-t-lg">
							<div class="col-md-4">
								<h5><strong><?php echo $product_details[0]['price'];?></strong> Images</h5>
							</div>
							
						</div>
						<div class="user-button">
							<div class="row">
								<div class="col-md-6">
									<a href = "<?php echo base_url();?>products/edit_product/<?php echo $product_details[0]['product_id']?>" class="btn btn-warning btn-sm btn-block" id = "profile-edit"><i class="fa fa-pencil"></i> Edit Profile</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8" id = "pictures_section">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo ucwords(strtolower($product_details[0]['product_name'])); ?>'s Photos</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<div id = "model-carousel"></div>
				</div>
			</div>
		</div>
	</div>

	<div class = "row">
		<div class="col-md-12 animated" id = "all_pictures">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>All of <?php echo ucwords(strtolower($product_details[0]['product_name'])); ?>'s Photos</h5>&nbsp;&nbsp;<a id = "upload_request"  class = "upload_caller">Upload More?</a>
				</div>
				<div class="ibox-content">
					<div id = "all-pictures"></div>
				</div>
			</div>
		</div>

		<div class="col-md-12 animated" id = "uploader">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Upload Pictures to <?php echo ucwords(strtolower($product_details[0]['product_name'])); ?>'s Profile</h5>&nbsp;&nbsp;<a id = "upload_reject" class = "">Go back to photos</a>
				</div>
				<div class="ibox-content">
				<form id="my-awesome-dropzone" class="dropzone" action="<?php echo base_url(); ?>models/upload_model_photo" enctype="multipart/form-data">
					<div class="dropzone-previews"></div>
					<input type = "hidden" value = "<?php echo $product_details[0]['product_id']; ?>" name = "modelid" />
					<input type = "hidden" value = "<?php echo $product_details[0]['product_name']; ?>" name = "model_first_name" />
					<button type="submit" class="btn btn-success pull-right"><i class = "fa fa-upload"></i>&nbsp;Upload Photos!</button>
				</form>
				</div>
			</div>
		</div> 
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function(){


		$('#uploader').hide();
		details_height = $('#details_section').height();
		$('#pictures_section').height(details_height);
		get_product_images();
		
		$('.upload_caller').click(function(){
			$('#all_pictures').hide();
			$('#uploader').show();
		});

		$('#upload_reject').click(function(){
			$('#all_pictures').show();
			$('#uploader').hide();
		});

		 Dropzone.options.myAwesomeDropzone = {

                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 100,

                // Dropzone settings
                init: function() {
                    var myDropzone = this;

                    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });
                    this.on("sendingmultiple", function() {
                    });
                    this.on("successmultiple", function(files, response) {
                    });
                    this.on("errormultiple", function(files, response) {
                    });
                }

            }


	});

	function get_product_images()
	{
		$.get('<?php echo base_url(); ?>products/ajax_products_images/' + '<?php echo $product_details[0]["product_id"]; ?>', function(data){
			obj = jQuery.parseJSON(data);
			// console.log(obj);
			$('#model-carousel').append(obj.pictures_section);
			$('#all-pictures').append(obj.all_pictures);
			$('.upload_caller').attr('id', 'upload_request');
		});
	}
</script>