import React from 'react'
import { Provider } from 'react-redux';
import RoutesWithNavigation from './routes/RoutesWithNavigation'
import configureStore from './shared/redux-store/store';
import '../app/assets/styles/index.scss';

//store redux
const store = configureStore()

/**
 * Component APP
 * with: 
 * 	- creation of redux store
 * 	- ToastContainer to display toast
 * 
 * @author Peter Mollet
 */
const App = () => {
	return (
		<Provider store={ store }>
			<RoutesWithNavigation/>
		</Provider>
	);
};

export default App;