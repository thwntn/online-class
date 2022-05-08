import { useContext } from 'react'
import { PageContext } from '../../../context/MainContext'
import Toast from '../../../toast/Toast'
import styles from './AskDelete.module.css'



function AskDelete({ props }) {
    const page = useContext(PageContext)
    console.log(props);

    const delUSer = (userName) => {
        const url = 'http://localhost/online-class/src/administrator/api/delUser.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify({userName})
        })
        .then(response => response.json())
        .then(responseJson => {
            if(responseJson == 1) {
                page.setToast(<Toast props={{ content: 'Xoá thành công', sub: 'Tài khoản vừa được xóa', type: 'success' }}></Toast>)
            }
            else {
                page.setToast(<Toast props={{ content: 'Thất bại', sub: 'Máy chủ không phản hồi', type: 'error' }}></Toast>)
            }
            setTimeout(() => {
                page.setToast(null)
            }, 2000);
        })
    } 

    return ( 
        <div className={styles.frame}>
            <div className={styles.box}>
                <h5>Xác nhận xóa</h5>
                <button
                    onClick={() => {
                        delUSer(props.userName)
                        props.setAsk(null)
                    }}
                    className={styles.yes}
                >Có</button>
                <button
                    onClick={() => {
                        props.setAsk(null)
                    }}
                    className={styles.no}
                >Không</button>
            </div>
        </div>
     );
}

export default AskDelete