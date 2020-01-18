<div class="modal hidden">
	<div class="modal__box">
		<h1 class="modal__title">
			Оставьте заявку
		</h1>
		<h2 class="modal__subtitle">
			Консультант свяжется с вами в течение 30 секунд
		</h2>
		<form id="modal-form">
			<label for="name">
				Ваше имя
			</label>
			<input
				id="modal-input-name"
				name="name"
				class="modal__input name"
				required
			>
			<label for="phonenumber">
				Ваш номер телефона
			</label>
			<input
				id="modal-input-number"
				name="phonenumber"
				required class="modal__input number error"
				placeholder="+7 (___)___-__-__"
			>
			<label for="message">
				Сообщение
			</label>
			<textarea
				id="modal-input-message"
				name="message"
				class="modal__input message"
			></textarea>
			<input id="product-id" type="hidden" name="product_id">
		</form>
		<button class="button modal__button-send">
			Получить консультацию
		</button>
	</div>
</div>