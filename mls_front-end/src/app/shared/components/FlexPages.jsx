import React from "react";
import { MDBContainer, MDBMask, MDBRow } from "mdbreact";

// TODO: Pas testé

/**
 *  Put the contenant in a flex box
 * 
 * @example  <FlexIt>
 *               <MyComponent />
 *               <MyComponent />
 *               <MyComponent />
 *           </FlexIt>
 * 
 * @author Mohamed Nechab
 */
const FlexIt = ({ children }) => {
    return(
        <MDBMask className="d-flex justify-content-center align-items-center gradient">
            <MDBContainer>
                <MDBRow>
                    {children}
                </MDBRow>
            </MDBContainer>
        </MDBMask>
    )
}
export default FlexIt;