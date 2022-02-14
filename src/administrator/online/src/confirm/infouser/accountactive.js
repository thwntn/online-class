import style from './accountactive.module.css'
import InfoUser from './infouser.js'
import {useEffect, useState} from 'react'

const data = [
    {
        id: 1,
        name: 'Nguyễn Trần Thiên Tân'
    },
    {
        id: 2,
        name: 'Nguyễn Văn Đạt'
    },
    {
        id: 3,
        name: 'Nguyễn Viết Tài'
    },
    {
        id: 4,
        name: 'Nguyễn Nhật Minh'

    },
    {
        id: 1,
        name: 'Nguyễn Trần Thiên Tân'
    },
    {
        id: 2,
        name: 'Nguyễn Văn Đạt'
    },
    {
        id: 3,
        name: 'Nguyễn Viết Tài'
    },
    {
        id: 4,
        name: 'Nguyễn Nhật Minh'

    }
]




const AccountActive = () => {
    const [view, setView] = useState('')
    useEffect(() => {
        
    }, [])
    const viewInfo = () => {
        console.log('click')
        setView(<InfoUser></InfoUser>)
    }
    return (
        <div className = {style.accountBox}>
            <div className = {style.backgroundImage}></div>
            <h3 className = {style.title}>Tài khoản hiện hành</h3>
            <input className = {style.search} placeholder = 'Nhập tên cần tìm kiếm'></input>
            <button className = {style.close}>Đóng</button>
            <div className = {style.boxItems + ' row'}>
                {data.map((item) => (
                    <div className = {style.itemsElement + ' col-md-4'}>
                        <div className = {style.item}>
                            <div className = {style.imgUser} style = {{backgroundImage: './abc.jpg'}}></div>
                            <div className = {style.nameUser}>{item.name}</div>
                            <div className = {style.actionUser}>
                                <button className = {style.gotoUser}><i className="fad fa-sign-in"></i></button>
                                <button className = {style.convertUser}><i className="fad fa-repeat-1"></i></button>
                                <button onClick = {viewInfo} className = {style.viewUser}>
                                    <i className="fad fa-eye"></i>
                                    {view}
                                </button>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    )
}

export default AccountActive