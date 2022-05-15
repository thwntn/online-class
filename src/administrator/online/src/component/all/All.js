import { useEffect, useState } from 'react';
import styles from './All.module.css'

function All() {
    const [data, setData] = useState({
        comment: [],
        subject: [],
        document: []
    })
    
    function fetchData() {
        const url = 'http://localhost/online-class/src/administrator/api/all.php';
        fetch(url, {
            method: 'post',
        })
        .then(res => res.json())
        .then(res => {
            setData(res);
            console.log(res);
        })
    }
    useEffect(() => {
        fetchData()
        const id = setTimeout(() => {
            fetchData()
        }, 5000);
        return () => {
            clearInterval(id)
        }
    }, [])

    return ( 
        <div className={styles.frameAll}>
            <div className={styles.subject}>
                <h5>Môn học</h5>
                <ul>
                    {data.subject.map((item, index) => {
                        return <li><div className={styles.imageSubject} style={{ backgroundImage: `url(http://localhost/online-class/src/database/${item.subject_id}/image/${item.subject_image})`}}></div>{item.subject_name}</li>
                    })}
                </ul>
            </div>
            <div className={styles.frameCommentAndDocument}>
                <div className={styles.comment}>
                    <h5>Bình luận</h5>
                    <ul>
                        {data.comment.map((item, index) => {
                            return <li><p className={styles.p1}>{item.comment_content}</p><p className={styles.p2}>{item.user_name}</p><p className={styles.p3}>{item.comment_time}</p></li>
                        })}
                    </ul>
                </div>
                <div className={styles.document}>
                    <h5>Tài liệu</h5>
                    <ul>
                        {data.document.map((item, index) => {
                            return <li>item.document_directory</li>
                        })}
                    </ul>
                </div>
            </div>
        </div>
     );
}

export default All;