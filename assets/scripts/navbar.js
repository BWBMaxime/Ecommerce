const search = document.querySelector('input.search')
const disconnect = document.querySelector('img.disconnect')
const btn = document.querySelector('button.search')

function preg(pattern, target)
{ return (new RegExp(pattern)).test(target) }

function isSearch()
{ return preg(/^\?search=\w*$/, window.location.search) }

function isQuery(value)
{ return preg(/^\w+$/, value) }

if (disconnect)
{

    disconnect.addEventListener('click', () => {
        HTTP.delete('/session', null, true, url => redirect(url))
    })

}

btn.addEventListener('click', event => {

    event.preventDefault()

    if (isQuery(search.value))
    {

        redirect(`/?search=${search.value}`)

    } else {

        redirect('/')

    }

})

search.addEventListener('enter', event => {

    event.preventDefault()
    
})