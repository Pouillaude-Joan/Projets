import React from 'react';
import { useState, useEffect } from 'react';
import { BASE_URL } from './../../shared/constants/urlConstants';
import { useParams } from "react-router-dom";
import {MDBInput} from 'mdbreact';
import img from '../../assets/images/user.png';


export default function ProfilUser() {
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
		<div className='ml-3'>
            <div class="container" className='mt-3'>
            <img src={img} alt="profil" name="picture" class="float-left" width="50" height="50" ></img>
            <h1> Profil </h1>
            </div>
            
            <br/>

            <div class="input">  </div>  

                <div class="form-outline" >
                <MDBInput label="Nom" name="lastName" outline size="lg" placeholder={user.lastName} disable/>
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
        </div>
	)
}