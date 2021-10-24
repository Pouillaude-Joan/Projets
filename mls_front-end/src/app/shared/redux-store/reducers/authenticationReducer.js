import { AUTHENTICATE, DECONNECTION } from "../actions/authenticationActions";
import { setToken } from './../../../shared/services/tokenServices';
import { isAuthenticated } from '../../../shared/services/accountServices';

const initialState = { 
    isLogged : isAuthenticated() 
}

function actionAuthenticate(state, payload) {
    setToken(payload)
    return Object.assign({}, state, { 
        isLogged : true 
    });
}

function actionDeconnection(state) {
    localStorage.clear()
    return Object.assign({}, state, { 
        isLogged : false 
    });
}

export default function authenticationReducer(state = initialState, action){
    switch (action.type) {
        case AUTHENTICATE: return actionAuthenticate(state, action.payload)
        case DECONNECTION: return actionDeconnection(state)
        default: return state
    }
}

