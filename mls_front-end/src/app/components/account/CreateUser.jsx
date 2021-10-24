import React from 'react';
import { Formik, Form } from 'formik';
import { MDBCard, MDBCardBody, MDBCardTitle, MDBBtn, MDBCol, MDBIcon, MDBInput, MDBRow } from 'mdbreact';


import ErrorMessSmall from './../../shared/components/ErrorMessSmall';
import{ InsyMDBInput} from '../../shared/components/InputCustom';

import { NavLink } from 'react-router-dom';


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
                 
        {/*<MDBInput <label htmlFor="example3">Small input</label> outline size="lg" outline icon="envelope"  />*/}
                <hr/>
        {/*<div class="form-floating">               
        <MDBInput label="Mot de passe" outline size="lg" outline icon="unlock-alt"/> 
        <MDBInput label="Confirmation mot de passe" outline size="lg" outline icon="unlock-alt"/>   
       <Field class="form-control" icon="user-alt" type="text" name="username" placeholder="Login" component={ InsyMDBInput } errorRight />
        </div>*/}
             
        <div class="form-floating">
        <MDBInput 
         class="form-control"
         outline icon="unlock-alt" 
         type="password"
         pattern="[A-Za-z0-9]{3}" title="3 lettres ou chiffres"
         name='password'
         placeholder='Mot de passe' 
         component={ InsyMDBInput } errorRight
         required/>
        </div>

        <div class="form-floating">
        <MDBInput 
        class="form-control" 
        outline icon="unlock-alt" 
        type="password" 
        pattern="[A-Za-z0-9]{3}" title="3 lettres ou chiffres"
        name='confirm_password' 
        placeholder='Confirmation mot de passe' 
        component={ InsyMDBInput } errorRight 
        required/>
        </div> 

        
        
        <br></br>  

        <button type="submit" className="btn btn-primary btn-block ;"  ><NavLink to={{pathname:'/connexion'}}  >valider</NavLink></button>
        
        {/* <MDBBtn type='submit' gradient="blue" className="btn-block" 
        NavLink exact to={{pathname:'/connexion'}} >valider </MDBBtn>     */}


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
 

const CreateUser = (props) => {
    const urlparams=(props.location.search.split("&"))
    const key=urlparams[0].split("=")[1]
    const mail=urlparams[1].split("=")[1]
    const submit=(values)=>{
        console.log(values)
    }

        const initialvalues={
        password:"",
        confirm_password:""
    }
    
        

    return (
        
        
        <MDBCard style={{ width: "22rem" }}className="container d-flex justify-content-center mt-5">
            <MDBCardBody>
                <MDBCardTitle className="text-center" >Cr&eacute;ation Utilisateur</MDBCardTitle>
                 <hr/>
                 <div className="text-center text-black">{mail}</div> 
              
                <FormLogin initialValues={initialvalues} submit={(values)=>{submit(values)}} />
                
            </MDBCardBody>
            
        </MDBCard>
        
    );
};

export default CreateUser;