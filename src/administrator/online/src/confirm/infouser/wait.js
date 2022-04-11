import style from './wait.module.css'
import InfoUser from './infouser.js'
import {useEffect, useState} from 'react'
import Confirm from '../confirm.js'
import Convert from './convert.js'
import FastView from './fastView'

const data = []

const Wait = (property) => {
    const [close, setClose] = useState(style.active)
    const [view, setView] = useState('none')
    const [active, setActive] = useState('')
    const [fastView, setFastView] = useState(null)

    //dữ liệu người dùng đang xác nhận
    const [listUser, setListUser] = useState([])

    useEffect(() => {
        const url = 'http://localhost/online-class/src/administrator/api/fetchUserAuthentication.php'
        const fetchData = () => {
            fetch(url)
            .then(response => response.json())
            .then(responseJson => {
                setListUser(responseJson)
            })
        }

        fetchData()
        
        const id = setInterval(() => {
            fetchData()
        }, 5000);

        return () => {
            clearInterval(id)
        }
    }, [])

    //chấp nhận user bỏ qua xác thực
    const acceptUser = (userName, userType) => {
        const url = 'http://localhost/online-class/src/administrator/api/acceptAuthen.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify({
                userName,
                userType
            })
        })
        .then(response => response.json())
        .then(responseJson => console.log(responseJson))
    }

    //từ chối user đang xác thực
    const rejectUser = (userName, userType) => {
        const url = 'http://localhost/online-class/src/administrator/api/rejectAuthen.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify({
                userName,
                userType
            })
        })
        .then(response => response.json())
        .then(responseJson => console.log(responseJson))
    }

    return (
        <div className = {style.frame + ' ' + style.active}>
            <div className = {style.accountBox}>
                <div className = {style.backgroundImage}></div>
                <h3 className = {style.title}>Tài khoản hiện hành</h3>
                <input className = {style.search} placeholder = 'Nhập tên cần tìm kiếm'></input>
                <button onClick = {() => property.func()} className = {style.close}>Đóng</button>
                <div className = {style.boxItems + ' row'}>
                    {listUser.map((user, index) => (
                        <div key = {index} className = {style.itemsElement + ' col-md-4'}>
                            <div className = {style.item}>
                                <div className = {style.imgUser} style = {{backgroundImage: './abc.jpg'}}></div>
                                <div className = {style.nameUser}>{user.user_fullname}</div>
                                <div className = {style.actionUser}>
                                    <button
                                        className = {style.gotoUser}
                                        onClick = {() => {
                                            acceptUser(user.user_name, user.user_type)
                                        }}
                                    ><i className="fal fa-check"></i></button>
                                    <button
                                        className = {style.convertUser}
                                        onClick = {() => {
                                            rejectUser(user.user_name, user.user_type)
                                        }}
                                    ><i className="fal fa-times"></i>
                                    </button>
                                    <button
                                        onClick = {() => setFastView(user)}
                                        className = {style.viewUser}
                                    >
                                        <i className="fad fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    ))}
                {fastView != null ? <FastView object={{fastView, setFastView}}></FastView> : null}
                </div>
            </div>
        </div>
    )
}

export default Wait