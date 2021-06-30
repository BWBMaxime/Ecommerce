const products = document.querySelectorAll('tr.product')
const checkout = document.querySelector('button#checkout')

if (products && checkout)
{

    products.forEach(product => {

        product.querySelector('input.quantity').addEventListener('change', () => {
            HTTP.post('/cart', {
                'id': product.id,
                'quantity': product.querySelector('input.quantity').value,
                'stock': product.querySelector('input.quantity').max,
                'add': false
            }, true, () => refresh())
        })
    
        product.querySelector('button.delete').addEventListener('click', () => {
            HTTP.delete('/cart', { 'id': product.id }, true, () => refresh())
        })
    
    })
    
    checkout.addEventListener('click', () => HTTP.post('/checkout', null, false, id => redirect(`/checkout/${id}`)))

}
