import { useEffect, useRef } from 'react'
import style from './message.module.css'

const Mess = () => {
    const itemMess = useRef()
    useEffect(() => {
        itemMess.current.addEventListener('click', function(event){
            event.stopPropagation()
        })
    }, [])
   
    return (
        <div ref = {itemMess} className = {style.frame}>
            <h5>Tin nhắn</h5>
            <div className = {style.item}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>Nguyễn Trần Thiên Tân</h4>
                    <p>Nội dung tin nhắn</p>
                </div>
            </div>
            <div className = {style.item}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>Nguyễn Trần Thiên Tân</h4>
                    <p>Nội dung tin nhắn</p>
                </div>
            </div>
            <div className = {style.itemStatus}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>Nguyễn Trần Thiên Tân</h4>
                    <p>Nội dung tin nhắn</p>
                </div>
            </div>
            <div className = {style.item}>
                <div className = {style.image}></div>
                <div className = {style.content}>
                    <h4>Nguyễn Trần Thiên Tân</h4>
                    <p>Nội dung tin nhắn</p>
                </div>
            </div>
        </div>
    )
}
export default Mess