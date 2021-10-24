import React from 'react';
import { MDBBtn, MDBModal, MDBModalBody, MDBModalFooter, MDBModalHeader } from "mdbreact";
import PropTypes from 'prop-types';

const SimpleModal = ({ isOpen, toggle, title, body, withBtn, btnClick, disabledBtn, btnText }) => {
    return (
        <MDBModal isOpen={isOpen} toggle={toggle}>
            <MDBModalHeader className="text-dark">{title}</MDBModalHeader>
            <MDBModalBody>{body}</MDBModalBody>
            {withBtn &&
                <MDBModalFooter>
                    <MDBBtn color="primary" onClick={() => btnClick()} disabled={disabledBtn}>{btnText}</MDBBtn>
                </MDBModalFooter>
            }
        </MDBModal>
    );
}

SimpleModal.propTypes = {
    isOpen: PropTypes.bool.isRequired,
    toggle: PropTypes.func,
    title: PropTypes.string,
    body: PropTypes.element,
    btnClick: PropTypes.func,
    disabledBtn: PropTypes.bool,
    withBtn: PropTypes.bool
};

SimpleModal.defaultProps = {
    disabledBtn: false,
    withBtn: true
};

export default SimpleModal;