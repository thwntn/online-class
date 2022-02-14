import style from './infouser.module.css'

const InfoUser = () => (
    <div className = {style.boxInfo}>
        <div className = {style.imgUser}></div>
        <div className = {style.nameUser}>Tên tài khoản</div>
        <input className = {style.inputInfo} value = 'nttansv@gmail.com'></input>
        <input className = {style.inputInfo} type = 'password' value = 'hfjkfdblgl'></input>
        <input className = {style.inputInfo} value = '216 Tầm Vu, Ninh Kiều, cần Thơ'></input>
        <input className = {style.inputInfo} value = 'Nam'></input>
        <input className = {style.inputInfo} value = 'Mạng máy tính và truyền thông dữ liệu'></input>
        <input className = {style.inputInfo} value = 'Tài khoản sinh viên'></input>
    </div>
)

export default InfoUser