import style from './error.module.css'


function Error({content}) {
    console.log(content);
    return ( 
        <div className={style.frame}>
            <div className={style.boxError}>
                <i className="fas fa-bug"></i>
                <h5>{content}</h5>
            </div>
        </div>
     );
}

export default Error;