import React from 'react';
import { Switch, Route } from 'react-router-dom';
import { URL_HOME, URL_LOGIN } from './../shared/constants/urlConstants';
import HomeView from '../views/HomeView';
import LoginView from '../views/LoginView';
import { customHistory } from './../shared/services/historyServices';
import { PrivateRoute } from './../shared/components/PrivateRoute';
import UserList from './../components/account/UserList';
import ProfilUser from './../components/account/ProfilUser';


const Routes = () => { 
    return (
        <Switch history={customHistory}>
            <PrivateRoute roles={["ROLE_ADMIN","ROLE_USER"]} exact path={URL_HOME} component={HomeView} />
            <PrivateRoute roles={["ROLE_ADMIN","ROLE_USER"]} exact path={URL_LOGIN} component={LoginView} />
            <PrivateRoute roles={["ROLE_ADMIN","ROLE_USER"]} exact path='/profil/:id' component={ProfilUser} /> 
            <PrivateRoute roles={["ROLE_ADMIN"]} exact path='/user' component={UserList}/>
 
        </Switch>
    );
};

export default Routes;