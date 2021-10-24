import React, {useState} from 'react';
import { MDBBtn, MDBModal, MDBModalBody, MDBModalHeader, MDBModalFooter, MDBIcon } from 'mdbreact';

// TODO: Pas testé

/**
 * Composant permettant de créer une modale sur un bouton et de lui attribuer une action
 * @param title message a afficher
 * @param action action effectuer après avoir cliquer sur le bouton valider
 * @param name nom du bouton a afficher
 * @param color couleur du bouton
 * @param rounded permet l'arrondi du bouton
 * @param size définit sa taille
 * @param text text inside the ModalBody 
 * @param icon name of the icon on font awesome
 * @author TALLA Brahim
 */
const ConfirmationModal = ({title, action, name, color, rounded, size , text, icon }) => {
       const [isOpen, setIsOpen] = useState(false);
        return (
            <div className="d-inline-block">
                <MDBBtn onClick={() => setIsOpen(true)} color={color} rounded={rounded} size={size}>
                    {name}
                     <MDBIcon icon={icon}/>
                </MDBBtn>
                <MDBModal isOpen={isOpen}>
                    <MDBModalHeader className={"d-flex justify-content-center"}>{title}</MDBModalHeader>
                    <MDBModalBody>
                    	{text}
                    </MDBModalBody>
                    <MDBModalFooter className={"d-flex justify-content-around"}>
                        <MDBBtn rounded size="sm" color="secondary" onClick={() => setIsOpen(false)}>Annuler</MDBBtn>
                        <MDBBtn rounded size="sm" color="primary" onClick={ ()=> {action(); setIsOpen(false)}}>Confirmer</MDBBtn>
                    </MDBModalFooter>
                </MDBModal>
            </div>
        );
    }


export default ConfirmationModal;
