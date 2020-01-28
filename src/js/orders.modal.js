import API from './api.service';

function _initModal(){
	// Show modal on button click
	$('.button--brown').click(function () {
		$('.modal').toggleClass('hidden');
	});

	// Close modal on background click
	$(document).click(function(event) {
		//if you click on anything except the modal itself or the "open modal" link, close the modal
		if (!$(event.target).closest(".modal__box, .button--brown").length) {
			$("body").find(".modal").addClass("hidden");
		}
	});

	// Send order info on button click
	$('.modal__button-send').click(function() {
		console.log("Send");

		// Validate inputs
		const phoneValue = $('#modal-input-number').val();
		if (phoneValue === '' || !phoneValue) {
			$('#modal-input-number').addClass('error');
			return false;
		}
		else{
			$('#modal-input-number').removeClass('error');
		}

		const data = $('#modal-form').serialize();
		API.orders.post(data, (res)=>{

			$(document).ajaxSend(function() {
				$('.modal__button-send').addClass('button--loading');
			});

			if (res.error !== null){
				console.error("Modal Order send error: ", error.description);
				return;
			}

			$('.modal__button-send').click(function(){
				$.ajax({
					type: 'GET',
					success: function(data){
						console.log(data);
					}
				}).done(function() {
					$('.modal').toggleClass('hidden');
					$('.modal__button-send').removeClass('button--loading');
				});
			});

			// Order success
			// $('.modal').toggleClass('hidden');
		});
	});

	// Mask number input
	$('.number').mask('+7 (000)000-00-00');
}

function _addProductMessage(){
	// Get product Id
	const productFullId = $('.product.type-product').attr('id');
	const productId = productFullId.split('product-')[1];

	// Set product Id to hidden input
	$('#product-id').val(productId);

	// Get product title
	const title = $('.title').text().trim();
	// Set prodcut title to message input
	$('#modal-input-message').val(`Здравствуйте!\n\nМеня заинтересовал "${title}".`);
}

export default {
	initialize: _initModal,
	addProductMessage: _addProductMessage
};