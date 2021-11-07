require('./bootstrap');
// METODO CON event.
// window.confirmDelete() = function() {
//   const resp =  confirm('Vuoi cancellare ?');

//   if (!resp) {
//       event.preventDefault();
//   }
// };


const deleteForm = document.querySelectorAll('.delete-post');
deleteForm.forEach(item => {
    item.addEventListener('submit', function(e){
        const resp = confirm('Vuoi cancellare?');
        if(!resp){
            e.preventDefault();
        }
    })
})

$('.alert').alert()
