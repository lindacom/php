if(isset($_GET['title'])){

// listen for when url has parameters and run addtocartclicked function

    var urlAdd = $_GET['title'];

    for (var i = 0; i < urlAdd.length; i++) {
        var urlButton = urlAdd[i]
        urlButton.addEventListener('click', addToCartClicked)
    }
}