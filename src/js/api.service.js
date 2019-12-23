const axios = require('axios');

const API_PREFIX = `${window.location.protocol}//${window.location.host}/wp-json/v1`;

export default {
	products : {
		get: (args)=> axios.get(`${API_PREFIX}/products`)
	},

	attributes : {
		get: (args)=> axios.get(`${API_PREFIX}/attributes`)
	}
};