$(document).ready(function() {
	/*tempat jquery action*/
	var link = "/Awal/jalan/index.php";
	
	$("ul.products form").submit(function() {
	// Get the product ID and the quantity 
		var id = $(this).find('input[name=id_produk]').val();
		var qty = $(this).find('input[name=quantity]').val();
		
		alert('ID:' + id + '\n\rQTY:' + qty);
		
		return false; // Stop the browser of loading the page defined in the form "action" parameter.
	});

})