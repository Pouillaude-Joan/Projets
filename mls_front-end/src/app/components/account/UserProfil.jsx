import React from 'react';
import { useState, useEffect } from 'react';
import { BASE_URL } from './../../shared/constants/urlConstants';
import { useParams } from "react-router-dom"
import { Formik, Form, Field, ErrorMessage, yupToFormErrors } from 'formik';
import * as yup from 'yup'
import {MDBInput, MDBBtn} from 'mdbreact';
import Image from './../../assets/images/user_84308.png'

const validationSchema = yup.object().shape({
    lastName: yup.string().required('*Champs obligatoire').matches(/^[a-zA-Z]+$/),
    firstName: yup.string().required('*Champs obligatoire').matches(/^[a-zA-Z]+$/),
    email: yup.string().required('Doit contenir un mail valide').email(/^[a-z\.\-]+@[a-z]+\.[a-z]{2,3}$/),
   // picture: yup.file().required(),
    training: yup.string().required(''),
    actualJob: yup.string().required(''),
    links: yup.string().required(''),
    phone: yup.string().required('N\'accepte que des chiffres').matches(/^[0-9]+$/)
        .min(10, 'Doit contenir 10 chiffres').max(10, 'Doit contenir 10 chiffres'),
    birthDate: yup.date().max(new Date()),
    

});

export default function UserProfil() {
	let {id} = useParams()
    const [user, setUser] = useState(id);

	useEffect(
        () => {
        fetch(BASE_URL + 'api/user/'+id, {headers:{Authorization:localStorage.getItem('token')}})
            .then((response) => response.json())
            .then((data) => {
                setUser(data);
                console.log(data)
            })
            .catch((err) => {
                console.log(err);
            });
        },
        [id]
    );
    

	return (
		<Formik>

            <Form>
            <div class="container">
            <img src={Image} alt="profil" name="picture" class="float-left" width="50" height="50" ></img>
            </div>
            
            <br/>

            <div class="input"> <h1> Profil </h1> </div>  

                <div class="form-outline" >
                <MDBInput label="Nom" name="lastName" outline size="lg" placeholder={user.lastName} disable />
                <MDBInput label="Prénom" name="firstName" outline size="lg" placeholder={user.firstName} disable />
                <MDBInput label="Email" name="email" outline size="lg" placeholder={user.email} disable />
                <MDBInput label="Formation" name="training" outline size="lg" placeholder={user.training} disable />
                <MDBInput label="Poste Actuel" name="actualJob" outline size="lg" placeholder={user.actualJob} disable />
                </div>
            
             <div class="input"> <h1> Information sur le compte </h1> </div>  

                <div class="form-outline">
                <MDBInput label="Date d'inscription" name="registrationDate" outline size="lg" placeholder={user.registrationDate} disable />
                <MDBInput label="Dernière connexion" name="lastConnection" outline size="lg" placeholder={user.lastConnection} disable />
                </div>
    
                <div class="submit">
                <MDBBtn type="submit" gradient="blue" className="btn-block">Modifier</MDBBtn>
                </div>
                
               

                            

           </Form>
        </Formik>
        )
        }