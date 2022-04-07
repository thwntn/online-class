//Gửi thông báo đến người dùng

import { useState } from 'react'
import style from './sendNotification.module.css'

function SendNoti( {object} ) {

    const [data, setData] = useState('')
    console.log(object);

    // Gửi dữ liệu thông báo đến người dùng
    const sendData = () => {
        const url = 'http://localhost/online-class/src/administrator/api/sendNotifacation.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify({
                userName: object.object.user,
                content: data
            })
        })
        .then(response => response.json())
        .then(responseJson => console.log(responseJson))
    }

    return ( 
        <div className={style.frame}>
            <div className={style.content}>
                <h5>Gửi thông báo</h5>
                <input
                    placeholder='Nhập nội dung...'
                    onChange={(e) => {
                        setData(e.target.value)
                    }}
                ></input>
                <button
                    className={style.close}
                    onClick={() => object.setSendNotification(null)}
                >Đóng</button>
                <button
                    onClick={() => {
                        sendData()
                        object.setSendNotification(null)
                    }}
                >Gửi</button>
            </div>
        </div>
     );
}

export default SendNoti;