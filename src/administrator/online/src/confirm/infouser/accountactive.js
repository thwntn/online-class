import style from './accountactive.module.css'
import InfoUser from './infouser.js'
import {useEffect, useState} from 'react'
import Confirm from '../confirm.js'
import Convert from './convert.js'

const data = [
    {
        key: 1,
        name: 'Nguyễn Trần Thiên Tân'
    },
    {
        key: 2,
        name: 'Nguyễn Văn Đạt'
    },
    {
        key: 3,
        name: 'Nguyễn Viết Tài'
    },
    {
        key: 4,
        name: 'Nguyễn Nhật Minh'

    },
    {
        key: 5,
        name: 'Nguyễn Trần Thiên Tân'
    },
    {
        key: 6,
        name: 'Nguyễn Văn Đạt'
    },
    {
        key: 7,
        name: 'Nguyễn Viết Tài'
    },
    {
        key: 8,
        name: 'Nguyễn Nhật Minh'

    }
]

const AccountActive = (property) => {
    const [close, setClose] = useState(style.active)
    const [view, setView] = useState('none')
    const [active, setActive] = useState('')
    const [convert, setConvert] = useState('none')

    const closed = () => {
        setTimeout(() => {
            setView('none')
        }, 200)
    }
    const closeConvert = () => {
        setTimeout(() => {
            console.log('ok');
                setConvert('none')
        }, 100)
    }
    const finish = () => {
        console.log('fs')
    }
    return (
        <div className = {style.frame + ' ' + (property.status && style.active)}>
            <div className = {style.accountBox}>
                <div className = {style.backgroundImage}></div>
                <h3 className = {style.title}>Tài khoản hiện hành</h3>
                <input className = {style.search} placeholder = 'Nhập tên cần tìm kiếm'></input>
                <button onClick = {() => {
                    document.querySelector(`.${style.frame}`).classList.remove(close)
                }} className = {style.close}>Đóng</button>
                <div className = {style.boxItems + ' row'}>
                    {data.map((item) => (
                        <div key = {item.key} className = {style.itemsElement + ' col-md-4'}>
                            <div className = {style.item}>
                                <div className = {style.imgUser} style = {{backgroundImage: './abc.jpg'}}></div>
                                <div className = {style.nameUser}>{item.name}</div>
                                <div className = {style.actionUser}>
                                    <button className = {style.gotoUser}><i className="fad fa-sign-in"></i></button>
                                    <button
                                        className = {style.convertUser}
                                        onClick = {() => setConvert(item.key)}
                                    >
                                        <i className="fad fa-repeat-1"></i>
                                        {convert === item.key && <Convert closeConvert = {closeConvert}></Convert>}
                                    </button>
                                    <button
                                        key = {item.key}
                                        onClick = {() => {setView(item.key)}}
                                        className = {style.viewUser}
                                    >
                                        <i className="fad fa-eye"></i>
                                        {view === item.key && <InfoUser func = {{close: closed,finish: finish}}></InfoUser>}
                                    </button>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}

export default AccountActive