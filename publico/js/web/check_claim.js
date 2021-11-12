$("#send").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: url + "claim/getcheckclaim",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(msg) {
            console.log(msg);
            data = JSON.parse(msg);
            estado = document.getElementById("state");
            console.log(estado)
            estado.innerHTML=data['NAME'];
        }
    });
})