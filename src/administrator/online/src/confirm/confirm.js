import { useState } from 'react'
import style from './confirm.module.css'
import AccountActive from './infouser/accountactive'



const Confirm = () => {
    const [view, setView] = useState(false)
    const mount = () => {
        document.querySelector('.accountactive_frame__UQFsz').classList.add(`accountactive_active__8PM3W`)
        setView(true)
        console.log(view)
    }
    return(
        <div className = {style.background + ' row pad'}>
            <h2 className = {style.title + ' col-md-10'}>Tài khoản</h2>
            <div className = {style.boxItems}>
                <div className = {style.items + ' col-md-6'}>
                    <div className = {style.itemsImage} style = {{backgroundImage: 'url(./image/confirm.png'}}></div>
                    <div className = {style.space}></div>
                    <button onClick = {mount} className = {style.submit} style = {{backgroundColor: 'rgb(255, 0, 0)'}}>Chờ xác nhận</button>
                </div>
                <div className = {style.items + ' col-md-6'}>
                    <div className = {style.itemsImage} style = {{backgroundImage: 'url(./image/active.png'}}></div>
                    <div className = {style.space}></div>
                    <button className = {style.submit} style = {{backgroundColor: 'rgb(0, 104, 55)'}}>Chờ xác nhận</button>
                </div>
            </div>
            <AccountActive status = {view}></AccountActive>
        </div>
    )
}
export default Confirm