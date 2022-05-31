var elInput = document.querySelector('#input');
if (elInput) {
  var etiqueta = document.querySelector('#etiqueta');
  if (etiqueta) {
    etiqueta.innerHTML = elInput.value;

    elInput.addEventListener('input', function() {
      etiqueta.innerHTML = elInput.value;
    }, false);
  }
}