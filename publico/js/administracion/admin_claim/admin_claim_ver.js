$('#archivoModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var urlimg = button.data('url')
    var img = '<img src="' + urlimg + '" class="img-fluid img-thumbnail">'
    var modal = $(this)

    modal.find('.modal-body .archivo').replaceWith(img)

})