function cookie( status ) {
    return fetch('http://localhost/online-class/src/administrator/api/cookie.php', {
        method: 'post',
        body: JSON.stringify({ getCookie: status })
    })
}

export default cookie;