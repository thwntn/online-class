import { useEffect, useState } from 'react'
import style from './convert.module.css' 
import SendNoti from './sendNotification'

async function updateType (user, action, refesh) {
    
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
    await refesh(Math.random())
    return response
}

const Convert = ({object}) => {
    console.log(object);

    const [sendNotification, setSendNotification] = useState(null)

    //gửi thông báo cho người dùng từ trang quản trị
    const sendNoti = (userName, contentNotification) => {
        const url = ''
        fetch(url, {
            method: 'post',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Contennt-Type': 'text/html'
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify({
                userName: userName,
                contentNotification: contentNotification
            })
        })
    }


    const [convert, setConvert] = useState()
    return (
        <div className = {style.boxConvert}>
            <ul className = {style.listConvert}>
                <li
                    className = {style.items}
                    onClick = {() => {
                        updateType(object.user, 1, object.refesh)
                    }}
                >Khóa tài khoản</li>
                <li
                    className = {style.items}
                    onClick = {() => {
                        updateType(object.user, 2, object.refesh)
                    }}
                >Mở khóa tài khoản</li>
                <li
                    className = {style.items}
                >Xóa tài khoản</li>
                <li
                    className = {style.items}
                    onClick = {() => setSendNotification(<SendNoti object = {{object, setSendNotification}}></SendNoti>)}
                >Gửi thông báo
                </li>
            </ul>
            {sendNotification}
        </div>
    )
}

export default Convert