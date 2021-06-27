const product = document.querySelector('div.product')

product.querySelector('button.add').addEventListener('click', event => {
    HTTP.post('/cart', {
        'id': product.id,
        'quantity': product.querySelector('input.quantity').value,
        'add': true
    }, true)
})





    // product.querySelector('button.delete').addEventListener('click', event => {
    //     HTTP.delete('/cart', { 'id': product.id }, true)
    //     setTimeout(() => { window.location.reload() }, 300)
    // })