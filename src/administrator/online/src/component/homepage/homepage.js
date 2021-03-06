import Pinned from '../pinned/Pinned'
import style from './homepage.module.css'

function HomePage () {
    const height = window.innerHeight
    return (
        <div id ='home' className = { style.background } style = {{ height: window.innerHeight }}>
            <h1 className = {style.title}>Chào mừng bạn đến trang quản trị!</h1>
            <p className = {style.description}>Nơi quản lí người dùng lớp học môn học, kiểm tra bảo mật, chỉnh sửa thống tin.</p>
        </div>
    )
}
export default HomePage