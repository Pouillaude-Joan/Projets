import React from "react";
import {Redirect, Route} from "react-router-dom";
import { getRole, isAuthenticated } from '../services/accountServices';

/**
 * Component PriveRoute
 * To handle private's route, that needs authentication
 * 
 * TODO: need role check
 * 
 * @author Peter Mollet
 */
export const PrivateRoute = ({component: Component, roles, ...rest}) => (
    <Route 
        {...rest} 
        render={ props => {
            if (!isAuthenticated())
                return <Redirect
                            to={{
                                pathname: "/login",
                                state: {from: props.location},
                            }}
                        />
            if (isAuthenticated() && !getRole(roles))  
                return <Redirect
                            to={{
                                pathname: "/",
                                state: {from: props.location},
            }}
                        />           
            return <Component {...props} />
         }}
    />
);