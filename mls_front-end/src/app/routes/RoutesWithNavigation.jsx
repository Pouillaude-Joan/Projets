import React from 'react';
import { BrowserRouter } from 'react-router-dom';
import { ToastContainer } from 'react-toastify'
import NavBar from './../components/header-footer/NavBar';
import Routes from './Routes';
import IdleTimerCustom from '../components/account/IdleTimerCustom';
// import Modifier from './../components/ModificationDonnees/Modifier';
/**
 * Component RouteWithNavigation
 * To create the structure of the application (nav bar, routes, toast, etc...)
 * 
 * @author Peter Mollet
 */
const RoutesWithNavigation = () => {
    return (
        <BrowserRouter>
            <IdleTimerCustom />
            <NavBar/>
            <main>
                <Routes/>
            </main>
            <ToastContainer position="bottom-right" />
        </BrowserRouter>
    );
};

export default RoutesWithNavigation;