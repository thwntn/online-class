import { useEffect, useRef, useState } from 'react'
import style from './notification.module.css'

const Noti = ({setNotRead}) => {

    //fetch data
    const [notifications, setNotifications] = useState([])

    const fetchData = () => {
        const url = 'http://localhost/online-class/src/administrator/api/fetchNotification.php'
        fetch(url)
        .then(response => response.json())
        .then(responseJson => {
            setNotifications(responseJson)
        })
    }
    useEffect(() => {
        fetchData()
    }, [])

    useEffect(() => {
        const id = setInterval(() => {
            fetchData()
        }, 5000);
        return () => {
            clearInterval(id)
        }
    }, [])

    const itemNoti = useRef()
    useEffect(() => {
        itemNoti.current.addEventListener('click', function(event){
            event.stopPropagation()
        })
    }, [])
    return (
        <div ref = {itemNoti} className = {style.frame}>
            <h5><i class="fas fa-bell"></i>Thông báo</h5>
            <div className = {style.frameNoti}>
            {notifications.map((noti, index) => {
                return (
                    <div key = {index} className = {style.item}>
                       <div className = {style.image}></div>
                        <div className = {style.content}>
                            <h4>{noti.noti_content}</h4>
                            <p>Bài tập mới được giao</p>
                        </div>
                    </div>
                )
            })}
            </div>
        </div>
    )
}
export default Noti