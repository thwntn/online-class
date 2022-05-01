import style from './loading.module.css'

function Loading() {
    return ( 
        <div className={style.frame}>
            <div className = {style.content}>
                <div className={style.frameIcon}>
                    <div className = {style.child}></div>
                </div>
                <h5 className={style.title}>Đang tải dữ liệu...</h5>
            </div>
        </div>
     );
}

export default Loading;