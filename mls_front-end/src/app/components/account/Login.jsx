import React from 'react';
import { Formik, Form, Field } from 'formik';
import ErrorMessSmall from './../../shared/components/ErrorMessSmall';
import { InsyMDBInput } from '../../shared/components/InputCustom';
import { MDBCard, MDBCardBody, MDBCardTitle, MDBBtn } from 'mdbreact';
import '../../assets/styles/variables/connexion.scss';

/**
 * Component Form Login
 * Use Formik to create the Form
 * 
 * @param {function} submit: submit Function
 * @param {object} initialValues: the initial values of the form
 * @param {boolean} errorLog: to display or not the message of login/mdp not valid
 * @param {object} validationSchema: validation's schema of the form
 *   
 * @author Peter Mollet
 */
const FormLogin = ({ submit, initialValues, errorLog, validationSchema }) => (
    <Formik
        initialValues={initialValues}
        onSubmit={submit}
        validationSchema={validationSchema}
    >
        <Form>
            <Field type="text" name="email" placeholder="Adresse email" component={ InsyMDBInput } outline size="lg" icon="envelope" errorRight/>
            <Field type='password' name='password' placeholder='Mot de passe' component={ InsyMDBInput } outline size="lg" icon="unlock-alt" errorRight />
            <MDBBtn type='submit' color="success" className="btn-block" gradient="blue">Connexion</MDBBtn>
            { errorLog && <ErrorMessSmall middle message="Login/Password incorrect(s)" /> }
        </Form>
    </Formik>
)

/**
 * Component Login
 * 
 * will need in props:
 *  - Submit Function
 *  - initialValues
 *  - errorLog boolean
 *  - validationSchema
 * 
 * See above for information
 * 
 * @example See LoginView
 * @author Peter Mollet
 */
const Login = (props) => {
    return (
        <MDBCard className='connexion' style={{ width: "35rem" }}>
            <MDBCardBody>
                <MDBCardTitle className="text-center">MLS</MDBCardTitle>
                <hr/>
                <FormLogin {...props} />
            </MDBCardBody>
        </MDBCard>
    );
};

export default Login;