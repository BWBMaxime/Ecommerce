const search = document.querySelector('input.search-bar')

document.querySelector('img.disconnect').addEventListener('click', () => {
    HTTP.delete('/session', null, true, url => redirect(url))
})

document.querySelector('input.search-btn').addEventListener('click', () => {
    console.log('lol')
})