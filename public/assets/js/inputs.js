let inputs = document.querySelectorAll('.input');
inputs.forEach(input => {
	input.addEventListener('blur', () => {
		if (input.value == '') input.classList.remove('has-value')
		else input.classList.add('has-value')
	})
})