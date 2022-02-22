import { useState } from 'react'
import style from './confirm.module.css'
import AccountActive from './infouser/accountactive'
import Wait from './infouser/wait'



const Confirm = () => {
    const [view, setView] = useState(false)
    const [wait, setWait] = useState(false)

    return(
        <div  id = 'account' className = {style.background + ' row pad'}>
            <h2 className = {style.title + ' col-md-10'}>Tài khoản</h2>
            <div className = {style.boxItems}>
                <div className = {style.items + ' col-md-6'}>
                    <div className = {style.itemsImage} style = {{backgroundImage: 'url(./image/confirm.png'}}></div>
                    <div className = {style.space}></div>
                    <button
                        onClick = {() => setView(!view)}
                        className = {style.submit}
                        style = {{backgroundColor: 'rgb(255, 0, 0)'}}
                    >
                        Tài khoản hiện hành
                    </button>
                </div>
                <div className = {style.items + ' col-md-6'}>
                    <div className = {style.itemsImage} style = {{backgroundImage: 'url(./image/active.png'}}></div>
                    <div className = {style.space}></div>
                    <button
                        className = {style.submit}
                        style = {{backgroundColor: 'rgb(0, 104, 55)'}}
                        onClick = {() => setWait(!wait)}
                    >
                        Chờ xác nhận
                    </button>
                </div>
            </div>
            {view && <AccountActive func = {setView}></AccountActive>}
            {wait && <Wait func = {setWait}></Wait>}
        </div>
    )
}
export default Confirm