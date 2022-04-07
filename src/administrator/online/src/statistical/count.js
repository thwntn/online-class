import style from './rightbar.module.css'
import {useEffect, useState} from 'react'
function Count() {

    const [count, setCount] = useState({
        user: 0,
        homework: 0,
        comment: 0,
        message: 0
    })

    const fetchCount = () => {
        const  url ='http://localhost/online-class/src/administrator/api/count.php'
         fetch(url)
         .then(response => response.json())
         .then(responseJson => {
            setCount(responseJson)
         })
     }
 
     useEffect(() => {
         const id = setInterval(() => {
             fetchCount()
         }, 2000);
         return () => {
             clearInterval(id)
         }
     }, [])


    return ( 
        <ul className = {style.listBar + ' row'}>
                <li className = 'col-md-3'>
                    <div className={style.user}>
                        <h5>{count.user}</h5>
                        <p>Tài khoản</p>
                    </div>
                </li>
                <li className = 'col-md-3'>
                    <div className={style.class}>
                        <h5>{count.message}</h5>
                        <p>Tin nhắn</p>
                    </div>
                </li>
                <li className = 'col-md-3'>
                    <div className={style.document}>
                        <h5>{count.comment}</h5>
                        <p>Bình luận</p>
                    </div>
                </li>
                <li className = ' col-md-3'>
                    <div className={style.mess}>
                        <h5>{count.homework}</h5>
                        <p>Bài tập</p>
                    </div>
                </li>
            </ul>
     );
}

export default Count;