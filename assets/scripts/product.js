const product = document.querySelector('div.product')

product.querySelector('button.add').addEventListener('click', () => {
    HTTP.post('/cart', {
        'id': product.id,
        'quantity': product.querySelector('input.quantity').value,
        'stock': product.querySelector('input.quantity').max,
        'add': true
    }, true)
})