import styles from './Toast.module.css'
import clsx from 'clsx'

function Toast({ props }) {
    switch(props.type) {
        case 'warning': {
            return (
                <div className={clsx(styles.warning, styles.item)}>
                    <h3>{props.content}</h3>
                    <p>{props.sub}</p>
                </div>
            )
        }
        case 'error': {
            return (
                <div className={clsx(styles.error, styles.item)}>
                    <h3>{props.content}</h3>
                    <p>{props.sub}</p>
                </div>
            )
        }
        case 'success': {
            return (
                <div className={clsx(styles.success, styles.item)}>
                    <h3>{props.content}</h3>
                    <p>{props.sub}</p>
                </div>
            )
        }
    }
}

export default Toast;