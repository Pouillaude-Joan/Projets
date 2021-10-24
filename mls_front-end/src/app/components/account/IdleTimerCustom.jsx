import React from 'react';
import IdleTimer from 'react-idle-timer'
import { toast } from 'react-toastify';
import { useDispatch } from 'react-redux';
import { signOut } from '../../shared/redux-store/actions/authenticationActions';

/**
 * Component to automatically handle deconnection after a certain time
 * 
 * @author Peter Mollet
 */
const IdleTimerCustom = () => {
    const dispatch = useDispatch()
    const timeOut = 1000 * 60 * 15

    const handleOnAction = () => clearTimeout(timeOut)

    const handleOnIdle = () => {
        toast.warn("Idle timed out")
        dispatch(signOut())
    }

    return (
        <IdleTimer
            timeout={timeOut}
            onActive={handleOnAction}
            onIdle={handleOnIdle}
            onAction={handleOnAction}
            debounce={500}
        />
    );
};

export default IdleTimerCustom;