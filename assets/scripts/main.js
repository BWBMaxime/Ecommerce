class HTTP
{

    static #host = `${window.location.protocol}//${window.location.host}`

    static get(url, callback)
    {

        try {

            HTTP.#request('GET', url, false, callback)

        } catch (error) {

            callback(error)

        }

    }

    static post(url, value, callback = false)
    {

        try {

            HTTP.#request('POST', HTTP.#check(url), value, callback)

        } catch (error) {

            if (callback) callback(error)

        }

    }

    static put(url, value, callback = false)
    {

        try {

            HTTP.#request('PUT', HTTP.#check(url), value, callback)

        } catch (error) {

            if (callback) callback(error)

        }

    }
    
    static delete(url, value, callback = false)
    {

        try {

            HTTP.#request('DELETE', HTTP.#check(url), value, callback)

        } catch (error) {

            if (callback) callback(error)

        }

    }

    static #check(url)
    {

        return ((new RegExp(/^(\/|(\/([a-z0-9-_]+|{[a-z0-9-_]+}))+)(\/.*)?$/)).test(url)) ?
            `${HTTP.#host}${url}` : url

    }

    static #request(method, url, value = false, callback = false)
    {

        const request = new XMLHttpRequest()
        request.open(method, url)
        request.setRequestHeader('Access-Control-Allow-Origin', '*')
        request.setRequestHeader('Content-Type', 'application/json')
        request.setRequestHeader('charset', 'utf8')
        request.addEventListener('load', () => { if (callback) callback(request.responseText) })
        request.addEventListener('error', () => { throw new Error(`${method}:${url}`) })
        request.send((value) ? value : null)

    }

}