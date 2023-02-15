
function wpac_btn_position_select(){
    var currentval = jQuery("#btnPosition").val();
    if(currentval == 3) {
        jQuery(".cpm-short-code-notice").show();
    } else {
        jQuery(".cpm-short-code-notice").hide();
    }

}