import style from './accountactive.module.css'
import InfoUser from './infouser.js'
import {useEffect, useState} from 'react'
import Confirm from '../confirm.js'
import Convert from './convert.js'

const AccountActive = (property) => {
    //fetch data
    const [users, setUsers] = useState([])
    const [viewUsers, setViewUsers] = useState([])

    const [refesh, setReFesh] = useState()
    const [close, setClose] = useState(style.active)
    const [view, setView] = useState('none')
    const [active, setActive] = useState('')
    const [convert, setConvert] = useState('none')
    
    useEffect(() => {
        async function fetchData() {
            fetch('http://localhost/online-class/src/administrator/api/user.php')
            .then((response) => response.json())
            .then((usersJson) => {
                setUsers(usersJson)
                setViewUsers(usersJson)
            })
        }
        fetchData()
    }, [refesh])
    const closed = () => {
        setTimeout(() => {
            setView('none')
        }, 200)
    }
    const finish = () => {
        setReFesh(Math.random())
    }

    const search = (e) => {
        const data = e.target.value
        let kq = users.filter((user) => {
            return user.user_fullname == data
        })
        setViewUsers(kq)
        if(e.target.value == '') {
            setViewUsers(users)
        }
    }
    
    return (
        <div className = {style.frame + ' ' + style.active}>
            <div className = {style.accountBox}>
                <div className = {style.backgroundImage}></div>
                <div className = {style.titleMobile}><h5>Tài khoản hiện hành</h5></div>
                <div className = {style.frameMobile}>
                <h3 className = {style.title}>Tài khoản hiện hành</h3>
                    <div
                        className = {style.closemobile}
                        onTouchMove = {() => property.data(false)}
                    ></div>
                    <input
                        className = {style.search} placeholder = 'Nhập tên cần tìm kiếm'
                        onChange={(e) => search(e)}
                    ></input>
                    <button onClick = {() => property.func()} className = {style.close}>Đóng</button>
                    <div className = {style.boxItems + ' row'}>
                        {viewUsers.map((user, index) => {
                            let type
                            let imgType
                            let content
                            switch (user.user_type) {
                                case '1': {
                                    type = 'accountactive_student__5ed6a'
                                    imgType = './image/student.png'
                                    content = 'Sinh Viên'
                                    break
                                }
                                case '2': {
                                    type = 'accountactive_teacher__XHkc9'
                                    content = 'Giảng Viên'
                                    break
                                }
                                case '3': case '4': {
                                    type = 'accountactive_lock__cPLT8'
                                    content = 'Đã khóa'
                                    break 
                                }
                            }
                            return (
                                <div key = {index} className = {style.itemsElement + ' col-md-3'}>
                                    <div className = {style.item}>
                                        <div className = {style.actionUser}>
                                            <button className = {style.gotoUser}><i className="fad fa-sign-in"></i></button>
                                            <button
                                                className = {style.convertUser}
                                                onMouseOver={() => setConvert(index)}
                                                onMouseLeave={() => setConvert('')}
                                            >
                                                <i className="fad fa-repeat-1"></i>
                                                {convert === index && <Convert object = {{user: user.user_name, refesh: setReFesh}}></Convert>}
                                            </button>
                                            <button
                                                onClick = {() => {setView(index)}}
                                                className = {style.viewUser}
                                            >
                                                <i className="fad fa-eye"></i>
                                                {view === index && <InfoUser func = {{close: closed,finish: finish}}></InfoUser>}
                                            </button>
                                        </div>
                                        <div className = {type}>
                                            <button>
                                                <h5 className = {style.contentType}>{content}</h5>
                                            </button>
                                        </div>
                                        <div className = {style.imgUser} style = {{backgroundImage: './abc.jpg'}}></div>
                                        <div className = {style.nameUser}>{user.user_fullname}</div>
                                        <p className = {style.userMajor}>{user.user_major}</p>
                                    </div>
                                </div>
                            )
                        })}
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AccountActive