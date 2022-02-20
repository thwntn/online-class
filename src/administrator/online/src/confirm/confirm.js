import { useState } from 'react'
import style from './confirm.module.css'
import AccountActive from './infouser/accountactive'



const Confirm = () => {
    const [view, setView] = useState(false)
    const mount = () => {
        setTimeout(() => {
            setView(!view)
            console.log('ad')
        }, 100);
    }
    return(
        <div className = {style.background + ' row pad'}>
            <h2 className = {style.title + ' col-md-10'}>Tài khoản</h2>
            <div className = {style.boxItems}>
                <div className = {style.items + ' col-md-6'}>
                    <div className = {style.itemsImage} style = {{backgroundImage: 'url(./image/confirm.png'}}></div>
                    <div className = {style.space}></div>
                    <button onClick = {mount} className = {style.submit} style = {{backgroundColor: 'rgb(255, 0, 0)'}}>Tài khoản hiện hành</button>
                </div>
                <div className = {style.items + ' col-md-6'}>
                    <div className = {style.itemsImage} style = {{backgroundImage: 'url(./image/active.png'}}></div>
                    <div className = {style.space}></div>
                    <button className = {style.submit} style = {{backgroundColor: 'rgb(0, 104, 55)'}}>Chờ xác nhận</button>
                </div>
            </div>
            {view && <AccountActive func = {mount}></AccountActive>}
        </div>
    )
}
export default Confirm