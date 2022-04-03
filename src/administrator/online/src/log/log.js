import style from './log.module.css'

const Log = (property) => {
    return (
        <div id = 'log' className = {style.frame + ' row pad'}>
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
                        <ul className = {style.items}>
                            <li className={style.item + ' col-md-6'}>Đăng kí tài khoản</li>
                            <li className={style.item + ' col-md-3'}>Nguyễn Trần Thiên Tân</li>
                            <li className={style.item + ' col-md-3'}>15:10 20/2/2022</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Log