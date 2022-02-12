import style from './manage.module.css'

const Manage = () => (
    <div className = {style.background + ' row pad'}>
        <h2 className = {style.title + ' row-md-10'}>Quản lí môn học</h2>
        <div className = {style.navigation + ' col-md-6'}>
            <ul className = {style.listNav}>
                <li>Thêm lớp học</li>
                <li>Xem vi phạm</li>
                <li>Tìm kiếm</li>
            </ul>
        </div>
        <div className = {style.items + ' row'}>
            <div className = {style.item + ' col-md-3'}>
                <h3 className = {style.keySubject}>Mã môn</h3>
                <h5 className = {style.nameSuject}>Tên môn học</h5>
                <div className = {style.navItem}>
                    <button className = {style.submit}><i class="fas fa-user"></i></button>
                    <button className = {style.submit}><i class="fas fa-user-plus"></i></button>
                    <button className = {style.submit}><i class="fas fa-file-alt"></i></button>
                    <button className = {style.submit}><i class="fas fa-pen"></i></button>
                    <button className = {style.submit}><i class="fas fa-stars"></i></button>

                </div>
            </div>
        </div>
    </div>
)
export default Manage