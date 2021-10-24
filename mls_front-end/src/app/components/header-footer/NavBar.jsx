import React from 'react';
import Logo from '../../assets/images/insy2s_logo.png';
import { MDBNavLink, MDBDropdown, MDBDropdownToggle, MDBDropdownMenu, MDBDropdownItem, MDBIcon,MDBCol} from "mdbreact";
import { isAuthenticated } from './../../shared/services/accountServices';
import { useSelector } from 'react-redux';
import ConnectionBtn from './ConnectionBtn';
import { NavLink } from 'react-router-dom';

/**
 * Component NavBar create with bootstrap
 * 
 * It can be change to use another one if needed
 * 
 */
const NavBar = () => {
  const isLogged = useSelector(({authenticationReducer:{ isLogged}}) => isLogged)
    return (
        <header className="navbar navbar-expand-lg navbar-light bg-white">
             
            <img src= {Logo} className="img-fluid" width="200" height="200"  alt="Logo" />
                {isLogged && (
                    <>
                    <MDBNavLink to='/home' className='ml-3'>
                      Accueil
                    </MDBNavLink>
                    <MDBDropdown>
                      <MDBDropdownToggle nav caret>
                        <div className="col-2 d-none d-md-inline color:black">Domaine</div>
                      </MDBDropdownToggle>
                      <MDBDropdownMenu className="dropdown">
                        <MDBDropdownItem href="#!">Front-End</MDBDropdownItem>
                        <MDBDropdownItem href="#!">Back-End</MDBDropdownItem>
                        <MDBDropdownItem href="#!">Design</MDBDropdownItem>
                        <MDBDropdownItem href="#!">Logiciels / Outils</MDBDropdownItem>
                      </MDBDropdownMenu>
                    </MDBDropdown>
                    <MDBDropdown>
                    <MDBDropdownToggle nav caret>
                      <div className="d-none d-md-inline">Tutoriels</div>
                    </MDBDropdownToggle>
                    <MDBDropdownMenu className="dropdown">
                      <MDBDropdownItem href="#!">Front-End</MDBDropdownItem>
                      <MDBDropdownItem href="#!">Back-End</MDBDropdownItem>
                      <MDBDropdownItem href="#!">Design</MDBDropdownItem>
                      <MDBDropdownItem href="#!">Logiciels / Outils</MDBDropdownItem>
                    </MDBDropdownMenu>
                  </MDBDropdown>
                  <MDBCol md="6">
                    <input className="form-control" type="text" placeholder="Recherche..." aria-label="Search" />
                  </MDBCol>
                  <MDBDropdown>
                      <MDBDropdownToggle nav caret>
                        <MDBIcon icon="user" />
                      </MDBDropdownToggle>
                      <MDBDropdownMenu className="dropdown">
                        <MDBDropdownItem><NavLink exact to='/'>Notifications</NavLink></MDBDropdownItem>
                        <MDBDropdownItem><NavLink exact to={{pathname:'/profil/'+ localStorage.getItem('id')}}>Profil</NavLink></MDBDropdownItem>
                        <MDBDropdownItem><NavLink exact to='/'>Mes posts</NavLink></MDBDropdownItem>
                        <MDBDropdownItem href="#!"><ConnectionBtn></ConnectionBtn></MDBDropdownItem>
                      </MDBDropdownMenu>
                    </MDBDropdown>
                    </>
                    )}
        </header>
        
    );
};

export default NavBar;