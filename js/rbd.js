console.log('rbd')

if(document.getElementById('methodModal')){
	var exampleModal = document.getElementById('methodModal');
	exampleModal.addEventListener('show.bs.modal', function (event) {
	  // Button that triggered the modal
	  var button = event.relatedTarget
	  // Extract info from data-bs-* attributes
	  let methodTitle = button.getAttribute('data-bs-method')
	  let methodContent= button.getAttribute('data-bs-content')
	  // If necessary, you could initiate an AJAX request here
	  // and then do the updating in a callback.
	  //
	  // Update the modal's content.
	  var modalTitle = exampleModal.querySelector('.modal-title')
	  var modalBodyInput = exampleModal.querySelector('.modal-body')

	  modalTitle.textContent = methodTitle
	  modalBodyInput.innerHTML = methodContent
	})

}
