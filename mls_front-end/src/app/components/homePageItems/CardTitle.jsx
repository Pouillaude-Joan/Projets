import React, { Component } from 'react';

class CardTitle extends Component {
    render() {
        return (
           
            <div className="container">
                <ul className="d-flex justify-content-center text-center">
                    <li className="list-group-item active mr-5 w-75">
                        <h4>  Questions</h4>
                     </li>
                    <li className="list-group-item active bg-warning border border-warning ml-5 w-75">
                     <h4>Tutoriels</h4>
                     </li>
                </ul>
            </div>

        );
    }
}

export default CardTitle;