class HTTP
{

    static #host = `${window.location.protocol}//${window.location.host}`

    static get(url, callback, json = false)
    {

        try {

            HTTP.#request('GET', url, false, json, callback)

        } catch (error) {

            callback(error)

        }

    }

    static post(url, value, json = false, callback = false)
    {

        try {

            HTTP.#request('POST', HTTP.#check(url), value, json, callback)

        } catch (error) {

            if (callback) callback(error)

        }

    }

    static put(url, value, json = false, callback = false)
    {

        try {

            HTTP.#request('PUT', HTTP.#check(url), value, json, callback)

        } catch (error) {

            if (callback) callback(error)

        }

    }
    
    static delete(url, value, json = false, callback = false)
    {

        try {

            HTTP.#request('DELETE', HTTP.#check(url), value, json, callback)

        } catch (error) {

            if (callback) callback(error)

        }

    }

    static #check(url)
    {

        return ((new RegExp(/^(\/|(\/([a-z0-9-_]+|{[a-z0-9-_]+}))+)(\/.*)?$/)).test(url)) ?
            `${HTTP.#host}${url}` : url

    }

    static #request(method, url, value = false, json = false, callback = false)
    {

        const request = new XMLHttpRequest()
        request.open(method, url)
        request.setRequestHeader('Access-Control-Allow-Origin', '*')
        request.setRequestHeader('Content-Type', 'application/json')
        request.setRequestHeader('charset', 'utf8')
        request.addEventListener('load', () => {
            if (callback) callback((json) ? JSON.parse(request.responseText) : request.responseText)
        })
        request.addEventListener('error', () => { throw new Error(`${method}:${url}`) })
        request.send((value && json) ? JSON.stringify(value) : (value) ? value : null)

    }

}

function refresh(num = 0) {

    setTimeout(() => { window.location.reload() }, num)

}