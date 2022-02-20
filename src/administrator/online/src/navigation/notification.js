import { useEffect, useRef } from 'react'
import style from './notification.module.css'

const Noti = () => {
    const itemNoti = useRef()
    useEffect(() => {
        itemNoti.current.addEventListener('click', function(event){
            event.stopPropagation()
        })
    }, [])
   
    return (
        <div ref = {itemNoti} className = {style.frame}>
            <h5>Thông báo</h5>
            <div className = {style.item}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>CT211</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
            <div className = {style.item}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>CT211</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
            <div className = {style.itemStatus}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>CT211</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
            <div className = {style.item}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>CT211</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
        </div>
    )
}
export default Noti