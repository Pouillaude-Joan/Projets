import React from 'react';
  
class Password extends React.Component {
    constructor() {
    super();
    this.state = {
      input: {},
      errors: {}
    };
     
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }
     
  handleChange(event) {
    let input = this.state.input;
    input[event.target.name] = event.target.value;
  
    this.setState({
      input
    });
  }
     
  handleSubmit(event) {
    event.preventDefault();
  
    if(this.validate()){
        console.log(this.state);
  
        let input = {};
        input["password"] = "";
        this.setState({input:input});
  
        alert('Password is submited');
    }
  }
  
  validate(){
      let input = this.state.input;
      let errors = {};
      let isValid = true;
  
       
      if (!input["password"]) {
        isValid = false;
        errors["password"] = "Saisissez votre mot de passe";
      }
  
       
      if (typeof input["password"] !== "undefined") {
        if(input["password"].length > 3){
            isValid = false;
            errors["password"] = "Please 3 character.";
        }
      }
  
      
      this.setState({
        errors: errors
      });
  
      return isValid;
  }
     
  render() {
    return (
      <div>
        <h1>Page de Connexion</h1>
        <form onSubmit={this.handleSubmit}>
  
             
          <div class="form-group">
  
            <input 
              type="password" 
              name="password" 
              value={this.state.input.password}
              onChange={this.handleChange}
              class="form-control" 
              placeholder="Mot de passe" 
              id="password" />
  
              <div className="text-danger">{this.state.errors.password}</div>
             
          </div>
              <input type="submit" value="Submit" class="btn btn-success" />
        </form>
      </div>
    );
  }
}
  
export default Password;