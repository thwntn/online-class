import style from './accountactive.module.css'
import InfoUser from './infouser.js'
import {useEffect, useState} from 'react'
import Confirm from '../confirm.js'
import Convert from './convert.js'
import SendNoti from './sendNotification'

const AccountActive = (property) => {
    //fetch data
    const [viewUsers, setViewUsers] = useState([])

    const [refesh, setReFesh] = useState()
    const [close, setClose] = useState(style.active)
    const [view, setView] = useState('none')
    const [active, setActive] = useState('')
    const [convert, setConvert] = useState('none')
    
    useEffect(() => {
        function fetchData() {
            fetch('http://localhost/online-class/src/administrator/api/user.php')
            .then((response) => response.json())
            .then((usersJson) => {
                setViewUsers(usersJson)
                console.log(usersJson);
            })
        }
        fetchData()

        const id = setInterval(() => {
            fetchData()
        }, 5000);

        return () => {
            clearInterval(id)
        }

    }, [refesh])
    const closed = () => {
        setTimeout(() => {
            setView('none')
        }, 200)
    }
    const finish = () => {
        setReFesh(Math.random())
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
                    ></input>
                    <button onClick = {() => property.func()} className = {style.close}>Đóng</button>
                    <div className = {style.boxItems + ' row'}>
                        {viewUsers.map((user, index) => {
                            let type
                            let imgType
                            let content
                            switch (user.user_type) {
                                case '1': {
                                    type = style.teacher
                                    imgType = './image/student.png'
                                    content = 'Giảng Viên'
                                    break
                                }
                                case '2': {
                                    type = style.student
                                    content = 'Sinh Viên'
                                    break
                                }
                                case '3': case '4': {
                                    type = style.lock
                                    content = 'Đã khóa'
                                    break 
                                }
                            }

                            return (
                                <div key = {index} className = {style.itemsElement + ' col-md-3'}>
                                    <div className = {style.item}>
                                        <div className = {style.actionUser}>
                                            <button
                                                className = {style.gotoUser}
                                                onClick= {(e) => {
                                                    e.target.nextElementSibling.submit()
                                                }}
                                            >
                                                <i className="fad fa-sign-in"></i>
                                                <form style={{display: 'none'}} method = 'post' action = {(user.user_type == 1) || (user.user_type == 4) == true ? 'http://localhost/online-class/src/teacher/index.php' : 'http://localhost/online-class/src/student/index.php'}>
                                                    <input name = 'userOL' value = {user.user_name} style= {{display: 'none'}}></input>
                                                    <input type = 'submit'></input>
                                                </form>
                                            </button>
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
                                                {view === index && <InfoUser object = {{close: closed, userName: user.user_name}}></InfoUser>}
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