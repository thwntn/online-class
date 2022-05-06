import { useEffect, useState } from 'react'
import Loading from '../loading/loading'
import style from './log.module.css'

const Log = (property) => {
    const [log, setLog] = useState([])

    const fetchData = () => {
        const url = 'http://localhost/online-class/src/administrator/api/fetchLog.php'
        fetch(url)
        .then(response => response.json())
        .then(responseJson => {
            setLog(responseJson)
            console.log(responseJson);
        })
    }

    useEffect(() => fetchData(), [])

    useEffect(() => {
        const id = setInterval(() => {
            fetchData()
        }, 5000);
        return () => {
            clearInterval(id)
        }
    }, [])

    return (
        <div id = 'log' className = {style.frame + ' row pad'}>
            {log.length == 0 ? <Loading></Loading> : null}
            <div className = {style.titleMobile}>
                <h5>Nhật kí</h5>
            </div>
            <div className = {style.frameLog}>
                <div className = {style.frameClose}>
                    <button onTouchMove={() => property.data(false)}></button>
                </div>
                <div className = {style.boxLog + ' row'}>
                    <ul className ={style.labelNav + ' row'}>
                        <li className = {style.titleNav + ' col-md-6'}><h5>Nội dung</h5></li>
                        <li className = {style.titleNav + ' col-md-3'}><h5>Tài khoản</h5></li>
                        <li className = {style.titleNav + ' col-md-3'}><h5>Thời gian</h5></li>
                    </ul>
                    <div className = {style.content}>
                        {log.map(item => {
                            return (
                                <ul className = {style.items}>
                                    <li className={style.item + ' col-md-6'}>{item.log_content}</li>
                                    <li className={style.item + ' col-md-3'}>{item.user_fullname}</li>
                                    <li className={style.item + ' col-md-3'}>{item.log_time}</li>
                                </ul>
                            )
                        })}
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Log