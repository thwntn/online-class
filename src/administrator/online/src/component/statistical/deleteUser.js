import { useContext } from 'react'
import { PageContext } from '../../context/MainContext'
import Toast from '../../toast/Toast'
import style from './deleteUser.module.css'



function AskDelete({user, setUserDelete, fullName, setRefesh}) {
    const page = useContext(PageContext)

    const transUser = (userName) => {
        const url = 'http://localhost/online-class/src/administrator/api/deleteUserAdmin.php'
        fetch(url, {
            method: 'post',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'text/html'
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(userName)
        })
        .then(response => response.json())
        .then(responseJson => {
            if(responseJson == 1) {
                setRefesh(Math.random)
                setUserDelete(null)
                page.setToast(<Toast props={{ content: 'Xoá thành công', sub: 'Tài khoản quản trị vừa được xóa', type: 'warning' }}></Toast>)
            }
            else {
                setUserDelete(null)
                page.setToast(<Toast props={{ content: 'Thất bại', sub: 'Máy chủ không phản hồi', type: 'error' }}></Toast>)
            }
            setTimeout(() => {
                page.setToast(null)
            }, 2000);
        })
    } 

    return ( 
        <div className={style.frame}>
            <div className={style.box}>
                <h5>Xác nhận xóa ' {fullName} '</h5>
                <button
                    onClick={() => {
                        transUser(user)
                    }}
                    className={style.yes}
                >Có</button>
                <button
                    onClick={() => setUserDelete(null)}
                    className={style.no}
                >Không</button>
            </div>
        </div>
     );
}

export default AskDelete