// import { MDBCol, MDBContainer, MDBFooter, MDBRow } from 'mdbreact';
// import React from 'react';



// export default function FooterArea() {
//   return (
//   <footer>
//     <MDBFooter className='footer'>
//       <MDBContainer className='p-4'>
//         <MDBRow>
//           <MDBCol lg='3' md='6' className='mb-4 mb-md-0'>
//             <h5 className='text-uppercase'>Links</h5>

//             <ul className='list-unstyled mb-0'>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 1
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 2
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 3
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 4
//                 </a>
//               </li>
//             </ul>
//           </MDBCol>

//           <MDBCol lg='3' md='6' className='mb-4 mb-md-0'>
//             <h5 className='text-uppercase mb-0'>Links</h5>

//             <ul className='list-unstyled'>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 1
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 2
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 3
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 4
//                 </a>
//               </li>
//             </ul>
//           </MDBCol>

//           <MDBCol lg='3' md='6' className='mb-4 mb-md-0'>
//             <h5 className='text-uppercase'>Links</h5>

//             <ul className='list-unstyled mb-0'>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 1
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 2
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 3
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 4
//                 </a>
//               </li>
//             </ul>
//           </MDBCol>

//           <MDBCol lg='3' md='6' className='mb-4 mb-md-0'>
//             <h5 className='text-uppercase mb-0'>Links</h5>

//             <ul className='list-unstyled'>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 1
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 2
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 3
//                 </a>
//               </li>
//               <li>
//                 <a href='#!' className='text-dark'>
//                   Link 4
//                 </a>
//               </li>
//             </ul>
//           </MDBCol>
//         </MDBRow>
//       </MDBContainer>

//       <div className='text-center p-3' style={{ backgroundColor: 'rgba(0, 0, 0, 0.2)' }}>
//         &copy; {new Date().getFullYear()} Copyright:{' '}
//         <a className='text-dark' href='https://mdbootstrap.com/'>
//           MDBootstrap.com
//         </a>
//       </div>
//     </MDBFooter>
//   </footer>
//   );
// }



import React from "react";
import { MDBCol, MDBContainer, MDBRow, MDBFooter } from "mdbreact";

const FooterPagePro = () => {
  return (
    <MDBFooter color="" className="font-small darken-3 pt-0">
      <MDBContainer>
        <MDBRow>
          <MDBCol md="12" className="py-5">
            <div className="mb-5 flex-center">
              <a className="fb-ic">
                <i className="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x">
                </i>
              </a>
              <a className="tw-ic">
                <i className="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x">
                </i>
              </a>
              <a className="gplus-ic">
                <i className="fab fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x">
                </i>
              </a>
              <a className="li-ic">
                <i className="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x">
                </i>
              </a>
              <a className="ins-ic">
                <i className="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x">
                </i>
              </a>
              <a className="pin-ic">
                <i className="fab fa-pinterest fa-lg white-text fa-2x"> </i>
              </a>
            </div>
          </MDBCol>
        </MDBRow>
      </MDBContainer>
      <div className="footer-copyright text-center py-3">
        <MDBContainer fluid>
          &copy; {new Date().getFullYear()} Copyright:{" "}
          <a href="https://www.MDBootstrap.com"> MDBootstrap.com </a>
        </MDBContainer>
      </div>
    </MDBFooter>
  );
}

export default FooterPagePro;
