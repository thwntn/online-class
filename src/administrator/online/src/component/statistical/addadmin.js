import { useContext, useEffect, useState } from 'react';
import style from './addadmin.module.css'
import Error from '../status/error';
import { PageContext } from '../../context/MainContext';
import Toast from '../../toast/Toast';

const md5 = require('md5')
const sha1 = require('sha1')

function AddAdmin({ setAddAd, setRefesh }) {
    const page = useContext(PageContext)

    const userAdmin = {
        address: null,
        phone: null,
        gendle: 1,
        email: 'admin@gmail.com',
        major: null,
        type: 50,
        image: null,
    }

    const registryAdmin = (infoAdmin) => {
        const url = "http://localhost/online-class/src/administrator/api/signup.php"
        fetch(url, {
            method: 'post',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type' : 'text/html',
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(infoAdmin)
        })
        .then(response => response.json())
        .then(res => {
            if(res == 1) {
                setRefesh(Math.random())
                setAddAd(false)
                page.setToast(<Toast props={{ type: 'success', content: 'Đã khởi tạo', sub: 'Tài khoản quản trị đã được cấp' }}></Toast>)
            } else {
                page.setToast(<Toast props={{ type: 'warning', content: 'Thất bại', sub: 'Tên đăng nhập đã tồn tại' }}></Toast>)
            }
            setTimeout(() => {
                page.setToast(null)
            }, 2000);
        })
    }

    return ( 
        <div className={style.frame}>
            <div className={style.boxAdd}>
                <h5>Quản trị viên</h5>
                <input
                    className={style.userName} placeholder = "Tên đăng nhập"
                    onChange={(e) => userAdmin.username = e.target.value}
                ></input>
                <input
                    className={style.Pass} placeholder = "Mật khẩu"
                    onChange={(e) => userAdmin.password = md5(e.target.value)}
                ></input>
                <input
                    className={style.fullName} placeholder = "Tên đầy đủ"
                    onChange={(e) => {userAdmin.fullname = e.target.value; console.log(userAdmin);}}
                ></input>
                <div className={style.nav}>
                    <button
                        className={style.close}
                        onClick={() => setAddAd(false)}
                    >Đóng</button>
                    <button
                        className={style.fns}
                        onClick={() => {
                            registryAdmin(userAdmin)
                        }}
                    >Hoàn tất</button>
                </div>
            </div>
        </div>
     );
}

export default AddAdmin;