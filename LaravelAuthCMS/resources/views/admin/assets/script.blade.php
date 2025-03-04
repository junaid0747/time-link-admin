 <!-- jQuery  -->
 <script src="{{asset('admin')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('admin')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin')}}/assets/js/metismenu.min.js"></script>
    <script src="{{asset('admin')}}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{asset('admin')}}/assets/js/waves.min.js"></script>

    <!--Morris Chart-->
    <script src="{{asset('admin')}}/plugins/morris/morris.min.js"></script>
    <script src="{{asset('admin')}}/plugins/raphael/raphael.min.js"></script>

    <script src="{{asset('admin')}}/assets/pages/dashboard.init.js"></script>
    <script src="{{asset('admin')}}//plugins/sweet-alert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="{{asset('admin')}}/assets/js/app.js"></script>
    <script src="{{asset('admin')}}/plugins/parsleyjs/parsley.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
            $(document).ready(function() {
                $('form').parsley();
                $('.dropify').dropify();
            });


    $(document).on('click','.view_details',function(){
        var crud = $(this).attr('crud');
        var id = $(this).attr('rel');
    
        $.ajax({
            type:'POST',
            url:'detail',
            data:{
                'id':id,
                "_token": "{{ csrf_token() }}",
            },
            success:function(res){
                $('#detail-modal').modal('show');
				$("#detail-modal .modal-body").html(res);
            }
        })
    });
    $(document).off('click', '.delete_action').on('click', '.delete_action', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected Item?",
			text : "You will not be able to recover this Item!",
			type : "warning",
			showCancelButton : true,
			confirmButtonColor : "#DD6B55",
			confirmButtonText : "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: !0,
			closeOnConfirm : false
		}).then(function(e) {
			if(e.value) {
				$.ajax({
					type: 'POST',
					url: "destroy",
					data: {'id': id,"_token": "{{ csrf_token() }}",},
					async: false,
					success: function() {
						swal("Deleted!", "Item has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "Item has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "Item is safe :)", "error");
		});
    });
        </script>