document.querySelector('img.disconnect').addEventListener('click', () => {
    HTTP.delete('/session', null, true, () => redirect('/'))
})