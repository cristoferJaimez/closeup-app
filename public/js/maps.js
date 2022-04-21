const selectElement = document.querySelector('.nieve');

selectElement.addEventListener('change', (event) => {
    const resultado = document.querySelector('.resultado');
    const resultado_ = document.querySelector('.resultado_');
    resultado.textContent = ` ${event.target.value}`;
    resultado_.textContent = `  ${event.target.value}`;

});