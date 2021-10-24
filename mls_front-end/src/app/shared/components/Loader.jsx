import React,  { useState, useEffect } from 'react';
import { MDBSpinner } from 'mdbreact';

/**
 * Component Loader
 * 
 * Display a loading indication
 * After 15 sec, display an error message
 * 
 * @param {boolean} small: to have the spinner in small size
 * @param {boolean} big: to have the spinner in big size
 * 
 * @author Peter Mollet
 */
const Loader = ({ small, big }) => {
    const [err, setErr] = useState(false);

    useEffect(() => {
        const interval = setInterval(() =>  setErr(true) , 15000);
        return () => clearInterval(interval);
    }, []);

  return (
    <>
    {!err ? (
        <div className="vh-center" >
            <div>
                <MDBSpinner crazy big={big} small={small} />
                <span className="sr-only">Loading...</span>
            </div>
        </div>
    ) : (
        <div className="alert alert-danger" role="alert">
            Erreur lors du chargement !
        </div>
    )}
    </>
  );
};

export default Loader;