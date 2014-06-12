$(document).ready(function(){

	$(document).keypress(function(e) {
	  if(e.which == 100) {  // 100 = 'D' pressed  ||  114 = 'R' pressed
	  	//callAjax ( marketid , currency_code )
	  	newcallAjax("132","DOGE");
	  }
	  if(e.which == 97) {  // 97 = 'A' pressed  ||  114 = 'R' pressed 
	  	//callAjax ( marketid , currency_code )
	  	newcallAjax("199","AC");
	  }
	  if(e.which == 119) {  // 119 = 'W' pressed
	  	//callAjax ( marketid , currency_code )
	  	newcallAjax("195","WC");
	  }
	});

	newcallAjax("132","DOGE");

}); // end of document ready

function singleMarket(data) {
	console.dir(data);
}

function callAjax(markid, code) {
	var marketid = "marketid="+markid;
	var codearray = "code="+code;

	$.ajax({
	  type: 'POST',
	  url: 'includes/cryptsy.singlemarketdata.marketid.php',
	  dataType: 'json',
	  data: marketid,
	  success: function(data) {
	    // Successful response.
        if (data.success == true){
            $('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>AJAX Called Successfully!").show();
            //singleMarket(data.return.markets);
        }
        else {
            $('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>AJAX Call FAILED!").show();
        }
		return data;
	  },
	  error: function(data) {
	    // Error response.
	    //console.log("AJAX call failed");
	    //console.dir(data);
	    $('#responder').html(data);
        $('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>AJAX Call FAILED!").show();
	  }
	}).then(function(data){
		$.ajax({
			type: 'POST',
			url: 'includes/orderbook.php?'+codearray,
			dataType: 'html',
			data: data,
			success: function(data){ 
		    	// Successful response.
		        /**if (data.success == true){
		            $('#infobox').html(data.message);
		            singleMarket(data.return.markets);
		        }
		        else {
		            $('#infobox').html(data.message);
		        }**/
	    		//singleMarket(data);
            	$('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>POST AJAX Called Successfully!").show();	    		
				$('#responder').html(data);
				return data;
			}, 
			error: function(data){ 
				$('#responder').html(data);
            	$('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>POST AJAX Call FAILED!").show();
	    		//console.log('Fail'); console.dir(data); 
	    	}
		});
	});
}

function newcallAjax(markid, cod) {
	//var mid = "marketid="+markid;

	$.ajax({
	  type: 'POST',
	  url: 'includes/orderbook.php',
	  dataType: 'html',
	  data: { code: cod, marketid: markid },
	  success: function(data) {
	    // Successful response.
        if (data.success == true){
            $('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>AJAX Called Successfully!").show();
            //singleMarket(data.return.markets);
        }
        else {
            $('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>AJAX Call FAILED!").show();
        }
		$('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>AJAX Called Successfully!").show();
       	$('#responder').html(data);
		return data;
	  },
	  error: function(data) {
	    // Error response.
	    //console.log("AJAX call failed");
	    //console.dir(data);
	    $('#responder').html(data);
        $('.alert').html("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">\&times\;</button>AJAX Call FAILED!").show();
	  }
	});
}