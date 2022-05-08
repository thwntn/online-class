//Gửi thông báo đến người dùng

import { useContext, useState } from 'react'
import style from './sendNotification.module.css'
import { PageContext } from '../../../context/MainContext'
import Toast from '../../../toast/Toast'

function SendNoti( {object} ) {

    const [data, setData] = useState('')
    const page = useContext(PageContext)

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
        .then(res => {
            if(res == 1) {
                page.setToast(<Toast props ={{ type: 'success', content: 'Thành công', sub: 'Đã gửi thông báo đến người dùng'}}></Toast>)
            } else {
                page.setToast(<Toast props ={{ type: 'erorr', content: 'Thất bại', sub: 'Máy chủ không phản hồi'}}></Toast>)
            }
            setTimeout(() => {
                page.setToast(null)
            }, 2000);
        })
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