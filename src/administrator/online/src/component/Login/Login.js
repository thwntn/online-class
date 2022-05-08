import { useContext, useState } from 'react';
import { PageContext } from '../../context/MainContext';
import Toast from '../../toast/Toast';
import styles from './Login.module.css'
import cookie from '../../login/cookie';
import Header from '../navigation/header';

const md5 = require('md5')
const sha1 = require('sha1')

function Login() {
    const page = useContext(PageContext)
    const [userName, setUserName] = useState()
    const [password, setPassword] = useState()

    function signin() {
        const url = 'http://localhost/online-class/src/administrator/api/login.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify([userName, md5(password)])
        })
        .then(res => res.json())
        .then(res => {
            switch(res){
                case 50: case 100: {
                    cookie(0)
                    page.setToast(<Toast props={{ type: 'success', content: 'Thành công', sub: 'Đăng nhập thành công'}}></Toast>)
                    window.location.reload()
                    break
                }
                case 0: {
                    page.setToast(<Toast props={{ type: 'error', content: 'Thất bại', sub: 'Sai tên đăng nhập hoặc mật khẩu'}}></Toast>)
                    break
                }
                
            }
            setTimeout(() => {
                page.setToast(null)
            }, 2000);
        })
    }
    return ( 
        <div className={styles.frame}>
            <div className={styles.background}></div>
            <div className={styles.imgDesk}>
                <h1>Chào mừng bạn!</h1>
                <p>Nơi quản lí dữ liệu, hoạt động của website</p>
            </div>
            <div className={styles.content}>
                <input
                    onChange={(e) => {
                        setUserName(e.target.value)
                    }}
                    type="text"
                    placeholder="Tên tài khoản hoặc email"
                ></input>
                <input
                    onChange={(e) => {
                        setPassword(e.target.value)
                    }}
                    className="password"
                    type = 'password'
                    placeholder="Nhập mật khẩu"
                ></input>
                <button
                    onClick={() => {
                        signin()
                    }}
                    className="signin">Đăng nhập</button>
            </div>
        </div>
     )
}

export default Login;