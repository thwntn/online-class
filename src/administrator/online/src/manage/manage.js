import style from './manage.module.css'

const data = [
    {
        keySubject: 'CT222',
        nameSubject: 'Mạng máy tính',
        image: 'internet.jpg'
    },
    {
        keySubject: 'CT111',
        nameSubject: 'Cơ sở dữ liệu',
        image: 'csdl.jpg'
    },
    {
        keySubject: 'CT212',
        nameSubject: 'Lập trinh hướng đối tượng',
        image: 'lt.jpg'
    },
    {
        keySubject: 'CT321',
        nameSubject: 'Cấu trúc dữ liệu',
        image: 'ctdl.jpg'
    },
    {
        keySubject: 'CT311',
        nameSubject: 'Cấu trúc dữ liệu',
        image: 'ctdl.jpg'
    }
]

const Manage = (property) => {
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
                    {data.map((item) => (
                        <div key={item.keySubject} className = {style.itemBox + ' col-md-4'}>
                            <div className = {style.item}>
                                <div className = {style.backgroundItem} style = {{backgroundImage: `url(./image/${item.image})`}}></div>
                                <div className= {style.titleItem}>
                                    <h3 className = {style.keySubject}>{item.keySubject}</h3>
                                    <h5 className = {style.nameSuject}>{item.nameSubject}</h5>
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