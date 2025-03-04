<!-- latest jquery-->
<script src="{{asset('adminNew')}}/assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="{{asset('adminNew')}}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="{{asset('adminNew')}}/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="{{asset('adminNew')}}/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="{{asset('adminNew')}}/assets/js/scrollbar/simplebar.js"></script>
<script src="{{asset('adminNew')}}/assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="{{asset('adminNew')}}/assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="{{asset('adminNew')}}/assets/js/sidebar-menu.js"></script>
<script src="{{asset('adminNew')}}/assets/js/chart/chartist/chartist.js"></script>
<script src="{{asset('adminNew')}}/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{asset('adminNew')}}/assets/js/chart/knob/knob.min.js"></script>
<script src="{{asset('adminNew')}}/assets/js/chart/knob/knob-chart.js"></script>
<script src="{{asset('adminNew')}}/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{asset('adminNew')}}/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{asset('adminNew')}}/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="{{asset('adminNew')}}/assets/js/dashboard/default.js"></script>
<script src="{{asset('adminNew')}}/assets/js/notify/index.js"></script>
<script src="{{asset('adminNew')}}/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{asset('adminNew')}}/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{asset('adminNew')}}/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="{{asset('adminNew')}}/assets/js/typeahead/handlebars.js"></script>
<script src="{{asset('adminNew')}}/assets/js/typeahead/typeahead.bundle.js"></script>
<script src="{{asset('adminNew')}}/assets/js/typeahead/typeahead.custom.js"></script>
<script src="{{asset('adminNew')}}/assets/js/typeahead-search/handlebars.js"></script>
<script src="{{asset('adminNew')}}/assets/js/typeahead-search/typeahead-custom.js"></script>
{{-- Sweet Alert CDN --}}
<script src="{{asset('adminNew')}}//plugins/sweet-alert2/sweetalert2.min.js"></script>

{{-- Form validations --}}
<script src="{{asset('adminNew')}}/assets/js/form-validation-custom.js"></script>
<script src="{{asset('adminNew')}}/assets/js/tooltip-init.js"></script>

{{-- Dropify Cdn --}}
<script src="{{asset('adminNew')}}/plugins/parsleyjs/parsley.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('adminNew')}}/assets/js/script.js"></script>
<script src="{{asset('adminNew')}}/assets/js/theme-customizer/customizer.js"></script>
<!-- login js-->
<!-- Plugin used-->

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
        // alert(res);
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
    showconfirmButton : true,
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
