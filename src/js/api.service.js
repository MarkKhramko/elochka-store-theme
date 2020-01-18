const API_PREFIX = `${window.location.protocol}//${window.location.host}/wp-json/v1`;

function _makePost(url, serialisedData, callback){
	$.ajax({   
			type: "POST",
			data : serialisedData,
			cache: false,
			url: url,
			success: function(data){
				callback(data);
			}
	});
}

export default {
	orders: {
		post: (data, callback)=> _makePost(`${API_PREFIX}/orders`, data, callback)
	}
};