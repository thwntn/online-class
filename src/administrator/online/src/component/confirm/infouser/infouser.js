import { useEffect, useState } from 'react';
import style from './infouser.module.css'


const InfoUser = ({object}) => {
    console.log(object);
    
    const [user, setUser] = useState({})

    const updateInfo = () => {
        const url = 'http://localhost/online-class/src/administrator/api/updateUser.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify(user)
        })
        .then(response => response.json())
        .then(responseJson => console.log(responseJson))
    }

    // Lấy dữ liệu User từ cơ sở dữ liệu
    useEffect(() => {
        const url = 'http://localhost/online-class/src/administrator/api/getInfoUser.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify(object.userName)
        })
        .then(response => response.json())
        .then(responseJson => {
            setUser(responseJson)
            console.log(responseJson);
        })
    }, [])


    return (
    <div className = {style.boxInfo}>
        <div className = {style.imgUser}></div>
        <div className = {style.nameUser}>Tên tài khoản</div>
        <input
            className = {style.inputInfo}
            placeholder = {user.user_fullname}
            onChange = {(e) => {
                user.user_fullname = e.target.value
            }}
        ></input>
        <input
            className = {style.inputInfo}
            placeholder = {user.user_address}
            onChange = {(e) => {
                user.user_address = e.target.value
            }}
        ></input>
        <input
            className = {style.inputInfo}
            placeholder = {user.user_major}
            onChange = {(e) => {
                user.user_major = e.target.value
            }}
        ></input>
        <input
            className = {style.inputInfo}
            placeholder = {user.user_type == 2 ? 'Tài khoản giáo viên' : 'Tài khoản Sinh Viên'}
            onChange={null}
        ></input>
        <div className = {style.nav}>
            <button className = {style.close} onClick = {object.close}>Đóng</button>
            <button
                className = {style.finish}
                onClick = {() => {
                    updateInfo()
                }}
            >Cập nhật</button>
        </div>
    </div>
)}

export default InfoUser