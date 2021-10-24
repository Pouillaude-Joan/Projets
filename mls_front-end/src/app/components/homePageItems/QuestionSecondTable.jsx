import React, { Component } from 'react';

class QuestionSecondTable extends Component {
    render() {
        return (

<div className="container">
      <table className="table-ms table-bordered">
        <thead>
          <tr>
            <th>Titre de la question [État] photo/Nom </th>
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

export default QuestionSecondTable;