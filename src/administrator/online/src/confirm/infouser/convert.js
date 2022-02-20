import style from './convert.module.css' 

const Convert = () => {
    return (
        <div className = {style.boxConvert}>
            <ul className = {style.listConvert}>
                <li className = {style.items}>Chặn đăng nhập</li>
                <li className = {style.items}>Chặn bình luận</li>
                <li className = {style.items}>Chặn tải lên tài liệu</li>
                <li className = {style.items}>Chặn nhắn tin</li>
            </ul>
        </div>
    )
}

export default Convert