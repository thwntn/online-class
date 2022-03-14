import style from './manage.module.css'
import { useEffect, useLayoutEffect, useState } from 'react'

const Manage = (property) => {
    const [subjects, setSubject] = useState([])
    useEffect(() => {
        async function fetchData () {
            const response = await fetch("http://localhost/online-class/src/administrator/api/subject.php")
            const responseJSON = await response.json()
            setSubject(responseJSON)
        }
        fetchData()
    }, [])
    return (
        <div id = 'manage' className = {style.mainSession + ' row pad'}>
            <h2 className = {style.title + ' row-md-10'}>Quản lí môn học</h2>
            <div className = {style.titleMobile}><h5>Quản lí môn học</h5></div>
            <div className = {style.frameMobile}>
                <div
                    className = {style.closeMobile}
                    onTouchMove = {() => property.data(false)}
                ></div>
                <div className = {style.navigation + ' col-md-6'}>
                    <ul className = {style.listNav}>
                        <li>Thêm lớp học</li>
                        <li>Xem vi phạm</li>
                        <li>Tìm kiếm</li>
                    </ul>
                </div>
                <div className = {style.items + ' row'}>
                    {subjects.map((subject) => (
                        <div key={subject.subject_id} className = {style.itemBox + ' col-md-4'}>
                            <div className = {style.item}>
                                <div className = {style.backgroundItem} style = {{backgroundImage: `url(./image/${subject.subject_image})`}}></div>
                                <div className= {style.titleItem}>
                                    <h3 className = {style.keySubject}>{subject.subject_id}</h3>
                                    <h5 className = {style.nameSuject}>{subject.subject_name}</h5>
                                </div>
                                <div className = {style.navItem}>
                                    <button className = {style.submit}><i className="fas fa-user"></i></button>
                                    <button className = {style.submit}><i className="fas fa-user-plus"></i></button>
                                    <button className = {style.submit}><i className="fas fa-file-alt"></i></button>
                                    <button className = {style.submit}><i className="fas fa-pen"></i></button>
                                    <button className = {style.submit}><i className="fas fa-stars"></i></button>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}
export default Manage