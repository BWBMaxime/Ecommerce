const products = document.querySelectorAll('tr.product');

products.forEach(product => {
    product.querySelector('input.quantity').addEventListener('change', event => {
        HTTP.post('/cart', {
            'id': product.id,
            'quantity': product.querySelector('input').value
        }, true)
    })
    product.querySelector('button.delete').addEventListener('click', event => {
        HTTP.delete('/cart', { 'id': product.id }, true, (e) => {
            console.log(e)
        })
    })
})