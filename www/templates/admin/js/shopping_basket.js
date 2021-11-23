function load_shopping_basket() {
    stat = null;
    $.get('/cart/', function(data) {

        $('#space').text(" ");
        $('#space').append(data);

    });
}