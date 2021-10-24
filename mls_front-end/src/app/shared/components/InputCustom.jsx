import React from 'react'
import { MDBInput, MDBSelect, MDBSelectInput, MDBSelectOptions, MDBSelectOption } from 'mdbreact';
import { ErrorMessage, Field } from 'formik';

/**
 * Composant générique permettant de gérer facilement les Choices (Checkbox et Radiobutton) en utilisant MDB et Formik
 * 
 * @param {Boolean} inline: Permet de définir les Choices en form-inline
 * @param {Array} options: Les options représente les différents Choices, sous forme de tableau d'objet:{label:'Oui', value:"true"}
 * @param {Boolean} marginLeft Désigne si les Choices auront un margin ml-4, par défaut étant de mr-4
 * @param {Any} valueSelected: La valeur sélectionne, typiquement retourner par: valueSelected={values.name}
 * 
 * @example <INSYChoice type='radio' name='leasing' options={option} valueSelected={values.leasing} marginLeft inline />
 * @author Peter Mollet
 */
export const InsyMDBChoice = ({ inline, name, options, marginLeft, valueSelected, type, ...rest }) => {
  return(
    <>
      <div className={ inline && 'form-inline' }>
      {
        options.map(({ label, value }, index) => (
          <Field 
            key={ index } 
            placeholder={ label }
            id={ name + value }
            value={ value }
            checked={ type === 'radio' ? valueSelected === value : valueSelected.includes(value) }
            type={ type }
            name={ name } 
            component={ InsyMDBInput }
            containerClass={ `${marginLeft ? 'ml-4': 'mr-4' }` }
            { ...rest }
          />
        ))
      }
      </div>
    
      <ErrorMessage 
        name={name} 
        component="small" 
        className="red-text"
      />
    </>
  )
}

/**
 * Composant générique permettant de gérer facilement les Input simple (text, text-area, number) en utilisant MDB et Formik
 * 
 * @param {String} placeholder: label de l'input, qui sera affiché
 * @param {Boolean} errorRight: Permet de mettre le message d'erreur sur la droite (par défaut étant à gauche)
 * 
 * @example <Field type="email" name="email" placeholder="Email" component={ INSYInput } className='my-0' outline/>
 * @author Peter Mollet
 */
export const InsyMDBInput = ({ type, placeholder, errorRight, field:{ name, onChange, onBlur, value, outline }, ...rest }) => {
    return(
      <>
        <MDBInput
          label={ placeholder }
          name={ name }
          onChange={ onChange }
          onBlur={ onBlur }
          value={ value }
          type={ type }
          outline={ outline }
          { ...rest}
        />
        {
        !["checkbox", "radio"].includes(type) && 
          <ErrorMessage 
            name={ name } 
            style={{ marginTop:'-20px' }}
            component="small" 
            className={ `red-text ${errorRight ? 'float-right' : 'float-left'}` }
          />
        }
      </>
    )
}

/**
 * 
 * Composant permettant de facilement utiliser MDBSelect (single ou multiple)
 * 
 * @param {Array} options: Liste d'options, selon MDBSelect. Sous forme d'objet {text:'Male',value:1,checked:false}
 * @param {Boolean} multiple: Défini si le Select est un multiple select ou non (renvoi une liste si oui)
 * @param {Boolean} errorRight: Pour mettre le message d'erreur à droite, gauche par défaut
 * @param {String} label: Permet de définir le libellé du Select
 * 
 * @example <Field type="select" name="gender" options={options} component={InsySelect} label="Gender" errorRight />
 * @author Peter Mollet
 */
export const InsyMDBSelect = ({ options, multiple, errorRight, form:{ values }, field:{ name }, ...rest }) => {
  return(
    <>
      <MDBSelect
        getValue={(value) => {
          multiple 
          ? values[name] = value 
          : values[name] = value[0]
        }}
        { ...rest }
      >
        <MDBSelectInput/>
        <MDBSelectOptions>
          { options.map((option, index) => (
            <MDBSelectOption 
              checked={ option.checked }
              key={ index } 
              value={ option.value }
            >
              { option.text }
            </MDBSelectOption>
          ))}
        </MDBSelectOptions>
      </MDBSelect>

      <ErrorMessage 
        style={{ marginTop:'-20px' }}
        name={ name } 
        component="small" 
        className={ `red-text ${errorRight ? 'float-right' :  'float-left'}` }
      />
    </>
  )
} 
