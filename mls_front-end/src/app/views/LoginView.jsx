import React from 'react'
import * as Yup from 'yup';
import Login from '../components/account/Login';
import { authenticate } from './../api/backend/account';
import { useState } from 'react';
import { useDispatch } from 'react-redux';
import { URL_HOME } from './../shared/constants/urlConstants';
import { signIn } from '../shared/redux-store/actions/authenticationActions';


const validationSchema = Yup.object().shape({
    email: Yup.string().required("Required input"),
    password: Yup.string().required("Required input")
})


const LoginView = ({ history }) => {

    const [errorLog, setErrorLog] = useState(false)
    const dispatch = useDispatch()
    const initialValues = { email:'', password:'' }

    const handleLogin = (values) => {
        authenticate(values).then(res => {
            if(res.status === 200) {
                dispatch(signIn(res.data.token))
                localStorage.setItem("id", res.data.id);
                localStorage.setItem("role", res.data.role)
                history.push(URL_HOME)
            }
        }).catch(() => setErrorLog(true))
    }

    return (
      <div className="container d-flex justify-content-center mt-5">
            <Login
                submit={handleLogin}
                initialValues={initialValues}
                errorLog={errorLog}
                validationSchema={validationSchema}
            />
      </div>
    );
};

export default LoginView