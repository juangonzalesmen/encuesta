jQuery('input[type=file]').change(function() {
    var filename = jQuery(this).val().split('\\').pop();
    var idname = jQuery(this).attr('rutaimagen');
    jQuery('span.' + idname).next().find('span').html(filename);
});