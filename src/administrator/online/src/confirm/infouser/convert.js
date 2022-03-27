import { useEffect, useState } from 'react'
import style from './convert.module.css' 

async function updateType (user, action) {
    let url = 'http://localhost/online-class/src/administrator/api/updatetype.php'
    let data = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'text/html'
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            user,
            action
        })
    })
    let response = await data.json()
    return response
}

const Convert = ({object}) => {
    const [convert, setConvert] = useState()
    return (
        <div className = {style.boxConvert}>
            <ul className = {style.listConvert}>
                <li
                    className = {style.items}
                    onClick = {() => {
                        updateType(object.user, 1)
                        object.refesh(Math.random())
                    }}
                >Khóa tài khoản</li>
                <li
                    className = {style.items}
                    onClick = {() => {
                        updateType(object.user, 2)
                        object.refesh(Math.random())
                    }}
                >Mở khóa tài khoản</li>
                <li className = {style.items}>Xóa tài khoản</li>
                <li className = {style.items}>Gửi thông báo</li>
            </ul>
        </div>
    )
}

export default Convert