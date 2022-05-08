import { useContext, useEffect, useState } from 'react'
import Toast from '../../../toast/Toast'
import style from './convert.module.css' 
import SendNoti from './sendNotification'
import { PageContext } from '../../../context/MainContext'
import AskDelete from './AskDelete'

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

const Convert = ({ object }) => {
    const page = useContext(PageContext)
    const [convert, setConvert] = useState()
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
    function createChat() {
        let url = 'http://localhost/online-class/src/administrator/api/createChat.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify({
                userName: 'admin',
                friendUser: object.user
            })
        })
        .then(res => res.json())
        .then(res => {
            if(res == 0) {
                page.setToast(<Toast props = {{ type: 'warning', content: 'Lưu ý', sub: 'Cuộc trò chuyện đã tồn tại'}}></Toast>)
            } else {
                page.setToast(<Toast props = {{ type: 'success', content: 'Thành công', sub: 'Kiểm tra tin nhắn'}}></Toast>)
            }
            setTimeout(() => {
                page.setToast(null)
            }, 3000);
        })
    }
    return (
        <div className = {style.boxConvert}>
            <ul className = {style.listConvert}>
                <li
                    className = {style.items}
                    onClick={createChat}
                >Nhắn tin</li>
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
                    onClick={() => {
                        object.setAsk(<AskDelete props={{ userName: object.user, setAsk: object.setAsk }}></AskDelete>)
                    }}
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