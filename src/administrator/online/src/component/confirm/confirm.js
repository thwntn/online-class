import { useContext, useState } from 'react'
import  style from './confirm.module.css'
import AccountActive from './infouser/accountactive'
import Wait from './infouser/wait'
import { PageContext } from '../../context/MainContext'


function Confirm () {
    const [view, setView] = useState(false)
    const [wait, setWait] = useState(false)
    const page = useContext(PageContext)

    return (
        <div  id = 'account' className = {style.background + ' row pad'}>
            <div className = {style.boxItems}>
                <div className = {style.items + ' col-md-5'}>
                    <div className={style.navConfirm}>
                        <button
                            className={style.itemNav}
                            onClick={() => {
                                page.pinItem('accountActive')
                            }}
                        >
                            <i className={style.pinAccount + ' fad fa-map-pin'}></i>
                        </button>
                        <button className={style.itemNav}>
                            <i className={style.iconAccount + " fad fa-user-shield"}></i>
                        </button>
                    </div>
                    <h5>Tài khoản</h5>
                    <p>
                        Quản lí tài khoản đang hoạt động, truy xuất thông tin <br></br> khóa tài khoản, xóa tài khoản, truy cập trực tiếp
                    </p>
                    <div className = {style.space}></div>
                    <button
                        onClick = {() => setView(!view)}
                        className = {style.openControl}
                    >
                        Mở bảng điều khiển
                    </button>
                </div>
                <div className = {style.items + ' col-md-5'}>
                    <div className={style.navConfirm}>
                        <button className={style.itemNav}
                            onClick={() => {
                                page.pinItem('waitUser')
                            }}
                        >
                            <i className={style.pinAccept + " fad fa-map-pin"}></i>
                        </button>
                        <button className={style.itemNav}>
                            <i className={style.iconAccept + " fad fa-lock"}></i>
                        </button>
                    </div>
                    <h5>Xác nhận</h5>
                    <p>
                        Quản lí tài khoản đang hoạt động, truy xuất thông tin <br></br> khóa tài khoản, xóa tài khoản, truy cập trực tiếp
                    </p>
                    <div className = {style.space}></div>
                    <button
                        className = {style.openConfirm}
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