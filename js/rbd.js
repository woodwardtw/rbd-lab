console.log('rbd')

if(document.getElementById('methodModal')){
	let exampleModal = document.getElementById('methodModal');
	exampleModal.addEventListener('show.bs.modal', function (event) {
	  // Button that triggered the modal
	  let button = event.relatedTarget
	  //get title from data attribute
	  let methodTitle = button.getAttribute('data-bs-method')
	  //get content from data attribute
	  let methodContent= button.getAttribute('data-bs-content')
	  
	  //get destinations
	  let modalTitle = exampleModal.querySelector('.modal-title')
	  let modalBodyInput = exampleModal.querySelector('.modal-body')

	  //set destinations with variable content
	  modalTitle.textContent = methodTitle
	  modalBodyInput.innerHTML = methodContent
	})

}
