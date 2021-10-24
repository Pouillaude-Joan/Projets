import React from 'react';
import { MDBDataTableV5 } from 'mdbreact';
import { useState, useEffect } from 'react';
import { BASE_URL } from './../../shared/constants/urlConstants';
import { Link } from 'react-router-dom';

export default function UserList() {
	const [user, setUser] = useState([]);
	
	useEffect(
        () => {
        fetch(BASE_URL + 'api/admin/user/all', {headers:{Authorization:localStorage.getItem('token')}})
            .then((response) => response.json())
            .then((data) => {
                setUser(data);
                console.log(data);
            })
            .catch((err) => {
                console.log(err);
            });
        },
        [],
    );

	const columns = [
		{
			label: 'Login',
			field: 'login',
			width: 150
		},
		{
			label: 'Email',
			field: 'email',
			width: 270
		},
		{
			label: 'Prénom',
			field: 'firstName',
			width: 200
		},
		{
			label: 'Nom',
			field: 'lastName',
			width: 100
		},
		{
			label: 'Photo',
			field: 'picture',
			width: 150
		},
		{
			label: 'Formation',
			field: 'training',
			width: 100
		},
        {
			label: 'Poste',
			field: 'actualJob',
			width: 100
		},
        {
			label: 'Dernière connexion',
			field: 'lastConnection',
			width: 100
		},
		{
			label: 'envoie Id',
			field: 'id',
			width: 100
		}
	];

	const rows = user.map((user) => ({
		login: user.firstName,
		email: user.email,
		firstName: user.firstName,
		lastName: user.lastName,
		picture: user.picture,
		training: user.training,
        actualJob: user.actualJob,
        lastConnection: user.lastConnection,
		id: <button><Link to={{pathname:'/user/'+ user.id}} className="text-dark">Detail</Link></button>
        
	}));

	return (
		<MDBDataTableV5
			data={{columns, rows, }}
			entriesLabel='nombre par page'
		/>
	);
}