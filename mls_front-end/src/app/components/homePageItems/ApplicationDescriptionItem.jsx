import React, { Component } from 'react';

class ApplicationDescriptionItem extends Component {
    render() {
        return (
         
                <div className="container my-5 z-depth-1">
                
                        {/* <!--Section: Content--> */}
                        <section className="px-md-5 mx-md-5 dark-grey-text text-center text-lg-left mt-5">
                    
                        <div>
                            <br/>
                                <h1>Bienvenue!</h1>
                                <br/>
                                <p> Vous êtes sur la plateforme Web INSY2S de collaboration. 
                                    C’est  un espace communautaire pour apporter des réponses aux défis techniques, dans le but de partager des connaissances et améliorer ainsi le travail de nos équipes. 
                                </p> 
                            <br/>
                        </div>
                    
                        </section>
                        {/* <!--Section: Content--> */}
                    
                </div>
            
        );
    }
}

export default ApplicationDescriptionItem;