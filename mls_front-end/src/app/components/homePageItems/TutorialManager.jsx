import React, { Component } from 'react';
import axios from 'axios';

class TutorialManager extends Component {
    state = {
        tutorialList:[],
    };
    componentDidMount = () => {
        axios.post('http://localhost:8000/tutorial/search',{
            'current_page': 1,
            'per_page': 36,
          })
        .then (response =>{
            console.log(response);
            console.log(response.data);
            this.setState({tutorialList:response.data });
        })
        .catch(error =>{
            console.log(error);
        })
    }

    render() {
    
        return (
                    <div>                          
                        <div className="container">
                            <table className="table-ms table-bordered">
                                <thead>
                                <tr>
                                    {/* <th>Titre: {tutorial.Title} [État] Auteur:{tutorial.Author}</th>
                                    <th>Date:{tutorial.CreationDate}</th> */}
                                </tr>
                                </thead>
                                    <tbody>  
                                            {
                                                this.state.tutorialList && this.state.tutorialList.length>0 && (
                                                    this.state.tutorialList.map ((tutorial,i) =>(
                                                    <tr key={i}> 
                                                    <td>{tutorial.title}</td>
                                                    </tr>
                                                ))
                                                )
                                            }       
                                    </tbody>
                            </table>         
                        </div>
                    </div>
        );
    }
}

export default TutorialManager;

