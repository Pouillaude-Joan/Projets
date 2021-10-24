import React, { Component } from 'react';

class TutorialSecondTable extends Component {
    render() {
        return (

  <div class="container">
        <table className="table-ms table-bordered">
          <thead>
            <tr>
              <th>Titre du tutoriel [État] photo/Nom </th>
              <th>Date:</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> Réponse plus voté </td>
              <td>Votes/Nbr réponses</td>
            </tr>
            </tbody>
      </table>         
  </div>
        );
    }
}

export default TutorialSecondTable;