const products = document.querySelectorAll('tr.product');

products.forEach(product => {

    product.querySelector('input.quantity').addEventListener('change', event => {
        HTTP.post('/cart', {
            'id': product.id,
            'quantity': product.querySelector('input.quantity').value,
            'stock': product.querySelector('input.quantity').max,
            'add': false
        }, true)
        setTimeout(() => { window.location.reload() }, 300)
    })

    product.querySelector('button.delete').addEventListener('click', event => {
        HTTP.delete('/cart', { 'id': product.id }, true)
        setTimeout(() => { window.location.reload() }, 300)
    })

})